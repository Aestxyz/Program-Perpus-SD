<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'members' => User::where('role', 'Anggota')
                ->whereNotNull('email_verified_at')
                ->count(),
            'officers' => User::where('role', 'Petugas')->count(),
            'books' => Book::count(),
            'generalbooks' => Book::where('type', 'Umum')->count(),
            'textbooks' => Book::where('type', 'Paket')->count(),
            'transactions' => Transaction::count(),
        ]);
    }
}
