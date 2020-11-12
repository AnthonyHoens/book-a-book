<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Spirlet';
        $firstName = 'Xavier';
        User::create([
            'name' => 'Spirlet',
            'first_name' => 'Xavier',
            'slug' => Str::slug($name . ' ' . $firstName),
            'email' => 'spirlet.xavier@hepl.be',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $name = 'Hoens';
        $firstName = 'Anthony';
        User::create([
            'name' => 'Hoens',
            'first_name' => 'Anthony',
            'slug' => Str::slug($name . ' ' . $firstName),
            'image' => 'image.png',
            'email' => 'hoens.anthony@student.hepl.be',
            'email_verified_at' => now(),
            'group' => '2285',
            'password' => Hash::make('anthony'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()
            ->times(15)
            ->create();

    }
}
