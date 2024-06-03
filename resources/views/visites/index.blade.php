@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Visites</h1>
    <a href="{{ route('visites.create') }}" class="btn btn-primary mb-3">Ajouter une visite</a>
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
                        <a href="{{ route('visites.edit', $visite->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('visites.destroy', $visite->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

