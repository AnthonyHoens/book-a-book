<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    public function publishers()
    {
        return $this->hasMany(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function sale() {
        return $this->hasOne(Sale::class);
    }

    public function getReduceDetailAttribute() : string
    {
        return substr($this->edit_detail, 0, 150) . '...';
    }
}
