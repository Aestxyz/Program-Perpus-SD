<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generalbook()
    {
        $transactions = Transaction::whereLabel('generalbook')->latest()->get();
        return view('report.generalbook', [
            'transactions' => $transactions,
        ]);
    }
    public function textbook()
    {
        $transactions = Transaction::whereLabel('textbook')->latest()->get();
        return view('report.textbook', [
            'transactions' => $transactions,
        ]);
    }
}
