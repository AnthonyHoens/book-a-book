<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, OrderBook::class)->withPivot('quantity');
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->pluck('user_id')->contains(Auth::id());
    }

}
