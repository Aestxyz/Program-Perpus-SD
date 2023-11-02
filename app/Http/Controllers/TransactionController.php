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
    public function textbook()
    {
        $walking = Transaction::where('status', 'Berjalan')
            ->latest()
            ->get();
        $penalty = Transaction::where('status', 'Terlambat')
            ->latest()
            ->get();
        $finished = Transaction::where('status', 'Selesai')
            ->latest()
            ->get();

        $borrow_date = Carbon::now()->format('Y-m-d');

        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        $users = User::select('id', 'name')->get();
        $books = Book::whereType('Paket')->get();

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
    public function store(TransactionRequest $request)
    {
        // dd($request->all());
        $validate = $request->validated();

        $transaction = Transaction::where('user_id', $request->user_id)
            ->where(function ($query) {
                $query->where('status', 'Berjalan')
                    ->orWhere('status', 'Terlambat');
            })->orWhere(function ($query) {
                $query->where('status', 'Berjalan')
                    ->Where('status', 'Terlambat');
            })
            ->count();


        if ($transaction >= 3) {
            return back()->with('warning', 'Peminjaman melebihi batas yang telah ditentukan 😀');
        } else {
            $book = Book::find($request->book_id);
            $book->book_count -= 1;
            $book->save();

            $user = User::findOrFail($request->user_id);

            $validate['code'] = $user->slug . '-' . Str::random(10);
            $validate['label'] = 'generalbook';
            $data = Transaction::create($validate);
            $data->books()->attach($request->book_id);


            return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
        }
    }
    public function finished($id)
    {
        $transaction = Transaction::findOrfail($id);

        $transaction->update([
            'status' => 'Selesai',
            'return_date' => Carbon::now()->format('Y-m-d'),
        ]);

        $book = Book::findOrfail($transaction->book->id);
        $book->book_count++;
        $book->save();

        return back()->with('success', 'Proses peminjaman dan pengembalian buku telah selesai dilakukan.');
    }

    // public function confirmation(Request $request, $id)
    // {
    //     $validate = $request->validate([
    //         'status' => 'required|string',
    //         'borrow_date' => 'required|date',
    //         'return_date' => 'required|date',
    //     ]);

    //     $transaction = Transaction::findOrfail($id);

    //     $transaction->update($validate);

    //     return back()->with('success', 'Proses penambahan data peminjaman dan pengembalian buku berhasil telah berhasil dilakukan.');
    // }

    // public function reject($id)
    // {
    //     $transaction = Transaction::findOrfail($id);

    //     $transaction->update([
    //         'status' => 'Tolak',
    //         'borrow_date' => null,
    //         'return_date' => null,
    //     ]);

    //     $book = Book::findOrfail($transaction->book->id);
    //     $book->book_count++;
    //     $book->save();

    //     return back()->with('success', 'Proses peminjaman dan pengembalian buku berhasil di tolak.');
    // }
}
