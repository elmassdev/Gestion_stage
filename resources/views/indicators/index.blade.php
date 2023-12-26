@extends('layouts.app')

@section('content')

<style>
    .left{
        padding-left: 2%;
        width:60%;
    }
    .right{
        width:35%;
    }
</style>
<div class="row py-4">
    <div class="col-md-9 left">
        <div class="row">
            <div class="col-md-6 border">
                <h6>Bilan stagiaires en cours par service: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaSer"><i class="fa-solid fa-file-export" ></i></a> </h6>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="small">
                            <th>Service</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagiaires as $stagiaire)
                        <tr class=" table table-row my-auto h-10 small">
                            <td>{{ $stagiaire->sigle_service}}</td>
                            <td>{{ $stagiaire->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 border">
                <canvas id="myPieChart" height="200px"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var data = @json($stagiaires);

                    var labels = data.map(function(item) {
                        return item.sigle_service;
                    });

                    var values = data.map(function(item) {
                        return item.total;
                    });

                    var ctx = document.getElementById('myPieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Nombre de stagiaires:',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)',
                                    'rgba(54, 162, 235, 0.7)',
                                    'rgba(255, 206, 86, 0.7)',
                                    'rgba(75, 192, 192, 0.7)',
                                    'rgba(153, 102, 255, 0.7)',
                                    'rgba(255, 159, 64, 0.7)'
                                    // Add more colors if needed
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                    // Add more colors if needed
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan stagiaires en cours par service: '+new Date().toLocaleDateString('en-GB'),
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    document.getElementById('myPieChart').style.height = document.querySelector('.left > div').style.height;
                </script>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 border">
                <h6> Bilan stagiaires en cours par encadrant: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaEnc"><i class="fa-solid fa-file-export" ></i></a> </h6>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="small">
                            <th>Encadrant</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagenc as $st)
                        <tr class=" table table-row my-auto h-10 small">
                            <td> {{ $st->nomenc}}</td>
                            <td>{{ $st->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 border">
                <canvas id="stagenc" height="200px"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var data = @json($stagenc);

                    var labels = data.map(function(item) {
                        return item.nomenc;
                    });

                    var values = data.map(function(item) {
                        return item.total;
                    });

                    var ctx = document.getElementById('stagenc').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label:'Nombre de stagiaires',
                                data: values,
                                label:'Nombre de stagiaires',
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.7)',
                                    'rgba(54, 162, 235, 0.7)',
                                    'rgba(255, 206, 86, 0.7)',
                                    'rgba(75, 192, 192, 0.7)',
                                    'rgba(153, 102, 255, 0.7)',
                                    'rgba(255, 159, 64, 0.7)'
                                    // Add more colors if needed
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                    // Add more colors if needed
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan stagiaires en cours par encadrant: '+new Date().toLocaleDateString('en-GB'),
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    document.getElementById('stagenc').style.height = document.querySelector('.left > div').style.height;
                </script>

            </div>
        </div>
        <div class="row card my-2">
            <div class="card-header">
                <div class="card">
                    <form method="GET" action="/indicators/index" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h6 class="col-md-5">Liste des stagiaires pour une date:</h6>
                            <div class="col-md-3">
                                <input id="search" type="date" value="<?php echo date('Y-m-d');?>" class="form-control @error('search') is-invalid @enderror"   name="search" value="{{ old('search') }}"  required autocomplete="search"   autofocus>
                                @error('search')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Rechercher') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(request()->has('search'))
        <div class="row card border" id="datesearch" >
            @if(count($results))
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Titre</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Type de stage</th>
                        <th>Niveau</th>
                        <th>Diplôme</th>
                        <th>Etablissement</th>
                        <th>Ville</th>
                        <th>Service</th>
                        <th>Encadrant</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                    </tr>
                </thead>
                <tbody>@foreach($results as $res)
                    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $res->civilite}}</td>
                        <td>{{ $res->prenom}}</td>
                        <td>{{ $res->nom}}</td>
                        <td>{{ $res->type_stage}}</td>
                        <td>{{ $res->niveau}}</td>
                        <td>{{ $res->diplome}}</td>
                        <td>{{ $res->etablissement}}</td>
                        <td>{{ $res->ville}}</td>
                        <td>{{ $res->service}}</td>
                        <td>{{ $res->nomenc}}</td>
                        <td>{{ \Carbon\Carbon::parse($res->date_debut)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($res->date_fin)->format('d/m/Y')}}</td>
                        <td> <a  href="/stagiaires/{{$res->id}}"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $results->links() }}
            @else
            <p class="bg-warning text-danger"> Pas de stagiaires pour cette date</p>
            @endif
        </div>
        @endif

        {{-- <div class="row card border">

             @if(count($statoday))
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Titre</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Type de stage</th>
                        <th>Niveau</th>
                        <th>Diplôme</th>
                        <th>Etablissement</th>
                        <th>Ville</th>
                        <th>Service</th>
                        <th>Encadrant</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                    </tr>
                </thead>
                <tbody>@foreach($statoday as $statdy)
                    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $statdy->civilite}}</td>
                        <td>{{ $statdy->prenom}}</td>
                        <td>{{ $statdy->nom}}</td>
                        <td>{{ $statdy->type_stage}}</td>
                        <td>{{ $statdy->niveau}}</td>
                        <td>{{ $statdy->diplome}}</td>
                        <td>{{ $statdy->etablissement}}</td>
                        <td>{{ $statdy->ville}}</td>
                        <td>{{ $statdy->service}}</td>
                        <td>{{ $statdy->nomenc}}</td>
                        <td>{{\Carbon\Carbon::parse($statdy->date_debut)->format('d/m/Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($statdy->date_fin)->format('d/m/Y')}}</td>
                        <td> <a  href="/stagiaires/{{$statdy->id}}"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $statoday->links() }}
            @else
            <p> Pas de stagiaires en ce moment!</p>
            @endif
        </div> --}}

    </div>
    <div class="col-md-2  mx-auto py-2 right">
        <h6 class="col-md-9 border border-solid"> <span class="mx-2"> Exporter la liste des stagiaires en cours:  </span> <a class="btn text-success  rounded-pill" href="/indicators/ListeCurrentSta"> <i class="fa-solid fa-file-export" ></i></a></h6>
        <div class="card">
            <div class="card-header">{{ __('Exportation des données vers un fichier Excel:') }}</div>
            <form method="GET" action="/indicators/ExportSta" id="export-form" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <p>Merci de choisir l'interval souhaité: </p>
                    <div class="row mb-3">
                        <label for="firstdate" class="col-md-3 col-form-label text-md-left"> Début d'interval</label>
                        <div class="col-md-8">
                            <input id="firstdate" type="date" value="<?php echo date('Y-m-d');?>"  class="form-control datepicker  @error('firstdate') is-invalid @enderror"   name="firstdate" value="{{ old('firstdate') }}" pattern="dd/mm/yyyy"  required autocomplete="firstdate" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>
                            @error('firstdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="secdate" class="col-md-3 col-form-label text-md-left"> Fin d'interval</label>
                        <div class="col-md-8">
                            <input id="secdate" type="date" value="<?php echo date('Y-m-d');?>" class="form-control datepicker  @error('secdate') is-invalid @enderror"   name="secdate" value="{{ old('secdate') }}" pattern="dd/mm/yyyy"  required autocomplete="secdate" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>
                            @error('secdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 my-2 mx-auto">
                        <button type="submit" id="export-button" class="btn btn-primary rounded-pill" onclick="validateDate()">
                            Exporter
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <canvas id="monthlyStagiairesChart" width="400" height="300"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var data = @json($monthlysta);
                var months = [];
                var counts = [];

                data.forEach(function(item) {
                    months.push(item.mois + '/' + item.annee);
                    counts.push(item.total);
                });

                var ctx = document.getElementById('monthlyStagiairesChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Stagiaires per Month',
                            data: counts,
                            fill: false, // Set to false to display a line without filling the area underneath
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            pointRadius: 5, // Set to adjust the size of data points
                            pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Set to the color of data points
                            tension: 0.4,
                        }]
                    },
                    options: {
                        plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan des stagiaires par mois : ',
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            {{-- <script>
                var data = @json($monthlysta);
                var months = [];
                var counts = [];

                data.forEach(function(item) {
                    months.push(item.mois + '/' + item.annee);
                    counts.push(item.total);
                });

                var ctx = document.getElementById('monthlyStagiairesChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Stagiaires per Month',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script> --}}

        </div>
    </div>
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById("firstdate");
            const endDateInput = document.getElementById("secdate");
            const exportButton = document.getElementById("export-button");

            function validateDate() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                    alert("Merci d'entrer des dates valides.");
                    return false;
                }

                if (startDate.getTime() >= endDate.getTime()) {
                    alert("La date de début doit être antérieure à la date de fin.");
                    return false;
                } else {
                    return true;
                }
            }

            function updateButtonStatus() {
                exportButton.disabled = !validateDate();
            }

            function updateButtonOnEndDateChange() {
                updateButtonStatus();
            }

            startDateInput.addEventListener('input', updateButtonStatus);
            endDateInput.addEventListener('input', updateButtonOnEndDateChange);
        });
    </script>








</div>
@endsection
