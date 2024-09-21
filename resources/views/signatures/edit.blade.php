<!-- resources/views/signatures/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Signature</h1>

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

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            @if ($signature->logo)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/logos/'.$signature->logo) }}" alt="Logo" style="max-width: 150px; max-height: 100px;">
                </div>
            @endif
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*" value="{{ old('logo', $signature->logo) }}>
        </div>

        <div class="mb-3">
            <label for="head1" class="form-label">Ligne 1</label>
            <input type="text" class="form-control" id="head1" name="head1" value="{{ old('head1', $signature->head1) }}" required>
        </div>
        <div class="mb-3">
            <label for="head2" class="form-label">Ligne 2</label>
            <input type="text" class="form-control" id="head2" name="head2" value="{{ old('head2', $signature->head2) }}" required>
        </div>
        <div class="mb-3">
            <label for="head3" class="form-label">Ligne 3</label>
            <input type="text" class="form-control" id="head3" name="head3" value="{{ old('head3', $signature->head3) }}" required>
        </div>
        <div class="mb-3">
            <label for="head4" class="form-label">Ligne 4</label>
            <input type="text" class="form-control" id="head4" name="head4" value="{{ old('head4', $signature->head4) }}">
        </div>
        <div class="mb-3">
            <label for="sign1" class="form-label">Signature  1</label>
            <input type="text" class="form-control" id="sign1" name="sign1" value="{{ old('sign1', $signature->sign1) }}" required>
        </div>
        <div class="mb-3">
            <label for="sign2" class="form-label">Signature  2</label>
            <input type="text" class="form-control" id="sign2" name="sign2" value="{{ old('sign2', $signature->sign2) }}" required>
        </div>
        <div class="mb-3">
            <label for="sign_op" class="form-label">Signature OP</label>
            <input type="text" class="form-control" id="sign_op" name="sign_op" value="{{ old('sign_op', $signature->sign_op) }}">
        </div>
        <div class="mb-3">
            <label for="sigle" class="form-label">Sigle</label>
            <input type="text" class="form-control" id="sigle" name="sigle" value="{{ old('sigle', $signature->sigle) }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $signature->phone) }}">
        </div>
        <div class="mb-3">
            <label for="Fax" class="form-label">Fax</label>
            <input type="text" class="form-control" id="Fax" name="Fax" value="{{ old('Fax', $signature->Fax) }}">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Activé</label>
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $signature->is_active) ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('signatures.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
