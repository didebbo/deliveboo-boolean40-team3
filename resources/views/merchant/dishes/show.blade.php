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
                        <ul class="list-unstyled" id="dish-show">
                            <li>
                                <p>Nome piatto</p>
                                <h5>{{ $dish['name'] }}</h5>
                            </li>
                            <li>
                                <p>Ingredienti</p>
                                <h5>{{ $dish['ingredients'] }}</h5>
                            </li>
                            <li>
                                <p>Descrizione</p>
                                @if ($dish['description'])
                                    <h5>{{ $dish['description'] }}</h5>
                                @else
                                    <h5><i>nessuna descrizione inserita</i></h5>
                                @endif
                            </li>
                            <li>
                                <p>Prezzo</p>
                                <h5>{{ $dish['price'] }}€</h5>
                            </li>
                            {{-- <li>
                                <p>Visibilità</p>
                                <h5>
                                    @if ($dish['visible']) 
                                        visibile                                        
                                    @else                                        
                                        nascosto
                                    @endif
                                </h5>
                            </li> --}}
                        </ul>
                        @if ($dish['url_picture'])
                            <div class="mb-2">
                                <p class="tit-img">Immagine Piatto</p>
                                <img class="img-preview" src="{{ asset('/storage/' . $dish['url_picture']) }}">
                            </div>
                        @endif
                        <a href="{{ route('merchant.dishes.edit', $dish['id']) }}" class="btn-alert">
                            Modifica
                        </a>
                        <a type="button" class="btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Elimina
                        </a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminazione piatto</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare {{ $dish['name'] }}?
                                    </div>
                                    <div class="modal-footer">
                                        <form style="display: inline-block"
                                            action="{{ route('merchant.dishes.destroy', $dish['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                        <button type="button" class="btn-success" data-dismiss="modal">Annulla</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('merchant.dishes.index') }}" class="btn-success float-right">
                            Tutti i piatti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
