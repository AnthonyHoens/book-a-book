<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index() {
        $orders = Order::with('user', 'statut')
            ->where('validated_at', '!=', null)
            ->get()
            ->filter(function ($order) {
                return $order->statut->id != 3;
            })->except(1);

        return view('app.admin.order.index', compact('orders'));
    }
}
