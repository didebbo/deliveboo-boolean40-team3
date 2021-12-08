@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <h2>Modifica profilo ristorante</h2>
                    <div class="card-body">
                        
                        <form action="{{ route('merchant.profile.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

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
                                    value="{{ old('address') ?? $user['address']}}" required>
                                @error('address')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="adv" id="adv" class="form-control" autocomplete="adv"
                                    placeholder="adv">{{ old('adv') ?? $user['adv']}}</textarea>
                                @error('adv')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @foreach ($categories as $category)
                                <div class="form-group form-check">
                                    @if ($errors->any())
                                        <input type="checkbox" {{in_array($user['categories'], old('categories', [])) ? 'checked' : null}} name="categories[]" id="{{ 'category-' . $category['id'] }}" value="{{ $category['id'] }}" class="form-check-input" >
                                    @else
                                        <input type="checkbox" {{$user['categories']->contains($category['id']) ? 'checked' : null}} name="categories[]" value="{{$category['id']}}" class="form-check-input" id="{{'category-' . $category['id']}}">
                                    @endif
                                    <label class="form-check-label" for="{{ 'category-' . $category['id'] }}">{{ $category['name'] }}</label>
                                </div>
                            @endforeach
                            
                                {{-- TODO upload immagine ristorante (non obligatorio) --}}

                            <button type="submit" class="btn btn-primary">Modifica</button>
                            <a href="{{ route('merchant.profile.show') }}" class="btn btn-danger">Annulla</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
