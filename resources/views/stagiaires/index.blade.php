@extends('layouts.app')
@section('content')
<div class="py-4 mx-2 ">
    <div class="mx-2">
        <a href="/stagiaires/create" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#129511" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></a>
        <a href="/stagiaires/{{$lastId}}" class="btn btn-outline-warning">
            {{-- <i class="fa fa-magnifying-glass" aria-hidden="true"></i> --}}
            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#129511" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </a>
    </div>
    @if(count($stagiaires))
    <table class="table table-striped table-responsive mx-2">
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
                <th>Date début</th>
                <th>Date fin</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($stagiaires as $stagiaire)
            <tr class=" table table-row my-auto h-10 small">
                <td>{{ $stagiaire->civilite}}</td>
                <td>{{ $stagiaire->prenom}}</td>
                <td>{{ $stagiaire->nom}}</td>
                <td>{{ $stagiaire->type_stage}}</td>
                <td>{{ $stagiaire->niveau}}</td>
                <td>{{ $stagiaire->diplome}}</td>
                <td>{{ $stagiaire->etablissement}}</td>
                <td>{{ $stagiaire->ville}}</td>
                <td>{{ $stagiaire->sigle}}</td>
                <td>{{ $stagiaire->nomenc}}</td>
                <td>{{\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')}}</td>
                <td><a  href="/stagiaires/{{$stagiaire->id}}/modification"> <i class="fa fa-edit text-warning"></i></a>
                    @if(auth()->check() && auth()->user()->hasRole('superadmin'))
                    <form action="/stagiaires/{{$stagiaire->id}}" method="POST"  style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                    </form>
                    @endif
                    <a  href="/stagiaires/{{$stagiaire->id}}"><i class="fa fa-eye text-primary"></i></a>
                </td>
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
