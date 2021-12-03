@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form action="{{route('merchant.dishes.update', $dish)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">modifica</button>
                            </div>
                       </form>

                       <form action="{{route('merchant.dishes.destroy', $dish)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">elimina</button>
                            </div>
                       </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
