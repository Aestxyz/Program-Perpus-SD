<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookTransaction;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();

        $this->call([
            APISeeder::class,
            UserSeeder::class,
        ]);

        // Transaction::factory(10)->create();
        // BookTransaction::factory(100)->create();
    }
}
