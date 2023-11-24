@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire</a>
                            <a href="/filiere" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une filière</a>
                            <a href="/etablissement" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un établissement</a>
                            <a href="/service" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                            <a href="/encadrants/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un encadrant </a>
                            <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                        </div>
                        <div class="col-md-6">
                            <a href="/statistiques" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-success">Statistiques</a>
                            <a href="/stagiaires" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Liste des stagiaires</a>
                            <a href="/etablissement" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un établissement</a>
                            <a href="/service" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                            <a href="/encadrants/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un encadrant </a>
                            <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
