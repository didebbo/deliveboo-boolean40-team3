<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    protected $validator = [
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
        $newOrder = new Order();
        $newOrder->fill($request->all());
        $newOrder['user_id'] = 1;
        $newOrder['total_price'] = 17;
        $newOrder['status'] = 1;
        $newOrder->save();        

        return redirect()->route('guest.index');
    }

}
