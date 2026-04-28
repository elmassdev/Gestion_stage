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
    <!-- Export Data Section -->
    <div class="card my-2">
        <div class="card-header">Exporter les données en SQL: </div>
        <form method="POST" class="mx-2" action="{{ route('backup.database') }}" enctype="multipart/form-data">
            @csrf
            <div class="my-2">
                <div class="row">
                    <label class="col-md-3 col-form-label text-md-left">Choisir la table:</label>
                    <div class="col-md-6">
                        <select id="table" type="text" class="form-control @error('table') is-invalid @enderror" name="table" autocomplete="table">
                            <option value="stagiaires">Stagiaires</option>
                            <option value="filieres" selected>Filieres</option>
                            <option value="services">Services</option>
                            <option value="encadrants">Encadrants</option>
                            <option value="etablissements">Etablissements</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="container">
    <div class="card my-2" >
        <div class="card-header"> Exporter les données en Excel: </div>
        <div class="text-center">
            <a href="{{ route('backup.database') }}" class="btn btn-outline-success col-md-2 my-2 border border-success rounded-pill fs-5"><i class="fa-solid fa-save"></i> Stagiaires</a></a>
        <a href="/export-filieres" class="btn btn-outline-success col-md-2 my-2 border border-success rounded-pill fs-5"><i class="fa-solid fa-save"></i> Filieres</a>
        <a href="/export-services" class="btn btn-outline-success col-md-2 my-2 border border-success rounded-pill fs-5"><i class="fa-solid fa-save"></i> Services</a>
        <a href="/export-encadrants" class="btn btn-outline-success col-md-2 my-2 border border-success rounded-pill fs-5"><i class="fa-solid fa-save"></i> Encadrants</a>
        <a href="/export-etablissements" class="btn btn-outline-success col-md-2 my-2 border border-success rounded-pill fs-5"><i class="fa-solid fa-save"></i> Etablissements</a>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-between">
    <!-- Partial Update Form -->
    <div class="card col-md-6 mx-1">
        <div class="card-header">Modification partielle des enregistrements:</div>
        <form method="POST" class="mx-2 my-1" action="{{ route('partial.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Table Selection -->
            <div class="form-group my-3">
                <label for="tableSelectPartial">Table:</label>
                <select id="tableSelectPartial" name="tableSelect" class="form-control">
                    <option value="">Choisir une table</option>
                    @foreach($columns as $table => $tableColumns)
                        <option value="{{ $table }}">{{ $table }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Column Selection -->
            <div class="form-group my-3">
                <label for="column_to_edit_partial">Colonne à modifier:</label>
                <select id="column_to_edit_partial" name="column_to_edit" class="form-control">
                    <option value="">Choisir une colonne</option>
                </select>
            </div>

            <!-- Old and New Values -->
            <div class="form-group my-3">
                <label for="old_value">Ancienne valeur (à remplacer):</label>
                <input id="old_value" name="old_value" type="text" class="form-control">
            </div>

            <div class="form-group my-3">
                <label for="new_value_partial">Nouvelle valeur:</label>
                <input id="new_value_partial" name="new_value" type="text" class="form-control">
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>

    <!-- Full Update Form -->
    <div class="card col-md-6 mx-1">
        <div class="card-header">Modifier les données:</div>
        <form method="POST" class="mx-2 my-1" action="{{ route('update.data') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Table Selection -->
            <div class="form-group my-3">
                <label for="tableSelect">Table:</label>
                <select id="tableSelect" name="tableSelect" class="form-control">
                    <option value="">Choisir une table</option>
                    @foreach($columns as $table => $tableColumns)
                        <option value="{{ $table }}">{{ $table }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Column Selection -->
            <div class="form-group my-3">
                <label for="column_to_edit">Colonne à modifier:</label>
                <select id="column_to_edit" name="column_to_edit" class="form-control">
                    <option value="">Choisir une colonne</option>
                </select>
            </div>

            <!-- New Value -->
            <div class="form-group my-3">
                <label for="new_value">Nouvelle valeur:</label>
                <input id="new_value" type="text" class="form-control @error('new_value') is-invalid @enderror" name="new_value" autocomplete="new_value">
            </div>

            <!-- Condition -->
            <div class="form-group my-3">
                <label for="condition_col" class="text-warning">Condition:</label>
                <select id="condition_col" name="condition_col" class="form-control">
                    <option value="">Colonne repère</option>
                </select>
            </div>

            <div class="form-group my-3">
                <label for="condition_value" class="text-warning">Valeur de la condition:</label>
                <input id="condition_value" type="text" class="form-control @error('condition_value') is-invalid @enderror" name="condition_value" autocomplete="condition_value">
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    var columns = @json($columns);

    function updateColumnDropdown(tableSelectId, columnDropdownId) {
        var selectedTable = document.getElementById(tableSelectId).value;
        var colDropdown = document.getElementById(columnDropdownId);

        colDropdown.innerHTML = '<option value="">Choisir une colonne</option>';

        if (selectedTable && columns[selectedTable]) {
            columns[selectedTable].forEach(function(column) {
                var option = document.createElement('option');
                option.text = column;
                option.value = column;
                colDropdown.add(option);
            });
        }
    }

    document.getElementById('tableSelect').addEventListener('change', function() {
        updateColumnDropdown('tableSelect', 'column_to_edit');
        updateColumnDropdown('tableSelect', 'condition_col');
    });

    document.getElementById('tableSelectPartial').addEventListener('change', function() {
        updateColumnDropdown('tableSelectPartial', 'column_to_edit_partial');
    });
</script>

@endsection

