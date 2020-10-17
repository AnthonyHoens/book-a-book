<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function remaining_books() {
        return $this->belongsTo('App\Models\RemainingBook', 'book_id', 'id');
    }
}
