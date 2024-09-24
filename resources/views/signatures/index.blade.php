<!-- resources/views/signature/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-2">La gestion des en-têtes </h1>
    <a href="{{ route('signatures.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau en-tête</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ligne 1</th>
                <th>Ligne 2</th>
                <th>Ligne 3</th>
                <th>Site</th>
                <th>Activé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($signatures as $signature)
                <tr>
                    <td>{{ $signature->head1 }}</td>
                    <td>{{ $signature->head2 }}</td>
                    <td>{{ $signature->head3 }}</td>
                    <td>{{ $signature->site }}</td>
                    <td>{{ $signature->is_active ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('signatures.edit', $signature->id) }}" class="btn btn-sm "><i class="fa fa-edit text-warning"></i></a>

                        <form action="{{ route('signatures.destroy', $signature->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" onclick="return confirm('Etes-vous sûr de bien vouloir supprimer?');"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
