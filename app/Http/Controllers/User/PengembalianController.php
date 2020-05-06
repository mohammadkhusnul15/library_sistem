<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->get('search');
        $perPage = 1;
        $transactions = Transaction::where('code_transaction', $key)->paginate($perPage);
        if(!empty($key) && count($transactions) !== 0) {
            $transaction = Transaction::where('code_transaction', $key)->first();
            if($transaction->status != "Sudah dikembalikan") {
                $transaction = Transaction::where('code_transaction', $key)->first();
                $book = Book::find($transaction->books_id);
                $user = User::find($transaction->users_id);
            }
            else {
                $transaction = null;
                $book = null;
                $user = null;
            }
        } else {
            $transaction = null;
            $book = null;
            $user = null;
        }
        return view('pages.pengembalian.index', compact('transaction', 'book', 'user'));
    }

    public function show($code)
    {
        $transaction = Transaction::where('code_transaction', $code)->first();
        $book = Book::find($transaction->books_id);
        $user = User::find($transaction->users_id);
        return view('pages.pengembalian.show', compact('transaction', 'book', 'user'));
    }

    public function pengembalian($code)
    {
        $transaction = Transaction::where('code_transaction', $code)->first();
        $book = Book::find($transaction->books_id);
        $transaction->status = "Sudah dikembalikan";
        $transaction->pengembalian = Carbon::now()->toDateString();
        $book->jumlah = ($book->jumlah + $transaction->jumlah);
        $transaction->save();
        $book->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil dikembalikan',
        ]);
    }

    public function success($code)
    {
        $transaction = Transaction::where('code_transaction', $code)->first();
        $book = Book::find($transaction->books_id);
        $user = User::find($transaction->users_id);
        return view('pages.pengembalian.success', compact('transaction', 'book', 'user'));
    }
}
