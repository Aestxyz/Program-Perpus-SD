<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 'title','image','category_id','isbn','author','year_published','publisher','synopsis','book_count'
     * url: https://www.dbooks.org/api/recent
     * url: https://www.dbooks.org/api/book/{id}
     */
    public function run()
    {
        $recentBooks = Http::get('https://www.dbooks.org/api/search/indonesia')->json();

        if (isset($recentBooks['books'])) {
            foreach ($recentBooks['books'] as $book) {
                // Check if the 'id' key exists in the $book array
                if (isset($book['id'])) {
                    $bookDetails = Http::get('https://www.dbooks.org/api/book/' . $book['id'])->json();

                    // Check if the 'image' key exists in the $bookDetails array
                    if (isset($bookDetails['image'])) {
                        $category = Category::all()->random();
                        $imageName = basename($bookDetails['image']);

                        $bookData = [
                            'title' => $bookDetails['title'],
                            'image' => 'images/' . $imageName,
                            'category_id' => $category->id,
                            'isbn' => $bookDetails['id'],
                            'author' => $bookDetails['authors'],
                            'year_published' => $bookDetails['year'],
                            'publisher' => $bookDetails['publisher'],
                            'synopsis' => $bookDetails['description'],
                            'book_count' => rand(1, 100),
                            'type' => Arr::random(['Umum', 'Paket']),
                        ];

                        $bookModel = Book::create($bookData);

                        // Save image to storage
                        $imageUrl = $bookDetails['image'];
                        $imageData = file_get_contents($imageUrl);
                        Storage::put('public/images/' . $imageName, $imageData);

                        $this->command->info('Book added: ' . $bookModel->title);
                    } else {
                        $this->command->error('Invalid book details structure: missing image');
                    }
                } else {
                    $this->command->error('Invalid book structure: missing id');
                }
            }
        } else {
            $this->command->error('Invalid recentBooks structure: missing books');
        }

        $this->command->info('Seeder finished.');

    }
}
