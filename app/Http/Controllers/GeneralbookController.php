<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;

class GeneralbookController extends Controller
{
    public function index()
    {
        $transactions =  Transaction::where('label', 'generalbook')
            ->latest()
            ->get();

        $walking = $transactions->where('status', 'Berjalan');
        $penalty = $transactions->where('status', 'Terlambat');
        $finished = $transactions->where('status', 'Selesai');

        $users = User::where('role', 'Anggota')
            ->select('id', 'name')
            ->get();

        $books = Book::whereType('Umum')->get();

        $borrow_date = Carbon::now()->format('Y-m-d');
        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        return view('transaction.generalbook', [
            'walking' => $walking,
            'penalty' => $penalty,
            'finished' => $finished,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $validatedData = $request->validated();

        $existingTransactions = Transaction::where('label', 'generalbook')
            ->where('user_id', $validatedData['user_id'])
            ->whereIn('status', ['Berjalan', 'Terlambat'])
            ->count();

        if ($existingTransactions >= 3) {
            return back()->with('warning', 'Peminjaman melebihi batas yang telah ditentukan 😀');
        } else {
            $user = User::findOrFail($validatedData['user_id']);

            $validatedData['code'] = $user->slug . '-' . Str::random(10);
            $validatedData['label'] = 'generalbook';

            $transaction = Transaction::create($validatedData);
            $transaction->books()->sync($request->book_id);

            Book::whereIn('id', $request->book_id)->decrement('book_count');

            return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
        }
    }

    public function update(TransactionRequest $request, $id)
    {
        $validate = $request->validated();

        $transaction = Transaction::findOrFail($id);
        // Get the current books associated with the transaction
        $currentBooks = $transaction->books->pluck('id')->toArray();

        // Check if there are changes in the books
        if ($request->book_id != $currentBooks) {
            // Increase book_count for the books that were previously associated
            Book::whereIn('id', $currentBooks)->increment('book_count');

            // Decrease book_count for the newly selected books
            Book::whereIn('id', $request->book_id)->decrement('book_count');

            // Sync the books for the transaction
            $transaction->books()->sync($request->book_id);
        }

        // Update the transaction with the validated data
        $transaction->update($validate);

        return back()->with('success', 'Data telah diperbarui dengan sukses.');
    }
}
