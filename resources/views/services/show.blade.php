
@extends('layouts.app')

@section('content')

<div class="container row">
    <div class=" col-md-8 float-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $service->sigle_service }} <a href="{{ route('services.edit', $service->id) }}" class="float-right"><i class="fa fa-edit text-warning "></i></a></div>
                <p><strong>Sigle Service:</strong> {{ $service->sigle_service }}</p>
                <p><strong>Libelle:</strong> {{ $service->libelle }}</p>
                <p><strong>Entité:</strong> {{ $service->entite }}</p>
                <p><strong>Direction:</strong> {{ $service->direction }}</p>
                <p><strong>Site:</strong> {{ $service->site }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 float-right" style="top: 5; right: 0;">
        <div class="card">
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
