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
                                <li class="breadcrumb-item active" aria-current="page">Nuovo Piatto</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body ">
                        <form action="{{ route('merchant.dishes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome piatto</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ingredients">Ingredienti</label>
                                <textarea class="form-control" name="ingredients" id="ingredients"
                                    placeholder="ingredients">{{ old('ingredients') }}</textarea>
                                @error('ingredients')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="beverage" id="beverage" @if (old('beverage'))
                                checked
                                @endif>
                                <label for="beverage">Beverage</label>
                                @error('beverage')
                                    <small class="form-text text-danger" )>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo in €</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    placeholder="price" value="{{ old('price') }}">
                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Visibilità</label>
                                <select id="visible" name="visible" class="form-control form-control-sm">
                                    <option value="0">non visibile</option>
                                    <option value="1">visibile</option>
                                </select>
                                @error('visible')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" id="url_picture" name="url_picture" accept="image/jpeg">
                                @error('url_picture')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-success">Salva</button>
                                <a href="{{ route('merchant.dishes.index') }}" class="btn-danger">Annulla</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
