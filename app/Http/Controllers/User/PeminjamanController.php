<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PeminjamanController extends Controller
{

    public $path;
    public $dimensions;
    public $user;

    public function __construct()
    {
        $this->path = public_path().'/img/user';
        $this->dimensions = 500;
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        $key = $request->get('search');
        $perPage = 10;
        if(!empty($key)) {
            $books = Book::where('name', 'LIKE', "%$key%")->latest()->paginate($perPage);
        } else {
            $books = Book::latest()->paginate($perPage);
        }
        return view('pages.peminjaman.index', compact('books'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $password2 = $request->password2;
        if($password2 !== $password) {
            return response()->json([
                'success' => false,
                'messgae' => 'Confirm password invalid'
            ]);
        } else {
            $user->password = Hash::make($password);
        }
        if(!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $picture = $request->file('picture');
        $pictureName = Carbon::now()->timestamp.'_'.uniqid().'.'.$picture->getClientOriginalExtension();
        $canvas = Image::canvas($this->dimensions, $this->dimensions);
        $resizePicture = Image::make($picture)->resize($this->dimensions, null, function($constraint) {
            $constraint->aspectRatio();
        });
        $canvas->insert($resizePicture, 'center');
        $canvas->save($this->path.'/'.$pictureName, 80);
        $user->picture = $pictureName;
        $user->phone_number = $request->phone;
        $user->class = $request->class;
        $user->majors = $request->major;
        $user->address = $request->address;

        $transaction = new Transaction();
        $transaction->books_id = $request->bookId;
        $user->save();
        $transaction->code_transaction = Str::random(5).'_'.'USR-'.$user->id;
        $transaction->users_id = $user->id;
        $book = Book::find($request->bookId);
        $book->jumlah = $book->jumlah - $request->jumlah;
        $transaction->jumlah = $request->jumlah;
        $transaction->pengembalian = Carbon::now()->addDays(7)->toDateString();
        $book->save();
        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil dipinjam',
            'user' => $user,
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $password = $request->password;
            $password2 = $request->password2;
            if($password !== "") {
                if($password2 !== $password) {
                    return response()->json([
                        'success' => false,
                        'messgae' => 'Confirm password invalid'
                    ]);
                } else {
                    $user->password = Hash::make($password);
                }
            } else {
                $user->password = $user->password;
            }
            if($request->hasFile('picture') && $request->file('picture') !== null) {
                File::delete($this->path.'/'.$user->picture);
                $picture = $request->file('picture');
                $pictureName = Carbon::now()->timestamp.'_'.uniqid().'.'.$picture->getClientOriginalExtension();
                $canvas = Image::canvas($this->dimensions, $this->dimensions);
                $resizePicture = Image::make($picture)->resize($this->dimensions, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $canvas->insert($resizePicture, 'center');
                $canvas->save($this->path.'/'.$pictureName, 80);
                $user->picture = $pictureName;
            }
            $user->phone_number = $request->phone;
            $user->class = $request->class;
            $user->majors = $request->major;
            $user->address = $request->address;
            $transaction = Transaction::where('code_transaction', $request->loanCode)->first();
            $book = Book::find($request->bookId);
            if($request->jumlah !== $transaction->jumlah) {
                $book->jumlah = (($book->jumlah + $transaction->jumlah) - $request->jumlah);
                $transaction->jumlah = $request->jumlah;
                $book->save();
                $transaction->save();
            }
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil dipinjam',
                'user' => $user
            ]);

    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('pages.peminjaman.show', compact('book'));
    }

    public function success($user_id, $code_transaction)
    {
        $user = User::find($user_id);
        $password_hashed = $user->password;
        $transaction = Transaction::where('code_transaction', $code_transaction)->first();
        $book = Book::where('id', $transaction->books_id)->first();
        return view('pages.peminjaman.success', compact('user', 'transaction', 'book'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
        ]);
    }

    public function code($code)
    {
        $transaction = Transaction::where('code_transaction', $code)->first();
        $book = Book::where('id', $transaction->books_id)->first();
        $user = User::where('id', $transaction->users_id)->first();
        return view('pages.peminjaman.code', compact('transaction', 'book', 'user'));
    }

    public function pdf($code)
    {
        $transaction = Transaction::where('code_transaction', $code)->first();
        $book = Book::where('id', $transaction->books_id)->first();
        $user = User::where('id', $transaction->users_id)->first();
        $pdf = PDF::loadView('pages.peminjaman.pdf', ['transaction' => $transaction, 'user' => $user, 'book' => $book]);
        $customPaper = array(0,1,500,250);
        $pdf->setPaper($customPaper);
        return $pdf->stream();
    }
}
