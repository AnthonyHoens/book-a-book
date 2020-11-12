<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statut::create([
            'name' => 'En attente de paiement',
        ]);
        Statut::create([
            'name' => 'Commandé',
        ]);
        Statut::create([
           'name' => 'Livré',
        ]);
    }
}
