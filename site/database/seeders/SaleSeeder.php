<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();

        function f_rand($min=0,$max=1,$mul=1000000){
            if ($min>$max) return false;
            return mt_rand($min*$mul,$max*$mul)/$mul;
        }

        foreach ($books as $book) {
            $rand = f_rand(10, 30, 3);
            Sale::create([
                'book_id' => $book->id,
                'starting_price' => $rand,
                'student_price' => $rand + f_rand(1, 3, 2),
            ]);
        }
    }
}
