<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imagePath = 'assets/img/Example-Cover.png';
        $storagePath = 'images/' . $imagePath;
        Storage::disk('public')->put($storagePath, file_get_contents(public_path($imagePath)));

        return [
            'title' => $this->faker->sentence(),
            'image' => $storagePath,
            'category_id' => Category::all()->random(),
            'isbn' => $this->faker->isbn13,
            'author' => $this->faker->name,
            'year_published' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'synopsis' => $this->faker->paragraph(),
            'book_count' => $this->faker->numberBetween(1, 10),
            'type' => Arr::random(['Umum', 'Paket']),
        ];
    }
}
