<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderStatut;
use App\Models\Statut;
use Illuminate\Database\Seeder;

class OrderStatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $statutCount = Statut::all()->count();

        foreach ($orders as $order) {
            OrderStatut::create([
                'order_id' => $order->id,
                'statut_id' => rand(1, $statutCount)
            ]);
        }
    }
}
