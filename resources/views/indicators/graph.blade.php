@extends('layouts.app')

@section('content')
<div class="card p-1 my-2">
    <div class="card-body py-2">
        <form action="{{ route('graph') }}" method="get" class="mb-4 mt-2">
            @csrf
            <div class="form-group row align-items-center">
                <label for="year" class="col-md-2 col-form-label text-md-right">Choisir année:</label>
                <div class="col-md-3">
                    <select id="year" name="year" class="form-control">
                        @php
                            $currentYear = date('Y');
                            $selectedYear = request()->input('year', $currentYear);
                        @endphp
                        @for ($y = $currentYear; $y >= $currentYear - 10; $y--)
                            <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>

        <a href="{{ route('export', request()->all()) }}" class="btn text-success rounded-pill">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512">
                <path fill="#007552" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/>
            </svg>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <div class="container">
        <!-- Chart for Stagiaire Type Formation -->
        <canvas id="typeFormationChart" width="400" height="200" style="margin-bottom: 4rem;"></canvas>

        <!-- Chart for Stagiaire Services -->
        <canvas id="servicesChart" width="400" height="200" style="margin-bottom: 4rem;"></canvas>

        <!-- Chart for Stagiaire per Encadrant -->
        <canvas id="encChart" width="400" height="200" style="margin-bottom: 20px;"></canvas>

        <!-- Chart for Stagiaire Entite -->
        <canvas id="entiteChart" width="400" height="200" style="margin-bottom: 4rem;"></canvas>

        <!-- Charts for Remunere and OP-etabli counts -->
        <div class="row border">
            <h6>Etat des rémunération en {{$selectedYear}}</h6>
            <div class="col-md-5">
                <canvas id="remunereChart" width="100" height="100" style="margin-bottom: 4rem;"></canvas>
            </div>
            <div class="col-md-5">
                <canvas id="opEtabliChart" width="100" height="100" style="margin-bottom: 4rem;"></canvas>
            </div>
        </div>

        <!-- New Chart for Monthly Stagiaire Count -->
        <div class="my-4">
            <canvas id="monthlyChart" width="400" height="200" style="margin-bottom: 4rem;"></canvas>
        </div>
    </div>

    <script>
        function createBarChart(ctx, labels, data, label) {
            return new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            offset: -5,
                            formatter: function(value) { return value; },
                            color: '#333',
                            font: { weight: 'bold' }
                        }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        createBarChart(document.getElementById('typeFormationChart'), {!! json_encode($sta_type_f->pluck('type_formation')->toArray()) !!}, {!! json_encode($sta_type_f->pluck('count')->toArray()) !!}, 'Stagiaire par Type Formation en {{$selectedYear}}');
        createBarChart(document.getElementById('servicesChart'), {!! $sta_ser->pluck('sigle_service') !!}, {!! $sta_ser->pluck('count') !!}, 'Stagiaire par Services en {{$selectedYear}}');
        createBarChart(document.getElementById('encChart'), {!! $sta_enc->pluck('nom') !!}, {!! $sta_enc->pluck('count') !!}, 'Nombre de stagiaires par encadrant en {{ $selectedYear }}');
        createBarChart(document.getElementById('entiteChart'), {!! $sta_ent->pluck('entite') !!}, {!! $sta_ent->pluck('count') !!}, 'Stagiaire par Entite en {{$selectedYear}}');



        // Monthly Stagiaire Count Chart
        const frenchMonths = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        const monthlyLabels = {!! $sta_per_month->pluck('month')->map(fn($month) => $month - 1) !!}.map(month => frenchMonths[month]);

        createBarChart(document.getElementById('monthlyChart'), monthlyLabels, {!! $sta_per_month->pluck('count') !!}, 'Stagiaires par mois en {{$selectedYear}}');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        // Pie Chart for Rémunération Status
        var remunereChart = new Chart(document.getElementById('remunereChart'), {
            type: 'pie',
            data: {
                labels: ['Remunéré', 'Non Remunéré'],
                datasets: [{
                    data: [{{ $remunereCount }}, {{ $notRemunereCount }}],
                    backgroundColor: ['#36A21B', '#FFCE56']
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return value; // Display the value inside each slice
                        },
                        color: '#000', // Label color
                        font: {
                            weight: 'bold',
                            size: 12
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Pie Chart for OP Etabli Status
        var opEtabliChart = new Chart(document.getElementById('opEtabliChart'), {
            type: 'pie',
            data: {
                labels: ['OP établi', 'OP non établi'],
                datasets: [{
                    data: [{{ $opEtabliCount }}, {{ $notOpEtabliCount }}],
                    backgroundColor: ['#36A21B', '#FFCE56']
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return value; // Display the value inside each slice
                        },
                        color: '#000', // Label color
                        font: {
                            weight: 'bold',
                            size: 12
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

@endsection
