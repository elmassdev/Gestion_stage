<!-- resources/views/services/index.blade.php -->
@extends('layouts.app')

@section('content')

<a href="{{ route('services.create') }}" class="btn btn-btn btn-primary my-3 mt-2">Ajouter un Service</a>

<div class="col-md-6">

    <div class="card">
        <div class="card-header">{{ __('List des services') }}</div>

        <div class="card-body">
            <table class="table table-row my-auto h-10">
                <thead>
                    <tr>
                        <th>Sigle Service</th>
                        <th>Libelle</th>
                        <!-- Add more columns as needed -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table table-row my-auto h-10">
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->sigle_service }}</td>
                            <td>{{ $service->libelle }}</td>
                            <!-- Add more columns as needed -->
                            <td>
                                <a href="{{ route('services.show', $service->id) }}"><i class="fa fa-eye text-primary"></i></a>
                                <a href="{{ route('services.edit', $service->id) }}"><i class="fa fa-edit text-warning"></i></a>
                                <!-- Add delete button/form as needed -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $services->links() }}

        </div>
    </div>
</div>

@endsection
