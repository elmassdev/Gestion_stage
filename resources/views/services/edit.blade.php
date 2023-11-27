<!-- resources/views/services/edit.blade.php -->
@extends('layouts.app')

@section('content')

<div class="col-md-6">

    <div class="card">
        <div class="card-header">{{ __('Modifier les informations du Service') }}</div>
        <div class="card-body">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Add form fields as needed -->
        <div class="form-group">
            <label for="sigle_service">Sigle Service:</label>
            <input type="text" name="sigle_service" class="form-control" value="{{ $service->sigle_service }}" required>
        </div>

        <div class="form-group">
            <label for="libelle">Libelle:</label>
            <input type="text" name="libelle" class="form-control" value="{{ $service->libelle }}" required>
        </div>

        <div class="form-group">
            <label for="entite">Entite:</label>
            <input type="text" name="entite" class="form-control" value="{{ $service->entite }}" required>
        </div>

        <div class="form-group">
            <label for="site">Site:</label>
            <input type="text" name="site" class="form-control" value="{{ $service->site }}" required>
        </div>

        <div class="form-group">
            <label for="direction">Direction:</label>
            <input type="text" name="direction" class="form-control" value="{{ $service->direction }}" required>
        </div>

        <div class="form-group">
            <label for="secretariat">Secretariat:</label>
            <input type="text" name="secretariat" class="form-control" value="{{ $service->secretariat }}" >
        </div>

        <div class="form-group">
            <label for="EPI">EPI:</label>
            <input type="checkbox" name="EPI" class="form-check-input" {{ $service->EPI ? 'checked' : '' }} >
        </div>

        <button type="submit" class="btn btn-primary my-4 mx-4">Meetre à jour </button>
    </form>

        </div>
    </div>
@endsection
