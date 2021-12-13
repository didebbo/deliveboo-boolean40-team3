@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $dish['name'] }}</div>

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
                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Cancellare {{ $dish['name'] }}
                                    </div>
                                    <div class="modal-footer">
                                        <form style="display: inline-block"
                                            action="{{ route('merchant.dishes.destroy', $dish['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('merchant.dishes.index') }}" class="btn btn-primary">
                            Tutti i piatti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
