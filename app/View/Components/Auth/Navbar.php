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
        return view('components.auth.navbar', [
            'late_days' => Transaction::where('status', 'Terlambat')
                ->count(),
        ]);
    }
}
