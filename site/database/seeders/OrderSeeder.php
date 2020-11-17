<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderBook;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Traits\OrderNumber;

class OrderSeeder extends Seeder
{
    use OrderNumber;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $countBook = Book::all()->count();

        foreach ($users as $user) {
            $total = 0;

            $order = new Order();
            $order->user_id = $user->id;
            $order->order_number = $this->randomNumber(32);
            $order->validated_at = null;
            $order->save();


            $randBook = rand(1, $countBook);

            $newBook = new OrderBook();
            $newBook->order_id = $order->id;
            $newBook->book_id = $randBook;
            $newBook->quantity = rand(1, 5);
            $newBook->save();

            $addToTotal = Book::with('sale')
                ->where('id', '=', $newBook->book_id)
                ->first();

            $total += $addToTotal->sale->student_price * $newBook->quantity;


            $randBook = rand(1, $countBook);

            $newBook = new OrderBook();
            $newBook->order_id = $order->id;
            $newBook->book_id = $randBook;
            $newBook->quantity = rand(1, 5);
            $newBook->save();

            $addToTotal = Book::with('sale')
                ->where('id', '=', $newBook->book_id)
                ->first();

            $total += $addToTotal->sale->student_price * $newBook->quantity;


            $randBook = rand(1, $countBook);

            $newBook = new OrderBook();
            $newBook->order_id = $order->id;
            $newBook->book_id = $randBook;
            $newBook->quantity = rand(1, 5);
            $newBook->save();

            $addToTotal = Book::with('sale')
                ->where('id', '=', $newBook->book_id)
                ->first();

            $total += $addToTotal->sale->student_price * $newBook->quantity;

            $order->total_price = $total;
            $order->save();
        }
    }
}
