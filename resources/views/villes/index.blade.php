

@extends('layouts.app')

@section('content')
    <h1>Villes</h1>
    <a href="{{ route('villes.create') }}" class="btn btn-primary">Create Ville</a>

    <table class="table table-row my-auto h-8 small">
        <thead>
            <tr>
                <th>Ville</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vs as $v)
                <tr>
                    <td>{{ $v->ville }}</td>
                    <td>{{ $v->pays }}</td>
                    <td>
                        <a href="{{ route('villes.edit', $v->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit text-secondary"></i></a>
                        <form action="{{ route('villes.destroy', $v->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Voulez-vous supprimer cette ville?')"><i class="fa fa-trash text-danger"></i></button>
                            {{-- <button type="submit" class="btn btn-sm btn-danger">Delete</button> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vs->links() }}
@endsection
