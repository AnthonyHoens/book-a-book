<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        $orders = Order::with('user', 'statuts')
            ->where('validated_at', '!=', null)
            ->get();

        return view('app.admin.home.index', compact('orders'));
    }
}
