<!-- resources/views/filieres/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Filières</h2>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $filiere->id }}</td>
            </tr>
            <tr>
                <th>Filiere</th>
                <td>{{ $filiere->filiere }}</td>
            </tr>
            <tr>
                <th>Profil</th>
                <td>{{ $filiere->profil }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('filieres.index') }}" class="btn btn-primary">Retour à la liste des filières</a>
@endsection
