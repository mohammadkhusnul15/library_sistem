<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class BooksController extends Controller
{

    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = public_path().'/img/books';
        $this->dimensions = 500;
    }

    public function index(Request $request)
    {
        $key = $request->get('search');
        $perPage = 20;
        if(!empty($key) && $key !== null) {
            $book = Book::where('name', 'LIKE', "%$key%")->latest()->paginate($perPage);
        } else {
            $book = Book::latest()->paginate($perPage);
        }
        return view('admin.books.index', compact('book'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->jumlah = $request->jumlah;
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
        $book->picture = $pictureName;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->rack = $request->rack;
        $book->stack = $request->stack;
        $book->total_pages = $request->total_pages;
        $book->price = $request->price;
        $book->save();

        return redirect('admin/books')->with('flash_message', 'Book added!');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->jumlah = $request->jumlah;
        if(!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = Carbon::now()->timestamp.'_'.uniqid().'.'.$picture->getClientOriginalExtension();
            $canvas = Image::canvas($this->dimensions, $this->dimensions);
            $resizePicture = Image::make($picture)->resize($this->dimensions, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $canvas->insert($resizePicture, 'center');
            $canvas->save($this->path.'/'.$pictureName, 80);
            $book->picture = $pictureName;
        }
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->rack = $request->rack;
        $book->stack = $request->stack;
        $book->total_pages = $request->total_pages;
        $book->price = $request->price;
        $book->save();

        return redirect('admin/books')->with('flash_message', 'Book updated!');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('admin/books')->with('flash_message', 'Book deleted!');
    }
}
