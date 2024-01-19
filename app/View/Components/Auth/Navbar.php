<?php

namespace App\View\Components\Auth;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $transactions = Transaction::where('return_date', '<', now())
            ->where('status', '!=', 'Tolak')
            ->where('status', '!=', 'Menunggu')
            ->where('status', '!=', 'Selesai')->get();

        $generalbook = $transactions->where('label', 'generalbook')->count();
        $textbook = $transactions->where('label', 'textbook')->count();

        return view('components.auth.navbar', [
            'late_days' => $transactions->count(),
            'generalbook' => $generalbook,
            'textbook' => $textbook,
        ]);
    }
}
