<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'order_book';


    public function getTotalPriceAttribute()
    {
        return $this->sale->pluck('student_price')->sum();
    }
}
