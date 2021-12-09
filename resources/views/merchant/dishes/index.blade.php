@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">I tuoi piatti</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <ul class="list-unstyled">
                                @foreach ($dishes as $dish)
                                    <li>
                                        <a href="{{ route('merchant.dishes.show', $dish['id']) }}">
                                            {{ $dish['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a class="btn btn-primary" href="{{ url('/merchant/dishes/create') }}">Aggiungi Piatto</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
