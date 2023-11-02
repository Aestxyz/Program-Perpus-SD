<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class GeneralbookController extends Controller
{
    public function index()
    {
        $transaction =  Transaction::where('label', 'generalbook')
            ->latest()
            ->get();

        $walking = $transaction->where('status', 'Berjalan');
        $penalty = $transaction->where('status', 'Terlambat');
        $finished = $transaction->where('status', 'Selesai');

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
}
