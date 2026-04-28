<!-- resources/views/filieres/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Filieres</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('filieres.create') }}" class="btn btn-primary">Ajouter une nouvelle filière</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Filière</th>
                <th>Profil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->id }}</td>
                    <td>{{ $filiere->filiere }}</td>
                    <td>{{ $filiere->profil }}</td>
                    <td>
                        <a href="{{ route('filieres.show', $filiere->id) }}" class="btn btn-sm"><i class="fa fa-eye text-primary"></i></a>
                        <a href="{{ route('filieres.edit', $filiere->id) }}" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" onclick="return confirm('Vous allez supprimer une filière?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $filieres->links() }}

</div>

@endsection
