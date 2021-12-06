@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <h2>Dettagli Ordine</h2>
                    <div class="card-body">
                        @dd($order)
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
