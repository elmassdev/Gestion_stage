<!-- resources/views/services/show.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $service->sigle_service }} <a href="{{ route('services.edit', $service->id) }}" class="float-right"><i class="fa fa-edit text-warning "></i></a></div>
                <p><strong>Sigle Service:</strong> {{ $service->sigle_service }}</p>
                <p><strong>Libelle:</strong> {{ $service->libelle }}</p>
                <p><strong>Entité:</strong> {{ $service->entite }}</p>
                <p><strong>Direction:</strong> {{ $service->direction }}</p>
                <p><strong>Site:</strong> {{ $service->site }}</p>
            </div>
        </div>
    </div>
</div>


@endsection
