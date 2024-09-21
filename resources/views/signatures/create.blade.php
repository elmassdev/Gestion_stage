@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau en-tête</h1>

    <form action="{{ route('signatures.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="logo">Logo :</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="head1">la première ligne:</label>
            <input type="text" name="head1" id="head1" class="form-control" value="{{ old('head1') }}" required>
            @error('head1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="head2">Ligne 2:</label>
            <input type="text" name="head2" id="head2" class="form-control" value="{{ old('head2') }}" required>
            @error('head2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="head3">Ligne 3:</label>
            <input type="text" name="head3" id="head3" class="form-control" value="{{ old('head3') }}" required>
            @error('head3')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="head4">Ligne 4:</label>
            <input type="text" name="head4" id="head4" class="form-control" value="{{ old('head4') }}" required>
            @error('head4')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sign1">Signature 1:</label>
            <input type="text" name="sign1" id="sign1" class="form-control" value="{{ old('sign1') }}" required>
            @error('sign1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sign2">Signature 2:</label>
            <input type="text" name="sign2" id="sign2" class="form-control" value="{{ old('sign2') }}" required>
            @error('sign2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sign_op">Signature OP:</label>
            <input type="text" name="sign_op" id="sign_op" class="form-control" value="{{ old('sign_op') }}" required>
            @error('sign_op')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sigle">Sigle:</label>
            <input type="text" name="sigle" id="sigle" class="form-control" value="{{ old('sigle') }}" required>
            @error('sigle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Fax">Fax:</label>
            <input type="text" name="Fax" id="Fax" class="form-control" value="{{ old('Fax') }}" required>
            @error('Fax')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                   value="1" {{ old('is_active', $signature->is_active ?? false) ? 'checked' : '' }}>
            <label for="is_active" class="form-check-label">Activé</label>
            @error('is_active')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="effective_date">Date d'effet:</label>
            <input type="date" name="effective_date" id="effective_date" class="form-control" value="{{ old('effective_date') }}" required>
            @error('effective_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
