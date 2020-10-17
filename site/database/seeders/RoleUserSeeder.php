<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        RoleUser::create([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        $users = User::all();
        $users = $users->except([1,2]);

        foreach ($users as $user) {
            RoleUser::create([
               'user_id' => $user->id,
               'role_id' => 2,
            ]);
        }
    }
}
