@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Modifier la visite</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('visites.update', $visite->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="date_demande">Date Demande:</label>
                            <input type="date" class="form-control" id="date_demande" name="date_demande" value="{{ $visite->date_demande }}" required>
                        </div>
                        <div class="form-group">
                            <label for="date_visite">Date Visite:</label>
                            <input type="date" class="form-control" id="date_visite" name="date_visite" value="{{ $visite->date_visite }}" required>
                        </div>
                        <div class="form-group">
                            <label for="demandeur">Demandeur:</label>
                            <input type="text" class="form-control" id="demandeur" name="demandeur" value="{{ $visite->demandeur }}" required>
                        </div>
                        <div class="form-group">
                            <label for="effectif">Effectif:</label>
                            <input type="number" class="form-control" id="effectif" name="effectif" value="{{ $visite->effectif }}" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" class="form-control" id="destination" name="destination" value="{{ $visite->destination }}" required>
                        </div>
                        <div class="form-group">
                            <label for="annule">Annulé:</label>
                            <select class="form-control" id="annule" name="annule" required>
                                <option value="0" {{ $visite->annule == 0 ? 'selected' : '' }}>Non</option>
                                <option value="1" {{ $visite->annule == 1 ? 'selected' : '' }}>Oui</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
