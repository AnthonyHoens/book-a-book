<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            BookSeeder::class,
            AuthorSeeder::class,
            StatutSeeder::class,
            NotificationSeeder::class,
            HistorySeeder::class,
            SaleSeeder::class,
            OrderSeeder::class,
            OrderStatutSeeder::class,
            GroupSeeder::class,
            GroupUserSeeder::class,
            ObligatoryBooksSeeder::class,
        ]);
    }
}
