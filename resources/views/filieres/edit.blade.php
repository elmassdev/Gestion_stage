<!-- resources/views/filieres/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Modifier la filière</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="filiere" class="form-label">Filière</label>
            <input type="text" class="form-control" id="filiere" name="filiere" value="{{ $filiere->filiere }}" required>
        </div>
        <div class="mb-3">
            <label for="profil" class="form-label">Profil</label>
            <input type="text" class="form-control" id="profil" name="profil" value="{{ $filiere->profil }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
@endsection
