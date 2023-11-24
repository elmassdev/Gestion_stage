@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 border border-success">
            <h4 class="text-success"> <u> Nombre des stagiaires en cours par services </u></h4>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Service</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stagiaires as $stagiaire)
                    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $stagiaire->service}}</td>
                        <td>{{ $stagiaire->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6 border border-success">
            <h4 class="text-success"> <u>Nombre des stagiaires en cours par encadrants </u></h4>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Encadrant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stagenc as $st)
                    <tr class=" table table-row my-auto h-10 small">
                        <td> {{ $st->nomenc}}</td>
                        <td>{{ $st->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row card">
        <div class="card-header">
            <div class="card-body">
                <form method="GET" action="/statistiques" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h4 class="text-success col-md-5"><u>Liste des stagiaires pour une date:</u></h4>
                        <div class="col-md-3">
                            <input id="search" type="date" class="form-control @error('search') is-invalid @enderror"   name="search" value="{{ old('search') }}"  required autocomplete="search"   autofocus>
                            @error('search')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Valider') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row card border border-success" style="overflow-y: scroll;">
        @if(count($results))
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>Titre</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Type de stage</th>
            <th>Niveau</th>
            <th>Diplôme</th>
            <th>Etablissement</th>
            <th>Ville</th>
            <th>Service</th>
            <th>Encadrant</th>
            <th>Date debut</th>
            <th>Date fin</th>
        </tr>
    </thead>
    <tbody>@foreach($results as $res)
    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $res->civilite}}</td>
                        <td>{{ $res->prenom}}</td>
                        <td>{{ $res->nom}}</td>
                        <td>{{ $res->type_stage}}</td>
                        <td>{{ $res->niveau}}</td>
                        <td>{{ $res->diplome}}</td>
                        <td>{{ $res->etablissement}}</td>
                        <td>{{ $res->ville}}</td>
                        <td>{{ $res->service}}</td>
                        <td>{{ $res->nomenc}}</td>
                        <td>{{ $res->date_debut}}</td>
                        <td>{{ $res->date_fin}}</td>
                        <td> <a  href="/stagiaires/{{$res->id}}"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
@endforeach

    </tbody>
</table>

@else
<p> Pas de stagiaires pour cette date</p>
@endif
    </div>

    <div class="row card">
        <div class="card-header">
            <div class="card-body">
                <form method="GET" action="/statistiques" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h4 class="text-success col-md-5"><u>Liste des stagiaires pour aujourd'hui:</u></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row card border border-success" style="overflow-y: scroll;">
        @if(count($statoday))
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>Titre</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Type de stage</th>
            <th>Niveau</th>
            <th>Diplôme</th>
            <th>Etablissement</th>
            <th>Ville</th>
            <th>Service</th>
            <th>Encadrant</th>
            <th>Date debut</th>
            <th>Date fin</th>
        </tr>
    </thead>
            <tbody>@foreach($statoday as $statdy)
            <tr class=" table table-row my-auto h-10 small">
                                <td>{{ $statdy->civilite}}</td>
                                <td>{{ $statdy->prenom}}</td>
                                <td>{{ $statdy->nom}}</td>
                                <td>{{ $statdy->type_stage}}</td>
                                <td>{{ $statdy->niveau}}</td>
                                <td>{{ $statdy->diplome}}</td>
                                <td>{{ $statdy->etablissement}}</td>
                                <td>{{ $statdy->ville}}</td>
                                <td>{{ $statdy->service}}</td>
                                <td>{{ $statdy->nomenc}}</td>
                                <td>{{ $statdy->date_debut}}</td>
                                <td>{{ $statdy->date_fin}}</td>
                                <td> <a  href="/stagiaires/{{$statdy->id}}"><i class="fa fa-print text-primary"></i></a></td>
                            </tr>
        @endforeach

            </tbody>
        </table>

@else
<p> Pas de stagiaires pour aujourd'hui</p>
@endif
    </div>
</div>
@endsection
