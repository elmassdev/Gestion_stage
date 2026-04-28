<!-- resources/views/filieres/create.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row card my-2">
        <a href="/filieres" class="btn btn-primary col-md-2  mx-3 my-2">Liste des filière</a>
        <div class="card-header">
            <div class="card">
                <div class="card-header">Ajouter une nouvelle filière:</div>
                <div class="px-2 py-2 ">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('filieres.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="filiere" class="form-label">Filière</label>
                        <input type="text" class="form-control" id="filiere" name="filiere" required>
                    </div>
                    <div class="mb-3">
                        <label for="profil" class="form-label">Profil</label>
                        <input type="text" class="form-control" id="profil" name="profil" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
