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
                                id: {{ $dish['id'] }}
                            </li>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
