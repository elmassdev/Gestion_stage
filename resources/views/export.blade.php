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
                <div class="card-header">Modifier les données:</div>
                <form method="POST" class="mx-auto my-2" action="{{ route('update.data') }}" enctype="multipart/form-data" style="border:1px solid black; border-radius:2%">
                    @csrf
                    @method('PUT')
                    <div class="row my-4 py-2 px-2">
                        <div class="col-md-8">
                            <div class="col-md-5">
                                <label for="tableSelect">Table:</label>
                            </div>
                            <select id="tableSelect" name="tableSelect" class="form-control">
                                <option value="">Select a table</option>
                                @foreach($columns as $table => $tableColumns)
                                    <option value="{{ $table }}">{{ $table }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="bg-secondary py-2 px-2">
                        <div class="row my-4">
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <label for="column_to_edit">la coulonne à modifier:</label>
                                </div>
                                <select id="column_to_edit" name="column_to_edit" class="form-control">
                                    <option value="">choisir la colounne: </option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-5">
                                <label for="new_value">la nouvelle valeur :</label>
                            </div>
                            <div class="col-md-8">
                                <input id="new_value" type="text" class="form-control @error('new_value') is-invalid @enderror" name="new_value" autocomplete="new_value">
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning py-2 px-2">
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="col-md-5">
                                    <label for="condition_col" class="text-danger">Condition:</label>
                                </div>
                                <select id="condition_col" name="condition_col" class="form-control ">
                                    <option value="">la coulounne repère</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-12">
                                <label for="condition_value" class="text-danger">la valeur de condition:</label>
                            </div>
                            <div class="col-md-12">
                                <input id="condition_value" type="text" class="form-control @error('condition_value') is-invalid @enderror" name="condition_value" autocomplete="condition_value">
                            </div>
                        </div>
                    </div>
                    <div class="row my-4 py-2 px-2">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var columns = @json($columns);
    document.getElementById('tableSelect').addEventListener('change', function() {
        var selectedTable = this.value;
        var colDropdown = document.getElementById('column_to_edit');
        var colDropdown2 = document.getElementById('condition_col');
        colDropdown.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select a column';
        defaultOption.value = '';
        colDropdown.add(defaultOption);
        if (selectedTable && columns[selectedTable]) {
            var columnOptions = columns[selectedTable];
            columnOptions.forEach(function(column) {
                var option = document.createElement('option');
                option.text = column;
                option.value = column;
                colDropdown.add(option);
            });
        }
        colDropdown2.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select a column';
        defaultOption.value = '';
        colDropdown2.add(defaultOption);
        if (selectedTable && columns[selectedTable]) {
            var columnOptions = columns[selectedTable];
            columnOptions.forEach(function(column) {
                var option = document.createElement('option');
                option.text = column;
                option.value = column;
                colDropdown2.add(option);
            });
        }
    });
</script>


@endsection
