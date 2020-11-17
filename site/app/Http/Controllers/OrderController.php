<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use App\Traits\OrderNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use OrderNumber;

    public function index()
    {
        $orders = Order::with('books.authors', 'books.sale')
            ->where('user_id', '=', Auth::id())
            ->orderBy('id', 'DESC')
            ->get();


        return view('app.student.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('app.student.order.show', compact('order'));
    }

    public function store()
    {
        $lastOrderNumber = Order::where('id', '=', \request('last_order_id'))
            ->first()->number_of_order_by_user;

        $order = new Order();

        $order->user_id = Auth::id();
        $order->order_number = $this->randomNumber(32);
        $order->number_of_order_by_user = ++$lastOrderNumber;
        $order->total_price = 0;
        $order->validated_at = null;

        $order->save();

        return redirect()->route('home.page');
    }

    public function update()
    {
        $order = Order::where('id', '=', \request('order_id'))->first();

        $order->validated_at = Carbon::now();
        $order->save();

        return redirect()->route('order.paid.page', $order->order_number);
    }

    public function delete()
    {
        $order = Order::where('id', '=', \request('order_id'))->first();
        $order->delete();

        return redirect()->route('order.page');
    }
}
