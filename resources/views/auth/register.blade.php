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

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Insert City') }}</label>

                                <div class="col-md-6">
                                    <select name="city" id="city" class="form-control" required autocomplete="city">
                                        <option value="milan">Milano</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Insert Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required
                                        autocomplete="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Insert Vat') }}</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text" class="form-control" name="vat" autocomplete="vat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adv"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Insert Adv') }}</label>

                                <div class="col-md-6">
                                    <textarea name="adv" id="adv" class="form-control" autocomplete="adv"></textarea>
                                </div>
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
