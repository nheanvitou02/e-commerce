<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order  = Order::with('invoice')->when(request()->q, function ($order) {
            $order = $order->where('invoce', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);

        return OrderResource::collection($order);
    }
}
