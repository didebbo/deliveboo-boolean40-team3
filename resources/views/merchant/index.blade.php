@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user['name'] }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-muted" href="{{ url('/merchant/profile') }}">My Restaurant</a>
                                </li>
                                <li>
                                    <a class="text-muted" href="{{ route('merchant.dishes.index') }}">Dishes</a>
                                </li>
                                <li>
                                    <a class="text-muted" href="{{ route('merchant.orders.index') }}">Orders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
