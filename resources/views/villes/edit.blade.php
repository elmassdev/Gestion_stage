<!-- resources/views/villes/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="card col-md-8">
        <div class="card-header">{{ __('Modifier les informations :') }}</div>
        <div class="card-body">
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
        </div>
    </div>
    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-8">
            <div class="card-header bg-secondary">{{ __('Autre informations à ajouter:') }}</div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Rechercher un encadrant</a>
                    <a href="/services/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un stagiaire </a>
                    <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>


@endsection
