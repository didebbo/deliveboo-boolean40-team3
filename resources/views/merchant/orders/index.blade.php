@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ordini</div>
                    <div class="card-body">
                        <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Totale</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <th scope="row">{{$order['id']}}</th>
                        <td>{{$order['customer_email']}}</td>
                        <td>{{$order['total_price']}}€</td>
                        <td>
                          <a href="{{route('merchant.orders.show', $order['id'])}}"><button type="button" class="btn btn-primary">Dettagli</button></a>
                      </tr>  
                      @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
