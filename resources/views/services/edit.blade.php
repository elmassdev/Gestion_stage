
@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6">

    <div class="card">
        <div class="card-header">{{ __('Modifier les informations du Service') }}</div>
        <div class="card-body">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="sigle_service">Sigle Service:</label>
            <input type="text" name="sigle_service" class="form-control" value="{{ $service->sigle_service }}" required>
        </div>

        <div class="form-group">
            <label for="libelle">Libelle:</label>
            <input type="text" name="libelle" class="form-control" value="{{ $service->libelle }}" required>
        </div>

        <div class="form-group">
            <label for="entite">Entite:</label>
            <input type="text" name="entite" class="form-control" value="{{ $service->entite }}" required>
        </div>

        <div class="form-group">
            <label for="site">Site:</label>
            <input type="text" name="site" class="form-control" value="{{ $service->site }}" required>
        </div>

        <div class="form-group">
            <label for="direction">Direction:</label>
            <input type="text" name="direction" class="form-control" value="{{ $service->direction }}" required>
        </div>

        <div class="form-group">
            <label for="secretariat">Secretariat:</label>
            <input type="text" name="secretariat" class="form-control" value="{{ $service->secretariat }}" >
        </div>

        <div class="form-group">
            <label for="EPI">EPI:</label>
            <input type="checkbox" name="EPI" class="form-check-input" {{ $service->EPI ? 'checked' : '' }} >
        </div>

        <button type="submit" class="btn btn-primary my-4 mx-4">Meetre à jour </button>
    </form>

        </div>
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
                    <a href="/villes/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
