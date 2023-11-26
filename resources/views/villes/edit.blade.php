<!-- resources/views/villes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Ville</h1>
    <form action="{{ route('villes.update', $ville->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ville">Ville:</label>
            <input type="text" name="ville" class="form-control" value="{{ $ville->ville }}" required>
        </div>
        <div class="form-group">
            <label for="pays">Pays:</label>
            <input type="text" name="pays" class="form-control" value="{{ $ville->pays }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
