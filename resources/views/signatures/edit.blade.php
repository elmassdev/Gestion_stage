<!-- resources/views/signatures/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container my-2">
    <div class="card my-4">
        <div class="card-header"> Modifier l'en-tête  </div>
        <div class="row  card-body">
            <div class="col border border-solid rounded pt-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('signatures.update', ['id' => $signature->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="logo" class="col-md-3 col-form-label text-md-left">Logo</label>
                    <div class="col-md-8">
                        @if ($signature->logo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/images/logos/'.$signature->logo) }}" alt="Logo" style="max-width: 150px; max-height: 100px;">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" value="{{ old('logo', $signature->logo) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="head1" class="col-md-3 col-form-label text-md-left">Ligne 1</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head1" name="head1" value="{{ old('head1', $signature->head1) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head2" class="col-md-3 col-form-label text-md-left">Ligne 2</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head2" name="head2" value="{{ old('head2', $signature->head2) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head3" class="col-md-3 col-form-label text-md-left">Ligne 3</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head3" name="head3" value="{{ old('head3', $signature->head3) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head4" class="col-md-3 col-form-label text-md-left">Ligne 4</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head4" name="head4" value="{{ old('head4', $signature->head4) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign1" class="col-md-3 col-form-label text-md-left">Signature  1</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign1" name="sign1" value="{{ old('sign1', $signature->sign1) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign2" class="col-md-3 col-form-label text-md-left">Signature  2</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign2" name="sign2" value="{{ old('sign2', $signature->sign2) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign_op" class="col-md-3 col-form-label text-md-left">Signature OP</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign_op" name="sign_op" value="{{ old('sign_op', $signature->sign_op) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sigle" class="col-md-3 col-form-label text-md-left">Sigle</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sigle" name="sigle" value="{{ old('sigle', $signature->sigle) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-md-3 col-form-label text-md-left">Phone</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $signature->phone) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Fax" class="col-md-3 col-form-label text-md-left">Fax</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="Fax" name="Fax" value="{{ old('Fax', $signature->Fax) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="site" class="col-md-3 col-form-label text-md-left">site</label>
                    <div class="col-md-8">
                        <select id="site" type="text"   class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
                            <option value="{{$signature->site}}" selected>{{$signature->site}}</option>
                            <option value="Benguerir">Benguerir</option>
                            <option value="Youssoufia"> Youssoufia</option>
                        </select>
                        @error('site')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="is_active" class="col-md-3 col-form-label text-md-left">Activé</label>
                    <div class="col-md-8">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $signature->is_active) ? 'checked' : '' }}>
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-md-3 mx-auto">Mettre à jour</button>
                <a href="{{ route('signatures.index') }}" class="btn btn-warning col-md-3 mx-auto">Annuler</a>
            </form>
</div>
@endsection
