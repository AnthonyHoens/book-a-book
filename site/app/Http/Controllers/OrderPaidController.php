<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderPaidController extends Controller
{
    public function index(Order $order)
    {
        return view('app.student.order.paid.index', compact('order'));
    }
}
