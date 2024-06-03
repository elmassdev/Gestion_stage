@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('visites.create') }}" class="btn btn-primary mb-3 my-4">Ajouter une visite</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Demande</th>
                <th>Date Visite</th>
                <th>Demandeur</th>
                <th>Effectif</th>
                <th>Destination</th>
                <th>Annulé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visites as $visite)
                <tr>
                    <td>{{ $visite->id }}</td>
                    <td>{{ $visite->date_demande }}</td>
                    <td>{{ $visite->date_visite }}</td>
                    <td>{{ $visite->demandeur }}</td>
                    <td>{{ $visite->effectif }}</td>
                    <td>{{ $visite->destination }}</td>
                    <td>{{ $visite->annule ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('visites.edit', $visite->id) }}" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        @if(auth()->check() && auth()->user()->hasRole('superadmin'))
                        <form action="{{ route('visites.destroy', $visite->id) }}" method="POST"  style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">


    <h2>Statistiques</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Année</th>
                <th>Nombre des visites</th>
                <th>Effectif</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats as $stat)
                <tr>
                    <td>{{ $stat->year }}</td>
                    <td>{{ $stat->number_of_visits }}</td>
                    <td>{{ $stat->total_effectif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

