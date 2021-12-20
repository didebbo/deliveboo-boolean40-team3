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
                                <li class="breadcrumb-item"><a href="/merchant/profile">{{ $user['name'] }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <h3>{{ $user['name'] }}</h3>
                        <form action="{{ route('merchant.profile.update', $user) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-label" for="city">Città</label>
                                <select name="city" id="city" class="form-control" required autocomplete="city">
                                    <option value="milan">Milano</option>
                                </select>
                                @error('city')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="address">Indirizzo</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="address"
                                    value="{{ old('address') ?? $user['address'] }}" required>
                                @error('address')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="adv">Messaggio di presentazione</label>
                                <textarea name="adv" id="adv" class="form-control" autocomplete="adv"
                                    placeholder="adv">{{ old('adv') ?? $user['adv'] }}</textarea>
                                @error('adv')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">                                
                                <div><label for="url_picture">Immagine di copertina</label></div>        
                                <input type="file" id="url_picture" name="url_picture" accept="image/jpeg">
                                @error('url_picture')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Categorie</label> 
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        @if ($errors->any())
                                            <input type="checkbox"
                                                {{ in_array($user['categories'], old('categories', [])) ? 'checked' : null }}
                                                name="categories[]" id="{{ 'category-' . $category['id'] }}"
                                                value="{{ $category['id'] }}" class="form-check-input">
                                        @else
                                            <input type="checkbox"
                                                {{ $user['categories']->contains($category['id']) ? 'checked' : null }}
                                                name="categories[]" value="{{ $category['id'] }}" class="form-check-input"
                                                id="{{ 'category-' . $category['id'] }}">
                                        @endif
                                        <label class="form-check-label"
                                            for="{{ 'category-' . $category['id'] }}">{{ $category['name'] }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn-alert mb-3">Modifica</button>
                            <a href="{{ route('merchant.profile.show') }}" class="btn-danger">Annulla</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
