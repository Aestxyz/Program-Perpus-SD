<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTransaction extends Model
{
    use HasFactory;

    protected $table = 'book_transaction';

    protected $fillable = [
        'book_id', 'transaction_id'
    ];
}
