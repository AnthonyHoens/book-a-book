<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Group;
use App\Models\ObligatoryBook;
use Illuminate\Database\Seeder;

class ObligatoryBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();

        $group = Group::all();

        foreach ($books as $book) {
            $randGroup = rand(1, $group->count() - 1);
            ObligatoryBook::create([
               'book_id' => $book->id,
                'group_id' => $group[$randGroup]->id,
            ]);
        }
    }
}
