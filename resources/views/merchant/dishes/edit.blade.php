@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form action="{{ route('merchant.dishes.update', $dish) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ old('name') ?? $dish['name'] }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="ingredients" id="ingredients"
                                    placeholder="ingredients">{{ old('ingredients') ?? $dish['ingredients'] }}</textarea>
                                @error('ingredients')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="description">{{ old('description') ?? $dish['description'] }}</textarea>
                                @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="price" name="price" placeholder="price"
                                    value="{{ old('price') ?? $dish['price'] }}">
                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select id="visible" name="visible" class="form-control form-control-sm">
                                    <option value="0">not visible</option>
                                    <option value="1">visible</option>
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
                                <button type="submit" class="btn btn-primary">Applica</button>
                                <a href="{{ route('merchant.dishes.show', $dish['id']) }}"
                                    class="btn btn-danger">Annulla</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
