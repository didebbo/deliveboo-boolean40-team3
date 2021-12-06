@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <ul>
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
                                price: {{ $dish['price'] }}
                            </li>
                        </ul>
                        <a href="{{ route('merchant.dishes.edit', $dish['id']) }}" class="btn btn-primary">
                            Edit
                        </a>
                        <a href="{{ route('merchant.dishes.destroy', $dish['id']) }}" class="btn btn-danger">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
