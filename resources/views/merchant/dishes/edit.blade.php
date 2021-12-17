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
                                <li class="breadcrumb-item"><a href="/merchant/dishes/{{$dish['id']}}">{{ $dish['name'] }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('merchant.dishes.update', $dish) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome piatto</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ old('name') ?? $dish['name'] }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ingredients">Ingredienti</label>
                                <textarea class="form-control" name="ingredients" id="ingredients"
                                    placeholder="ingredients">{{ old('ingredients') ?? $dish['ingredients'] }}</textarea>
                                @error('ingredients')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="description">{{ old('description') ?? $dish['description'] }}</textarea>
                                @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                @php
                                    if ($errors->any()) {
                                        $beverage = old('beverage') ? 1 : 0;
                                    } else {
                                        $beverage = $dish['beverage'];
                                    }
                                @endphp
                                <input type="checkbox" name="beverage" id="beverage" @if ($beverage)
                                checked
                                @endif
                                >
                                <label for="beverage">Beverage</label>
                                @error('beverage')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo in €</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    placeholder="price" value="{{ old('price') ?? $dish['price'] }}">
                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="price">Visibilità</label>
                                <select id="visible" name="visible" class="form-control form-control-sm">
                                    <option {{ old('visible')==0 || $dish['visible']==0 ? 'selected' : null }} value="0">non visibile</option>
                                    <option {{ old('visible')==1 || $dish['visible']==1 ? 'selected' : null }} value="1">visibile</option>
                                </select>
                                @error('visible')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <input type="file" id="url_picture" name="url_picture" accept="image/jpeg">
                                @error('url_picture')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-alert">Modifica</button>
                                <a href="{{ route('merchant.dishes.show', $dish['id']) }}"
                                    class="btn-danger">Annulla</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
