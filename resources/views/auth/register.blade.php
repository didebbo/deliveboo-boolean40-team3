@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password" required>
                                @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="password_confirmation" required>
                                @error('password_confirmation')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <select name="city" id="city" class="form-control" required autocomplete="city">
                                    <option value="milan">Milano</option>
                                </select>
                                @error('city')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="address" name="address" placeholder="address"
                                    value="{{ old('address') }}" required>
                                @error('address')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="vat" name="vat" placeholder="vat"
                                    value="{{ old('vat') }}" required>
                                @error('vat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="adv" id="adv" class="form-control" autocomplete="adv"
                                    placeholder="adv">{{ old('adv') }}</textarea>
                                @error('adv')
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

                    {{-- TODO upload immagine ristorante (non obligatorio) --}}

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
