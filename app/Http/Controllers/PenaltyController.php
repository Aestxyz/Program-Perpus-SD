<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenaltyRequest;
use App\Models\Book;
use App\Models\Penalty;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = Penalty::latest()->get();
        $totalPenaltyAmount = $penalties->sum('amount');
        $lateTransactions = Transaction::where('status', 'Terlambat')->latest()->get();

        return view('penalty.index', [
            'penalties' => $penalties,
            'all_amount' => $totalPenaltyAmount,
            'dont_payment' => $lateTransactions
        ]);
    }
    public function store(PenaltyRequest $request)
    {
        $validate = $request->validated();
        Penalty::create($validate);

        $transaction = Transaction::findOrfail($request->transaction_id);

        foreach ($transaction->books as $item) {
            Book::findOrfail($item->id)->increment('book_count');
        }

        $transaction->update([
            'status' => 'Selesai',
            'return_date' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->route('penalties.index')->with('success', 'Proses pelunasan dan pengembalian buku telah berhasil dilakukan.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $lateDays = Carbon::parse($transaction->return_date)->diffInDays();

        $penaltyPerDay = 1000;
        $penaltyAmount = $lateDays * $penaltyPerDay;

        return view('penalty.show', [
            'transaction' => $transaction,
            'lates_day' => $lateDays,
            'penalty' => $penaltyPerDay,
            'amount' => $penaltyAmount,
        ]);
    }
}
