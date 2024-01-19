<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now()->subMonths(1);

        $user = User::whereNotNull('email_verified_at',)
            ->where('role', 'Anggota')
            ->inRandomOrder()
            ->first('id');
            
        $borrow_date = $now->addDays(7)
            ->format('Y-m-d');

        $return_date = $now->addDays(rand(20, 35))
            ->format('Y-m-d');

        return [
            'code' => Str::random(20),
            'user_id' => $user,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'status' => $this->faker->randomElement(['Selesai', 'Berjalan', 'Terlambat']),
            'label' => Arr::random(['textbook', 'generalbook'])
        ];
    }
}
