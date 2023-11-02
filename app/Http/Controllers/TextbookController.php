<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
}
