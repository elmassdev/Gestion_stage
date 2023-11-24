@extends('layouts.app')
@section('content')
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
                        <td>{{ $stagiaire->date_debut}}</td>
                        <td>{{ $stagiaire->date_fin}}</td>
                        <td ><a  href="/stagiaires/{{$stagiaire->id}}/modification"> <i class="fa fa-edit text-warning"></i></a></td>
                        <td >
                        <form action="/stagiaires/{{$stagiaire->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="fa fa-trash text-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"></button>
                        </form>
                        </td>
                        <td> <a  href="/stagiaires/{{$stagiaire->id}}"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
@endforeach

    </tbody>
</table>
{{ $stagiaires->links() }}

@else
<p> Pas de stagiaires</p>
@endif


@endsection
