<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderBook;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function randomNumber($count) :string {
            $number = 0;

            for($i = 0; $i < $count; $i++) {
                $rand = rand(0,9);
                $number = $number . strval($rand);
            }

            return $number;
        }


        $users = User::all();
        $countBook = Book::all()->count();

        foreach ($users as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => randomNumber(32),
                'validated_at' => now(),
            ]);
            OrderBook::create([
                'order_id' => $order->id,
                'book_id' => rand(1, $countBook),
                'quantity' => rand(1, 5),
            ]);
            OrderBook::create([
                'order_id' => $order->id,
                'book_id' => rand(1, $countBook),
                'quantity' => rand(1, 5),
            ]);
            OrderBook::create([
                'order_id' => $order->id,
                'book_id' => rand(1, $countBook),
                'quantity' => rand(1, 5),
            ]);
        }
    }
}
