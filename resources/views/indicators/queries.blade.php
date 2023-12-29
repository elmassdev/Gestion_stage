@extends('layouts.app')
@section('content')

<div class="py-4">
    <div class="border border-success py-1"> <div class="card-header"> <b>Recherche stagiaires</b></div>
    <form action="{{ url()->current()  }}" method="GET">
        <!-- Add input fields for the conditions -->
        <label for="start_date">Début:</label>
        <input type="date" name="start_date" class="datepicker" value="{{ request('start_date') }}">

        <label for="end_date">Fin:</label>
        <input type="date" name="end_date" class="col-md-1" value="{{ request('end_date') }}">

        <label for="remunere">Remunere:</label>
        <select name="remunere">
            <option value="" selected></option>
            <option value="1" {{ request('remunere') == 1 ? 'selected' : '' }}>Oui</option>
            <option value="0" {{ request('remunere') == 0 ? 'selected' : '' }}>Non</option>
        </select>
        <label for="service"> Service</label>
        <select name="service" class="col-md-1">
            <option value="" {{ request('service') === '' ? 'selected' : '' }}></option>
            @foreach($ss as $s)
                <option value="{{ $s->id }}" {{ request('service') == $s->id ? 'selected' : '' }}>
                    {{ $s->sigle_service }} - {{ $s->libelle }}
                </option>
            @endforeach
        </select>
        <label for="etablissement"> etablissement</label>
        <select name="etablissement">
            <option value="" {{ request('etablissement') === '' ? 'selected' : '' }}></option>
            @foreach($xx as $x)
            <option value="{{ $x->sigle_etab }}" {{ request('etablissement') == $x->sigle_etab ? 'selected' : '' }}>
            {{-- <option {{ isset($x->sigle_etab) ? $x->sigle_etab : 'Undefined etab' }}> --}}
                {{$x->sigle_etab}}
            </option>
            @endforeach
        </select>
        <label for="encadrant"> encadrant</label>
        <select name="encadrant">
            <option value="" {{ request('encadrant') === '' ? 'selected' : '' }}></option>
            @foreach($ee as $e)
            <option value="{{ $e->id }}" {{ request('encadrant') == $e->id ? 'selected' : '' }}>
                {{$e->nom}}
            </option>
            @endforeach
        </select>
        <label for="type_formation" > Type Formation</label>
        <select id="type_formation" type="text"  name="type_formation"  value="{{ request('type_formation') }}">
            <option value="" selected></option>
            <option value="EI" >EI</option>
            <option value="OFPPT">OFPPT</option>
            <option value="EST+ FAC+BTS">EST+ FAC+BTS</option>
            <option value="Cycle Préparatoire (CI)">Cycle Préparatoire (CI)</option>
            <option value="IMM+IMT">IMM+IMT</option>
            <option value="Autres">Autres</option>
        </select>

        <!-- Add more input fields for other conditions -->

        <button type="submit" class="btn bg-warning text-primary"><i class="fa-solid fa-check"></i></button>
    </form>
    </div>
    <div>
        @if ($results->isEmpty())
        <p>No results found.</p>
        @else
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="small">
                    <th>Titre</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Diplôme</th>
                    <th>Etablissement</th>
                    <th>Service</th>
                    <th>Encadrant</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>@foreach($results as $result)
                <tr class=" table table-row my-auto h-10 small">
                    <td>{{ $result->civilite}}</td>
                    <td>{{ $result->prenom}}</td>
                    <td>{{ $result->nom}}</td>
                    <td>{{ $result->niveau}}</td>
                    <td>{{ $result->diplome}}</td>
                    <td>{{ $result->etablissement}}</td>
                    <td>{{ $result->sigle}}</td>
                    <td>{{ $result->nomenc}}</td>
                    <td>{{\Carbon\Carbon::parse($result->date_debut)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($result->date_fin)->format('d/m/Y')}}</td>
                    <td><a  href="/stagiaires/{{$result->id}}/modification"> <i class="fa fa-edit text-warning"></i></a>
                        <form action="/stagiaires/{{$result->id}}" method="POST"  style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <a  href="/stagiaires/{{$result->id}}"><i class="fa fa-print text-primary"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $results->links() }} --}}
        {{ $results->appends(request()->query())->links() }}
        @endif
    </div>
</div>
@endsection

