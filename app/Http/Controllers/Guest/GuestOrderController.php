<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    protected $validator = [
        'user_id' => 'required|exists:users,id',
        'total_price' => 'required|numeric|min:0|max:9999.99',
        'status' => 'required|numeric|min:0|max:2',
        'customer_email' => 'required|string|max:255',
        'customer_firstname' => 'required|string|max:50',
        'customer_lastname' => 'required|string|max:50',
        'customer_phone' => 'required|string|max:20',
        'customer_address' => 'required|string|max:150',
        'notes' => 'nullable|max:255'
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guest.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validator);
        $newOrder = Order::create($request->all());
        
        $newOrder->dishes()->attach($request['categories']);

        return redirect()->route('guest.index');
    }

}
