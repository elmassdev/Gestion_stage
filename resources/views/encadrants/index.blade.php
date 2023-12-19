@extends('layouts.app')
@section('content')
<a href="/encadrants/create" class="btn btn-warning text-primary my-4 mx-4"><i class="fa fa-plus" aria-hidden="true"></i></a>
<div class="row my-4 mx-4">
    <div class="col-md-8">
        @if(count($encadrants))
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="small">
                    <th>titre</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($encadrants as $encadrant)
                <tr class=" table table-row my-auto h-10 small">
                    <td>{{ $encadrant->titre}}</td>
                    <td>{{ $encadrant->prenom}}</td>
                    <td>{{ $encadrant->nom}}</td>
                    <td>{{ $encadrant->phone}}</td>
                    <td>{{ $encadrant->email}}</td>
                    <td>{{ $encadrant->service}}</td>
                    <td>
                        <a  href="/encadrants/{{$encadrant->id}}/modification"> <i class="fa fa-edit text-warning"></i></a>
                        <form action="/encadrants/{{$encadrant->id}}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet encadrant?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <a  href="/encadrants/{{$encadrant->id}}"><i class="fa fa-print text-primary"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $encadrants->links() }}
        @else
        <p> Pas de encadrants</p>
        @endif
    </div>

    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-8">
            <div class="card-header ">{{ __('Autre informations à ajouter:') }}</div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Rechercher un encadrant</a>
                    <a href="/services/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un stagiaire </a>
                    <a href="/villes/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
