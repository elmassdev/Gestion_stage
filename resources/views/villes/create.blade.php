

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="card col-md-8">
        <div class="card-header">{{ __('Ajouter une ville') }}</div>
        <div class="card-body">
            <form action="{{ route('villes.store') }}" method="POST">
                @csrf

                <!-- Display validation errors, if any -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Display success message, if any -->
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <!-- Display error message, if any -->
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="ville">Ville:</label>
                    <input type="text" name="ville" class="form-control" value="{{ old('ville') }}" required>
                </div>
                <div class="form-group">
                    <label for="pays">Pays:</label>
                    <input type="text" name="pays" class="form-control" value="{{ old('pays') }}" required>
                </div>
                <button type="submit" class="btn btn-primary my-2 col-md-2">Ajouter</button>
            </form>
        </div>
    </div>

    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-8">
            <div class="card-header bg-secondary">{{ __('Autre informations à ajouter:') }}</div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Rechercher un encadrant</a>
                    <a href="/services" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un stagiaire </a>
                    <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>




<hr>
<div class="row">
    <a href="/"  class=" col-md-4 mx-auto my-2 btn btn-warning">Page d'accueil</a>
    <a href="/stagiaires/create"  class=" col-md-4 mx-auto my-2 btn btn-warning">Ajouter un stagiaire</a>
</div>
@endsection
