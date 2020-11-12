<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('books.authors', 'books.sale')
            ->where('user_id', '=', Auth::id())
            ->get();

        return view('app.student.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $orders = Order::with('books')
            ->where('order_number', '=', $order->order_number)
            ->first();

        return view('app.student.order.show', compact('orders'));
    }

    public function update() {

    }

    public function delete() {

    }

}
