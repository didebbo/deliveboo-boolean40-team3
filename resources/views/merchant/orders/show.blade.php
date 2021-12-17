@extends('layouts.app')

@section('content')
   {{-- @dd(json_decode($order, true)) --}}
   @php
       $order = json_decode($order, true);
   @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/merchant">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/merchant/orders">Ordini</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Odine: {{$order['id']}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled" id="order-show">
                            <li>
                                <p>Data Ordine</p>
                                <h5>{{ $order['date']}}</h5>
                            </li>
                            <li>
                                <p>nome cliente</p>
                                <h5>{{ $order['customer_firstname'] . ' ' . $order['customer_lastname']}}</h5>
                            </li>
                            <li>
                                <p>email cliente</p>
                                <h5>{{ $order['customer_email']}}</h5>
                            </li>
                            <li>
                                <p>telefono cliente</p>
                                <h5>{{ $order['customer_phone']}}</h5>
                            </li>
                            <li>
                                <p>indirizzo cliente</p>
                                <h5>{{ $order['customer_address']}}</h5>
                            </li>
                            <li>
                                <p>piatti ordinati</p>
                                <ul class="list-unstyled">
                                   @foreach ($order['dishes'] as $dish)

                                       <li>
                                           <h5>{{ $dish['name'] }} <span style="margin-left: 40px">x {{$dish['pivot']['quantity']}}</span></h5> 
                                       </li>
                                   @endforeach
                                </ul>
                            </li>
                            <li>
                                <p>prezzo totale</p>
                                <h5>{{ $order['total_price']}}€</h5>
                            </li>
                        </ul>
                        <a href="{{ route('merchant.orders.index') }}" class="btn-success">
                            Tutti gli ordini
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
