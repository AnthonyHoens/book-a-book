<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'obligatory_books');
    }


}
