<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    protected $with = 'category';
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'isbn',
        'author',
        'year_published',
        'publisher',
        'synopsis',
        'book_count'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the comments for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): BelongsToMany
    {
        return $this->belongToMany(Transaction::class);
    }
}
