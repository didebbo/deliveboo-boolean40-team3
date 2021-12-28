<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders->sortByDesc('created_at');
        return view('merchant.orders.index', compact('orders'));
    }

    public function statistics()
    {
        $orders = Auth::user()->orders;
        return view('merchant.orders.statistics', compact('orders'));
    }

    public function show(Order $order)
    {
        
        if ($order['user_id'] != Auth::id()) {
                abort(403);
            }
        $order = $order->where('id', $order['id'])->with('dishes')->first();
        $order['date'] = $order->created_at->format('d/m/Y h:m');
        $order = json_encode($order);

        return view('merchant.orders.show', compact('order'));
    }
}
