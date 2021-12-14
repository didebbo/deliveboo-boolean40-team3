@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/merchant">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $user['name'] }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <h3>Nome ristorante: {{ $user['name'] }}</h3>
                        <p>email: {{ $user['email'] }}</p>
                        <p>Città: {{ $user['city'] }}</p>
                        <p>Indirizzo: {{ $user['address'] }}</p>
                        <p>vat: {{ $user['vat'] }}</p>
                        <p>Messaggio di presentazione: {{ $user['adv'] }}</p>
                        @if ($user['url_picture'])
                            <div class="mb-2">
                                <img class="img-thumbnail" src="{{ asset('/storage/' . $user['url_picture']) }}">
                            </div>
                        @endif
                        <a href="{{ route('merchant.profile.edit') }}" class="btn btn-primary">
                            Modifica
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
