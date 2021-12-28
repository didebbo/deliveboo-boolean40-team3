@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header user-title">
                        <h2>{{ $user['name'] }}</h2>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-white" href="{{ url('/merchant/profile') }}">Il Mio Ristorante</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{ route('merchant.dishes.index') }}">Piatti</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{ route('merchant.orders.index') }}">Ordini</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
