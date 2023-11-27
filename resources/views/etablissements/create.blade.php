<!-- resources/views/etablissements/create.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Ajouter un nouveau établissement') }}</div>
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

            <form action="{{ route('etablissements.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="sigle_etab" class="form-label">Sigle</label>
                    <input type="text" class="form-control" id="sigle_etab" name="sigle_etab" required>
                </div>
                <div class="mb-3">
                    <label for="etab" class="form-label">Etablissement</label>
                    <input type="text" class="form-control" id="etab" name="etab" required>
                </div>
                <div class="mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select id="statut" type="text" class="form-control @error('statut') is-invalid @enderror" name="statut"  autocomplete="statut">
                        <option value="Etatique" >Etatique</option>
                        <option value="Privé">Privé</option>
                        <option value="Etranger">Etranger</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type"  autocomplete="type">
                        <option value="Ecoles Supérieures" >ECOLES SUPERIEURES</option>
                        <option value="OFPPT">OFPPT</option>
                        <option value="Faculté">Faculté</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="statut" class="form-label">Article</label>
                    <select id="article" type="text" class="form-control @error('article') is-invalid @enderror" name="article"  autocomplete="article">
                        <option value="à la">à la</option>
                        <option value="à">à</option>
                        <option value="au">au</option>
                        <option value="à l'">à l'</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pays" class="form-label">Pays</label>
                    <input type="text" class="form-control @error('pays') is-invalid @enderror" id="pays" name="pays" required>
                    @error('pays')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Ajouter </button>
            </form>
        </div>
    </div>


</div>


@endsection
