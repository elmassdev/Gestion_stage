@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Ajouter une visite</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('visites.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="date_demande">Date Demande:</label>
                            <input type="date" class="form-control" id="date_demande" name="date_demande" required>
                        </div>
                        <div class="form-group">
                            <label for="date_visite">Date Visite:</label>
                            <input type="date" class="form-control" id="date_visite" name="date_visite" required>
                        </div>
                        <div class="form-group">
                            <label for="demandeur">Demandeur:</label>
                            <input type="text" class="form-control" id="demandeur" name="demandeur" required>
                        </div>
                        <div class="form-group">
                            <label for="effectif">Effectif:</label>
                            <input type="number" class="form-control" id="effectif" name="effectif" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" class="form-control" id="destination" name="destination" required>
                        </div>
                        <div class="form-group">
                            <label for="annule">Annulé:</label>
                            <select class="form-control" id="annule" name="annule" required>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
