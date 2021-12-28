<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Order;
use Braintree;
use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    protected $validator = [
        'order.customer_email' => 'required|email|max:255',
        'order.customer_firstname' => 'required|string|max:50',
        'order.customer_lastname' => 'required|string|max:50',
        'order.customer_phone' => 'required|string|max:20',
        'order.customer_address' => 'required|string|max:150',
        'order.notes' => 'nullable|max:255'
    ];

    public function checkout(Request $request)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $gateway = new Braintree\Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env('BT_MERCHANT_ID'),
            'publicKey' => env('BT_PUBLIC_KEY'),
            'privateKey' => env('BT_PRIVATE_KEY'),
        ]);
        $nonceFromTheClient = $data["nonce"];
        $result = $gateway->transaction()->sale([
            'amount' => $data['order']['total_price'],
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        if ($result->success) {
            $data['order']['status'] = 0;
            $order = Order::create($data['order']);
            $dishes = [];
            foreach ($data['dishes'] as $dish) {
                $dishes[] = [
                    'dish_id' => $dish['dish_id'],
                    'quantity' => $dish['quantity']
                ];
            }
            $order->dishes()->attach($dishes);
        }
        return response()->json(['success' => $result->success]);
    }
}
