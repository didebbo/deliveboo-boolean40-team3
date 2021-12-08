@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profilo ristorante</div>
                    <div class="card-body">
                        <h3>Nome ristorante: {{ $user['name'] }}</h3>
                        <p>email: {{ $user['email'] }}</p>
                        <p>Città: {{ $user['city'] }}</p>
                        <p>Indirizzo: {{ $user['address'] }}</p>
                        <p>vat: {{ $user['vat'] }}</p>
                        <p>Messaggio di presentazione: {{ $user['adv'] }}</p>
                        {{-- todo inserire foto --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
