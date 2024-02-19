@extends('layouts.app')
@section('content')

<div class="row">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
</div>
<div class="container">
    <div class="row card my-2">
        <div class="card-header">
            <div class="card">
                <div class="card-header">Exporter les données en SQL: </div>
                <form method="POST" class="mx-auto" action="{{ route('backup.database') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-4">
                        <h6 class="col-md-5">Choisir le tableau :</h6>
                        <div class="col-md-8">
                            <select id="table" type="text" class="form-control @error('table') is-invalid @enderror" name="table"  autocomplete="table">
                                <option value="stagiaires" >Stagiaires</option>
                                <option value="filieres" selected>Filieres</option>
                                <option value="services">Services</option>
                                <option value="encadrants">Encadrants</option>
                                <option value="etablissements">Etablissements</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sauvegarder') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row card my-2">
        <div class="card-header"> Exporter les données en Excel: </div>
            <div class="card justify-content-center">
                <div class="my-2">
                    <a href="{{ route('backup.database') }}" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Stagiaires</a></a>
                    <a href="/export-filieres" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Filieres</a>
                    <a href="/export-services" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Services</a>
                    <a href="/export-encadrants" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Encadrants</a>
                    <a href="/export-etablissements" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Etablissements</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row card my-2">
        <div class="card-header">
            <div class="card">
                <div class="card-header">Modifier les données: </div>
                <form method="POST" class="mx-auto" action="{{ route('backup.database') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-4">
                        <h6 class="col-md-5">Choisir le tableau :</h6>
                        <div class="col-md-8">
                            <select id="table" type="text" class="form-control @error('table') is-invalid @enderror" name="table"  autocomplete="table">
                                <option value="stagiaires" >Stagiaires</option>
                                <option value="filieres" selected>Filieres</option>
                                <option value="services">Services</option>
                                <option value="encadrants">Encadrants</option>
                                <option value="etablissements">Etablissements</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sauvegarder') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
