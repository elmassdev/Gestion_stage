@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row">
        {{-- the left part of the page --}}
        <div class="col-md-7">
            <div class="card p-1 py-2" >
                <div class="row ">
                    <div class="row ">
                                <div class="col-md-3  p-2">
                                    <div class="center mx-4">
                                        <img src="{{ asset('storage/images/profile/'.$stagiaire->photo)}}"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" >
                                    </div>
                                </div>
                                <div class="col-md-6  position my-auto top-0 end-0">
                                    <div class="allergy"><b>{{$stagiaire->civilite}} {{$stagiaire->prenom}} {{$stagiaire->nom}}</b></div>
                                    <div class="allergy text-secondary"><span>{{$stagiaire->type_stage}}</span></div>
                                    <div class="allergy text-secondary"><i class="fa fa-address-card"></i> - {{$stagiaire->cin}}</div>
                                    <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:{{$stagiaire->phone}}">{{$stagiaire->phone}}</a> </div>
                                    <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:{{$stagiaire->email}}">{{$stagiaire->email}}</a></div>

                                </div>

                                @if($stagiaire->annule)
                                <div class="col-md-3 text-center"> <p class="bg-warning text-danger rounded-pill" style="font-size: larger"> Stage annulé <b>X</b> </p> </div>
                                @endif




                            <div class="stats">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Niveau</span> <span class="text-left bottom">{{$stagiaire->niveau}}</span> </div>
                                            </td>
                                            <td class="col-md-3">
                                                <div class="d-flex flex-column"> <span class="text-left head">Diplome</span> <span class="text-left bottom">{{$stagiaire->diplome}}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Etablissement</span> <span class="text-left bottom">{{$stagiaire->etablissement}}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Ville</span> <span class="text-left bottom">{{$stagiaire->ville}}</span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de début</span> <span class="text-left bottom">{{ \Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y') }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de fin</span> <span class="text-left bottom">{{\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')}}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Service d'accueil</span> <span class="text-left bottom">{{$stagiaire->service}}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Encadrant</span> <span class="text-left bottom">{{$encadrant->titre}} {{$encadrant->prenom}} {{$encadrant->nom}}</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1 my-2">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="{{ URL::to( 'stagiaires/' . $previous ) }}" class="btn"> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="{{ URL::to( 'stagiaires/' . $next ) }}" class="btn"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/" class="btn"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/{{$stagiaire->id}}/modification"  class="btn text-warning"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td><form action="/stagiaires/{{$stagiaire->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                @if(!($stagiaire->annule))
                <div class="card">
                    <table>
                        <tr>
                            <td>
                                @if (($stagiaire->date_fin<=now()) && !($stagiaire->annule))
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/{{$stagiaire->id}}/attestation" class="btn"><i class="fa fa-print text-primary"></i> Attestation de stage</a>
                                </div>
                                @endif
                                @if(($stagiaire->date_debut>=now()) && !($stagiaire->annule))
                                <div class=" card col-md-12">
                                    <a  href="/stagiaires/{{$stagiaire->id}}/convocation" class="btn" id="LO" ><i class="fa fa-print text-primary"></i> Lettre d'offre</a>
                                </div>
                                @endif
                            </td>
                            <td>
                                @if (($stagiaire->sujet!='') && !($stagiaire->annule))
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/{{$stagiaire->id}}/sujet" class="btn"><i class="fa fa-print text-primary"></i> Sujet de stage</a>
                                </div>
                                @endif
                            </td>
                            <td>
                                @if (($stagiaire->date_fin<=now()) && ($stagiaire->remunere) && !($stagiaire->annule))
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/{{$stagiaire->id}}/op" class="btn"><i class="fa fa-print text-primary"></i> Ordre de paiement</a>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div> @endif
        </div>

        {{-- the right part of the page --}}
        <div class="col-md-5">
            <div class="card p-1 ">
                <div class=" card  p-1 my-2 ">
                    <div class="card-header">{{ __('Rechercher un stagiaire') }}</div>
                    <div class=" card-body py-2">

                <form method="GET" action="/stagiaires/{{$stagiaire->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="column" class="col-md-6 col-form-label text-md-left"> Rechercher un stagiaire:</label>

                        <div class="col-md-6">
                            <select id="column" type="text" class="form-control @error('column') is-invalid @enderror" name="column" required autocomplete="column">
                                <option value="nom" selected>Rechercher par nom</option>
                                <option value="cin">Rechercher par CIN</option>
                                <option value="code">Rechercher par code</option>
                        </select>
                            @error('column')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="term" class="col-md-6 col-form-label text-md-left">{{ __('Entrer votre recherche') }}</label>

                        <div class="col-md-6">
                            <input id="term" type="text" name="term" class="form-control @error('term') is-invalid @enderror"    value="{{ old('term') }}"  required autocomplete="term"  autofocus>

                            @error('term')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Rechercher') }}
                            </button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
                <div>
                    <style>
                        a{
                            color: inherit;
                            text-decoration: none;
                        }
                    </style>
                    @if(count($results))
                    <table class="table table-striped col-md-12 border-solid">
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>CIN</th>
                        <th>Date_debut</th>
                        <th>Date_fin</th>
                        <tbody class="table-striped">
                            @foreach ($results as $result)

                                <tr>
                                    <td><a href="/stagiaires/{{$result->id}}">{{$result->nom}}</a></td>
                                    <td><a href="/stagiaires/{{$result->id}}">{{$result->prenom}}</a></td>
                                    <td><a href="/stagiaires/{{$result->id}}">{{$result->cin}}</a></td>
                                    <td><a href="/stagiaires/{{$result->id}}">{{ \Carbon\Carbon::parse($result->date_debut)->format('d/m/Y') }}</a></td>
                                    <td><a href="/stagiaires/{{$result->id}}">{{ \Carbon\Carbon::parse($result->date_fin)->format('d/m/Y') }}</a></td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $results->links() }}
                    @else
                    <p>
                        pas de résultats
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
