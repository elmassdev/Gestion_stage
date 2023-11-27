

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Stagiaires by Encadrant and Service</h1>
        <table class="table table-row my-auto h-10">
            <thead>
                <tr>
                    <th>Encadrant</th>
                    <th>Service</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Number of Stagiaires</th>
                </tr>
            </thead>
            <tbody class="table table-row my-auto h-10">
                @foreach ($result as $row)
                    <tr>
                        <td>{{ $row->encadrant_nom }} {{ $row->encadrant_prenom }}</td>
                        <td>{{ $row->service_libelle }}</td>
                        <td>{{ $row->month }}</td>
                        <td>{{ $row->year }}</td>
                        <td>{{ $row->count_stagiaires }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
