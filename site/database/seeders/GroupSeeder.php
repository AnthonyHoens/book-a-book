<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
           'number' => '2181',
        ]);
        Group::create([
            'number' => '2182',
        ]);
        Group::create([
            'number' => '2183',
        ]);
        Group::create([
            'number' => '2184',
        ]);
        Group::create([
            'number' => '2185',
        ]);
        Group::create([
            'number' => '2189',
        ]);
        Group::create([
            'number' => '2190',
        ]);
        Group::create([
            'number' => '2281',
        ]);
        Group::create([
            'number' => '2283',
        ]);
        Group::create([
            'number' => '2284',
        ]);
        Group::create([
            'number' => '2285',
        ]);
        Group::create([
            'number' => '2381',
        ]);
        Group::create([
            'number' => '2383',
        ]);
        Group::create([
            'number' => '2384',
        ]);
    }
}
