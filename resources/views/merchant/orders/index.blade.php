@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/merchant">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ordini</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Ordine</th>
                              <th scope="col">Data</th>
                              <th scope="col">Ora</th>
                              <th scope="col">Cliente</th>
                              <th scope="col">Totale</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($orders as $order)
                            <tr>
                              <td>{{$order['id']}}</td>
                              <td>{{$order->created_at->format('d/m/Y')}}</td>
                              <td>{{$order->created_at->format('h:m')}}</td>
                              <td>{{$order['customer_firstname'] . ' ' . $order['customer_lastname']}}</td>
                              <td>{{$order['total_price']}}€</td>
                              <td>
                                <a href="{{route('merchant.orders.show', $order['id'])}}"><button type="button" class="btn-small btn-success">Dettagli</button></a>
                            </tr>  
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
