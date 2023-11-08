<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{

    public function finished($id)
    {
        $transaction = Transaction::findOrfail($id);

        $transaction->update([
            'status' => 'Selesai',
            'return_date' => Carbon::now()->format('Y-m-d'),
        ]);

        foreach ($transaction->books as $book) {
            $book = Book::findOrfail($book->id);
            $book->book_count++;
            $book->save();
        }

        return back()->with('success', 'Proses peminjaman dan pengembalian buku telah selesai dilakukan.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $books = Book::get();

        return view(
            'transaction.show',
            compact('transaction', 'users', 'books')
        );
    }
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        foreach ($transaction->books as $book) {
            $book = Book::findOrfail($book->id);
            $book->book_count++;
            $book->save();
        }

        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Proses penghapusan data telah berhasil dilakukan.');
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'book_id' => 'required|array',
            'book_id.*' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'nullable|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => 'required|in:Berjalan,Terlambat',
        ]);

        $transaction = Transaction::findOrFail($id);
        foreach ($transaction->books as $book) {
            $book = Book::findOrfail($book->id);
            $book->book_count++;
            $book->save();
        }

    }
}
