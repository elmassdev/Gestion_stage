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
                            <a href="/stagiaires/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un stagiaire</a>
                            <a href="/filieres"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une filière</a>
                            <a href="/etablissements"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un établissement</a>
                            <a href="/services"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un service</a>
                            <a href="/encadrants/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un encadrant </a>
                            <a href="/villes"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une ville</a>
                        </div>
                        <div class="col-md-6">
                            <a href="/indicators/index"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Indicateurs</a>
                            <a href="/stagiaires"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Liste des stagiaires</a>
                            <a href="/etablissements"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un établissement</a>
                            <a href="/services"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un service</a>
                            <a href="/encadrants/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un encadrant </a>
                            <a href="/villes"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une ville</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
