@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            Sauvegarder la liste des stagiaires en cours: <a class="btn text-success  rounded-pill" href="/surete/save"> <i class="fa-solid fa-file-export" ></i></a>
        </div>
        <div class="col">


        </div>
    </div>
</div>
<div class="py-4 mx-2">
    @if(count($stagiaires))
    <table class="table table-striped table-responsive mx-2">
        <thead>
            <tr class="small">
                <th>Photo</th>
                <th>Titre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>CIN</th>
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
        <tbody>
            @foreach($stagiaires as $stagiaire)
            <tr class=" table table-row my-auto h-10 small">
                <td> <img src="{{ asset('storage/images/profile/'.$stagiaire->photo)}}"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" ></td>
                <td>{{ $stagiaire->civilite}}</td>
                <td>{{ $stagiaire->prenom}}</td>
                <td>{{ $stagiaire->nom}}</td>
                <td>{{ $stagiaire->cin}}</td>
                <td>{{ $stagiaire->niveau}}</td>
                <td>{{ $stagiaire->diplome}}</td>
                <td>{{ $stagiaire->etablissement}}</td>
                <td>{{ $stagiaire->ville}}</td>
                <td>{{ $stagiaire->sigle}}</td>
                <td>{{ $stagiaire->nomenc}}</td>
                <td>{{\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $stagiaires->links() }}

    @else
    <p class="bg-warning text-danger"> Pas de stagiaires</p>
    @endif
</div>

@endsection




