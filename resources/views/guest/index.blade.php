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
    <title>Deliveboo</title>

    {{-- favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <meta name="msapplication-TileColor" content="#FFF">
    <meta name="theme-color" content="#FFF">

</head>

<body>
    <div id="app">

    </div>
    <script src="{{ asset('/js/front.js') }}"></script>
</body>

</html>
