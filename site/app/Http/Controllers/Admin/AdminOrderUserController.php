<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderUserController extends Controller
{
    public function index($user)
    {
        $student = User::where('slug', '=', $user)
            ->first();

        $orders = Order::with('user', 'statut', 'books.authors', 'books.sale')
            ->where('user_id', '=', $student->id)
            ->get();

        $unfinishedOrders = $orders->where('validated_at', '=', null);

        $orders = $orders->where('validated_at', '!=', null);

        $statuts = Statut::all()->except(4);

        return view('app.admin.order.user.index', compact('orders', 'unfinishedOrders', 'student', 'statuts'));
    }

    public function show($user, $order)
    {
        $student = User::where('slug', '=', $user)
            ->first();

        $orders = Order::with('user', 'statut', 'books.authors', 'books.sale')
            ->where('validated_at', '!=', null)
            ->get();

        $otherOrders = $orders->filter(function ($order) {
            return $order->statut->id != 3;
        })->shuffle()->take(3);

        $orders = $orders->where('user_id', '=', $student->id)
            ->where('order_number', '=', $order)->first();

        $otherOrders = $otherOrders->except($orders->id);

        $statuts = Statut::all()->except(4);

        return view('app.admin.order.user.show', compact('orders', 'otherOrders', 'student', 'statuts'));
    }

    public function update() {
        $order = Order::where('id', '=', \request('order_id'))->first();
        $order->statut_id = \request('statut');
        $order->save();

        return redirect()->route('admin.order.page');
    }
}
