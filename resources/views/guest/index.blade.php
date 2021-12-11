<!DOCTYPE html>
<html lang="en">
@php
$gateway = new Braintree\Gateway([
    'environment' => env('BT_ENVIRONMENT'),
    'merchantId' => env('BT_MERCHANT_ID'),
    'publicKey' => env('BT_PUBLIC_KEY'),
    'privateKey' => env('BT_PRIVATE_KEY'),
]);
$clientToken = $gateway->clientToken()->generate();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="clientToken" content="{{ $clientToken }}">
    <title>Document</title>
</head>

<body>
    <div id="app">

    </div>
    <script src="{{ asset('/js/front.js') }}"></script>
</body>

</html>
