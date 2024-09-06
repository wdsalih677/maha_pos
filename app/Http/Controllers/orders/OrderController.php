<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Models\clients\Client;
use App\Models\clients\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return view('orders.order',compact('orders'));
    }

    public function getOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show' , compact('order'));
    }

}