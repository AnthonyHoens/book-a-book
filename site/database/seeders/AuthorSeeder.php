<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            'Alain Beaulet',
            'David Rault',
            'Collectif Imprimerie Nationale',
            'Rodolphe Rimelé',
        ];

        foreach ($authors as $author) {
            Author::create([
               'name' => $author,
            ]);
        }
    }
}
