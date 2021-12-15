@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header user-title">
                        <h2>Registrati come nuovo ristoratore</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome del ristorante</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="nome"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password">
                                @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Conferma password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="conferma password">
                                @error('password_confirmation')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">Città</label>
                                <select name="city" id="city" class="form-control">
                                    <option value="milan">Milano</option>
                                </select>
                                @error('city')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Indirizzo del ristorante</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="indirizzo"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Numero di Partita Iva</label>
                                <input type="number" class="form-control" id="vat" name="vat" placeholder="partita iva"
                                    value="{{ old('vat') }}">
                                @error('vat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adv">Messaggio di presentazione</label>
                                <textarea name="adv" id="adv" class="form-control"
                                    placeholder="messaggio di presentazione">{{ old('adv') }}</textarea>
                                @error('adv')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="file" id="url_picture" name="url_picture" accept="image/jpeg">
                                @error('url_picture')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @foreach ($categories as $category)
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="categories[]"
                                        id="{{ 'category-' . $category['id'] }}" value="{{ $category['id'] }}"
                                        @if (old('categories') && in_array($category['id'], old('categories')))
                                    checked
                            @endif
                            >
                            <label class="form-check-label"
                                for="{{ 'category-' . $category['id'] }}">{{ $category['name'] }}</label>
                    </div>
                    @endforeach

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn-success">Registrati</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
