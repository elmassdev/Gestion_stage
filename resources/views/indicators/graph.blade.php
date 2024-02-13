@extends('layouts.app')

@section('content')
<div class=" card  p-1 my-2 ">
    <div class=" card-body py-2">
        <form action="{{ route('graph') }}" method="get" class="mb-4 mt-2">
            @csrf
            <div class="form-group row align-items-center">
                <label for="year" class="col-md-2 col-form-label text-md-right">Choisir année:</label>
                <div class="col-md-3">
                    <select id="year" name="year" class="form-control"  >
                        @php
                            $currentYear = date('Y');
                            $selectedYear = isset($year) ? $year : $currentYear;
                        @endphp
                        @for ($y = $currentYear; $y >= $currentYear - 10; $y--)
                            <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }} value="{{ old('year')}}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
            <input type="hidden" name="selectedYear" value="{{ $selectedYear }}">
        </form>

        <a href="{{ route('export', request()->all()) }}" class="btn text-success rounded-pill"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#007552" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/></svg></a>
    </div>




    <div class="container">
        <!-- Chart for Stagiaire Type Formation -->


        {{-- <a href="/export/stagiaire-type-formation" class="btn text-success  rounded-pill"><i class="fa-solid fa-file-export" ></i></a> --}}
        <canvas id="typeFormationChart" width="400" height="200"></canvas>

        <!-- Chart for Stagiaire Services -->
        <canvas id="servicesChart" width="400" height="200"></canvas>

        <!-- Chart for Stagiaire Entite -->
        <canvas id="entiteChart" width="400" height="200"></canvas>

        <!-- Chart for Remunere and OP-etabli counts -->
        <div class="row">
            <div class="col-md-5">
                <canvas id="remunereChart" width="100" height="100"></canvas>
            </div>

            <!-- Pie Chart for OP-etabli -->
            <div class="col-md-5">
                <canvas id="opEtabliChart" width="100" height="100"></canvas>
            </div>
        </div>

    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Chart for Stagiaire Type Formation
        var typeFormationChart = new Chart(document.getElementById('typeFormationChart'), {
            type: 'bar',
            data: {
                labels: {!! $sta_type_f->pluck('type_formation') !!},
                datasets: [{
                    label: 'Stagiaire par Type Formation',
                    data: {!! $sta_type_f->pluck('count') !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Chart for Stagiaire Services
        var servicesChart = new Chart(document.getElementById('servicesChart'), {
            type: 'bar',
            data: {
                labels: {!! $sta_ser->pluck('sigle_service') !!},
                datasets: [{
                    label: 'Stagiaire par Services',
                    data: {!! $sta_ser->pluck('count') !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Chart for Stagiaire Entite
        var entiteChart = new Chart(document.getElementById('entiteChart'), {
            type: 'bar',
            data: {
                labels: {!! $sta_ent->pluck('entite') !!},
                datasets: [{
                    label: 'Stagiaire par Entite ',
                    data: {!! $sta_ent->pluck('count') !!},
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            }
        });

        var remunereChart = new Chart(document.getElementById('remunereChart'), {
        type: 'pie',
        data: {
            labels: ['Remunéré', 'Non Remunéré'],
            datasets: [{
                data: [{{ $remunereCount }}, {{ $notRemunereCount }}],
                backgroundColor: ['#36A21B','#FFCE56']
            }]
        }
    });

    // Create Pie chart for OP_etabli and Not OP_etabli
    var opEtabliChart = new Chart(document.getElementById('opEtabliChart'), {
        type: 'pie',
        data: {
            labels: ['OP établi', ' OP non établi'],
            datasets: [{
                data: [{{ $opEtabliCount }}, {{ $notOpEtabliCount }}],
                backgroundColor: ['#36A21B','#FFCE56']
            }]
        }
    });



    </script>
@endsection
