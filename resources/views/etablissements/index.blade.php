<!-- resources/views/etablissements/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Etablissements</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('etablissements.create') }}" class="btn btn-primary">Ajouter un nouveau établissement</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Sigle</th>
                <th>Etablissement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etablissements as $etablissement)
                <tr>
                    <td>{{ $etablissement->sigle_etab }}</td>
                    <td>{{ $etablissement->Etab }}</td>
                    <td>
                        <a href="{{ route('etablissements.show', $etablissement->sigle_etab) }}" class="btn btn-sm"><i class="fa fa-eye text-primary"></i></a>
                        <a href="{{ route('etablissements.edit', $etablissement->sigle_etab) }}" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        <form action="{{ route('etablissements.destroy', $etablissement->sigle_etab) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" onclick="return confirm('vous allez supprimer cet établissement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $etablissements->links() }}


</div>



@endsection
