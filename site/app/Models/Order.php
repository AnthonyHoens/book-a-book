<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $dates = ['validated_at'];
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, OrderBook::class)
            ->whereNull('order_book.deleted_at')
            ->withPivot('quantity');
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function getIdOfBooksAttribute()
    {
        return $this->books->pluck('id');
    }

    public function getCloturedDateAttribute()
    {
        return $this->validated_at->isoFormat('LLLL');
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->pluck('user_id')->contains(Auth::id());
    }

}
