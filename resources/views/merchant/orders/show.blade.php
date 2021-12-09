@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dettagli ordine</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                Nome cliente: {{ $order['customer_firstname'] . ' ' . $order['customer_lastname']}}
                            </li>
                            <li>
                                email cliente: {{ $order['customer_email']}}
                            </li>
                            <li>
                                telefono cliente: {{ $order['customer_phone']}}
                            </li>
                            <li>
                                indirizzo cliente: {{ $order['customer_address']}}
                            </li>
                            <li>
                                Piatti ordinati: Pasta Carbonara, Pizza Margherita
                            </li>
                            <li>
                                prezzo totale: {{ $order['total_price']}}€
                            </li>
                        </ul>
                        <a href="{{ route('merchant.orders.index') }}" class="btn btn-primary">
                            Tutti gli ordini
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
