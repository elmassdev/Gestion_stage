<!-- resources/views/etablissements/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>détails de: {{$etablissement->sigle_etab}}</h2>

    <div class="container col-md-10">
        <table class="table mt-3">
            <tbody>
                <tr>
                    <th>Sigle</th>
                    <td>{{ $etablissement->sigle_etab }}</td>
                </tr>
                <tr>
                    <th>Etablissement</th>
                    <td>{{ $etablissement->Etab }}</td>
                </tr>
                <tr>
                    <th>Statut</th>
                    <td>{{ $etablissement->statut }}</td>
                </tr>
                <tr>
                    <th>type</th>
                    <td>{{ $etablissement->type }}</td>
                </tr>
                <!-- Add other fields as needed -->
            </tbody>
        </table>
    </div>

    <a href="{{ route('etablissements.index') }}" class="btn btn-primary">Retour à la liste des établissements</a>
@endsection
