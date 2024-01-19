<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book = Book::where('book_count', '>', 1)
        ->inRandomOrder()
        ->first('id');

        return [
            'book_id' => $book,
            'transaction_id' => Transaction::all()->random(),
        ];
    }
}
