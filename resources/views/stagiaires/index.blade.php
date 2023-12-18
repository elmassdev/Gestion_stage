@extends('layouts.app')
@section('content')
<div class="py-4">
    <a href="/stagiaires/create" class="btn btn-warning text-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
@if(count($stagiaires))
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>Titre</th>
            <th>Prénom</th>
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
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>@foreach($stagiaires as $stagiaire)
    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $stagiaire->civilite}}</td>
                        <td>{{ $stagiaire->prenom}}</td>
                        <td>{{ $stagiaire->nom}}</td>
                        <td>{{ $stagiaire->type_stage}}</td>
                        <td>{{ $stagiaire->niveau}}</td>
                        <td>{{ $stagiaire->diplome}}</td>
                        <td>{{ $stagiaire->etablissement}}</td>
                        <td>{{ $stagiaire->ville}}</td>
                        <td>{{ $stagiaire->service}}</td>
                        <td>{{ $stagiaire->nomenc}}</td>
                        <td>{{\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')}}</td>
                        <td><a  href="/stagiaires/{{$stagiaire->id}}/modification"> <i class="fa fa-edit text-warning"></i></a>
                            <form action="/stagiaires/{{$stagiaire->id}}" method="POST"  style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                            </form>
                            <a  href="/stagiaires/{{$stagiaire->id}}"><i class="fa fa-print text-primary"></i></a>
                        </td>
                    </tr>
@endforeach

    </tbody>
</table>
{{ $stagiaires->links() }}

@else
<p> Pas de stagiaires</p>
@endif

</div>


@endsection
