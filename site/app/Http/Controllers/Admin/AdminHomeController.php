<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        $orders = Order::with('user', 'statut')
            ->where('validated_at', '!=', null)
            ->get()->filter(function ($order) {
                return $order->statut->id!= 3;
            })->except(1);

        $histories = History::with('user')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('app.admin.home.index', compact('orders', 'histories'));
    }
}
