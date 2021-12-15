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
                        <ul class="list-unstyled" id="order-show">
                            <li>
                                <p>Nome ristorante</p>
                                <h5>{{ $user['name'] }}</h5>
                            </li>
                            <li>
                                <p>Email</p>
                                <h5>{{ $user['email'] }}</h5>
                            </li>
                            <li>
                                <p>Città</p>
                                <h5>{{ $user['city'] }}</h5>
                            </li>
                            <li>
                                <p>Indirizzo</p>
                                <h5>{{ $user['address'] }}</h5>
                            </li>
                            <li>
                                <p>Partita Iva</p>
                                <h5>{{ $user['vat'] }}</h5>
                            </li>
                            <li>
                                <p>Messaggio di presentazione</p>
                                <h5>{{ $user['adv'] }}</h5>
                            </li>
                        </ul>
                        @if ($user['url_picture'])
                            <div class="mb-2">
                                <p id="tit-img-rist">Immagine Ristorante</p>
                                <img class="img-user-profile" src="{{ asset('/storage/' . $user['url_picture']) }}">
                            </div>
                        @endif
                        <a href="{{ route('merchant.profile.edit') }}" class="btn-success">
                            Modifica
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
