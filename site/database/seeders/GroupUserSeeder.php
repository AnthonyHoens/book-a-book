<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $group = Group::all();

        foreach ($users as $user) {
            $randGroup = rand(1, $group->count() - 1);
            GroupUser::create([
               'user_id' => $user->id,
               'group_id' => $group[$randGroup]->id,
            ]);
        }
    }
}
