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
                        <button type="button" class="btn btn-danger btn-delete" data-id="{{$dish["id"]}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        <a href="{{ route('merchant.dishes.index') }}" class="btn btn-primary float-right">
                            Tutti i piatti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Elimina Piatto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{route('merchant.dishes.destroy', 'id')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-id" name="id">
            <div class="modal-body">Sei sicuro di voler cancellare il piatto?</div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Cancella</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
            </div>
        </form>
        </div>
    </div>
    </div>
@endsection
