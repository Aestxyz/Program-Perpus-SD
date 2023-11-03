<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;

class TextbookController extends Controller
{
    public function index()
    {
        $transaction =  Transaction::where('label', 'textbook')
            ->latest()
            ->get();

        $walking = $transaction->where('status', 'Berjalan');
        $penalty = $transaction->where('status', 'Terlambat');
        $finished = $transaction->where('status', 'Selesai');

        $users = User::where('role', 'Anggota')
            ->select('id', 'name')
            ->get();

        $books = Book::whereType('Paket')->get();

        $borrow_date = Carbon::now()->format('Y-m-d');
        $return_date = Carbon::now()->addMonth(6)->format('Y-m-d');

        return view('transaction.textbook', [
            'walking' => $walking,
            'penalty' => $penalty,
            'finished' => $finished,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'book_id' => 'required|array',
            'book_id.*' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'nullable|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => 'required|in:Berjalan,Terlambat',
        ]);

        $transaction = Transaction::where('label', 'textbook')
            ->where('user_id', $request->user_id)
            ->where(function ($query) {
                $query->where('status', 'Berjalan')
                    ->orWhere('status', 'Terlambat');
            })->orWhere(function ($query) {
                $query->where('status', 'Berjalan')
                    ->Where('status', 'Terlambat');
            })
            ->count();


        if ($transaction >= 1) {
            return back()->with('warning', 'Peminjaman melebihi batas yang telah ditentukan 😀');
        } else {
            $user = User::findOrFail($request->user_id);

            $validate['code'] = $user->slug . '-' . Str::random(10);
            $validate['label'] = 'textbook';

            $data = Transaction::create($validate);

            // Attach multiple books to the transaction
            $data->books()->attach($request->book_id);

            // Decrease book_count for each selected book
            Book::whereIn('id', $request->book_id)->decrement('book_count');


            return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
        }
    }
}
