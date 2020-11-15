<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\User;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {

            History::create([
                'user_id' => $user->id,
                'title' => 'Compte',
                'message' => 'Création de votre compte.',
            ]);
        }
    }
}
