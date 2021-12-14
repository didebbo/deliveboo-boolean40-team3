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
                                <li class="breadcrumb-item"><a href="/merchant/dishes">Piatti</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $dish['name'] }}</li>
                            </ol>
                        </nav>
                        
                    </div>

                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                name: {{ $dish['name'] }}
                            </li>
                            <li>
                                ingredients: {{ $dish['ingredients'] }}
                            </li>
                            <li>
                                description: {{ $dish['description'] }}
                            </li>
                            <li>
                                price: {{ $dish['price'] }}€
                            </li>
                        </ul>
                        @if ($dish['url_picture'])
                            <div class="mb-2">
                                <img style="width: 90%" src="{{ asset('/storage/' . $dish['url_picture']) }}">
                            </div>
                        @endif
                        <a href="{{ route('merchant.dishes.edit', $dish['id']) }}" class="btn btn-primary">
                            Edit
                        </a>
                        <form style="display: inline-block" action="{{ route('merchant.dishes.destroy', $dish['id']) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('merchant.dishes.index') }}" class="btn btn-primary float-right">
                            Tutti i piatti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
