@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuovo Ordine</div>

                    <div class="card-body">
                        <form action="{{ route('guest.orders.store') }}" method="POST">
                            @csrf


                            <div class="form-group">
                                <label for="user_id">user_id</label>
                                <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                    name="user_id" placeholder="Inserisci email" value="{{ old('user_id') }}">
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total_price">total_price</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('total_price') is-invalid @enderror" id="total_price"
                                    name="total_price" placeholder="Inserisci email" value="{{ old('total_price') }}">
                                @error('total_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">status</label>
                                <input type="number" class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" placeholder="Inserisci email" value="{{ old('status') }}">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_email">Email</label>
                                <input type="text" class="form-control @error('customer_email') is-invalid @enderror"
                                    id="customer_email" name="customer_email" placeholder="Inserisci email"
                                    value="{{ old('customer_email') }}">
                                @error('customer_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_firstname">Nome</label>
                                <input type="text" class="form-control @error('customer_firstname') is-invalid @enderror"
                                    id="customer_firstname" name="customer_firstname" placeholder="Inserisci il tuo nome"
                                    value="{{ old('customer_firstname') }}">
                                @error('customer_firstname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_lastname">Cognome</label>
                                <input type="text" class="form-control @error('customer_lastname') is-invalid @enderror"
                                    id="customer_lastname" name="customer_lastname" placeholder="Inserisci il tuo nome"
                                    value="{{ old('customer_lastname') }}">
                                @error('customer_lastname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_phone">Telefono</label>
                                <input type="text" class="form-control @error('customer_phone') is-invalid @enderror"
                                    id="customer_phone" name="customer_phone" placeholder="Inserisci il tuo nome"
                                    value="{{ old('customer_phone') }}">
                                @error('customer_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_address">Indirizzo</label>
                                <input type="text" class="form-control @error('customer_address') is-invalid @enderror"
                                    id="customer_address" name="customer_address" placeholder="Inserisci il tuo nome"
                                    value="{{ old('customer_address') }}">
                                @error('customer_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="notes">Note</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" rows="3"
                                    name="notes"
                                    placeholder="Inserisci delle note aggiuntive">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
