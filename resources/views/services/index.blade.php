@extends('layouts.app')

@section('content')

<a href="{{ route('services.create') }}" class="btn btn-btn btn-primary my-2 mt-4 mx-3">Ajouter un Service</a>
<div class="row col-md-12 px-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">{{ __('List des services') }}</div>

            <div class="card-body">
                <table class="table table-row my-auto h-10">
                    <thead>
                        <tr>
                            <th>Sigle Service</th>
                            <th>Libelle</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table table-row my-auto h-10">
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->sigle_service }}</td>
                                <td>{{ $service->libelle }}</td>
                                <td>
                                    <a href="{{ route('services.show', $service->id) }}"><i class="fa fa-eye text-primary"></i></a>
                                    <a href="{{ route('services.edit', $service->id) }}"><i class="fa fa-edit text-warning"></i></a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer ce service?')"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $services->links() }}

            </div>
        </div>
    </div>
    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-11">
            <div class="card-header bg-primary">{{ __('Autre informations à ajouter:') }}</div>
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
