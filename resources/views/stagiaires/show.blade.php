@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        {{-- the left part of the page --}}
        <div class="col-md-7">
            <div class="card p-1 bg-light">
                <div class="row ">
                    <div class="row ">
                            <div class="col-md-3  p-2">
                                <div class="center mx-4">
                                    <img src="{{ asset('storage/images/profile/'.$stagiaire->photo)}}"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" >
                                </div>
                            </div>
                            <div class="col-md-8  position my-auto top-0 end-0">
                                <div class="allergy"><b>{{$stagiaire->civilite}} {{$stagiaire->prenom}} {{$stagiaire->nom}}</b></div>
                                <div class="allergy text-secondary"><span>{{$stagiaire->type_stage}}</span></div>
                                <div class="allergy text-secondary"><i class="fa fa-address-card"></i> - {{$stagiaire->cin}}</div>
                                <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:{{$stagiaire->phone}}">{{$stagiaire->phone}}</a> </div>
                                <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:{{$stagiaire->email}}">{{$stagiaire->email}}</a></div>

                            </div>


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
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de début</span> <span class="text-left bottom">{{$stagiaire->date_debut}}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de fin</span> <span class="text-left bottom">{{$stagiaire->date_fin}}</span> </div>
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
                <div class="card p-1 bg-light">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="{{ URL::to( 'stagiaires/' . $previous ) }}" class="btn btn-success text-light"> Precedant </a></td>
                                <td><a href="{{ URL::to( 'stagiaires/' . $next ) }}" class="btn btn-success text-light"> Suivant</a></td>
                                <td><a href="/stagiaires/" class="btn btn-primary text-light"> Liste stagiaires</a></td>
                                <td><a href="/stagiaires/{{$stagiaire->id}}/modification"  class="btn btn-warning text-dark">Modifier</a></td>
                                <td><form action="/stagiaires/{{$stagiaire->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')">Supprimer</button></form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="card p-1 bg-light">
                    <table>
                        <tr class="col-md-12  float-left">
                            <td>
                                @if ($stagiaire->date_fin<=now())
                        <div class="card col-md-12 my-2">
                            <a  href="/stagiaires/{{$stagiaire->id}}/attestation"><i class="fa fa-print text-primary"></i> Attestation de stage</a>

                        </div>
                    @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr class="col-md-12  float-left">
                            @if($stagiaire->date_debut>=now())
                            <td>
                                <div class=" card col-md-11 ">
                                    <a  href="/stagiaires/{{$stagiaire->id}}/convocation"><i class="fa fa-print text-primary mx-2"></i> Lettre d'offre de stage</a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if ($stagiaire->sujet!='')
                                    <div class="card col-md-11">
                                        <a  href="/stagiaires/{{$stagiaire->id}}/sujet"><i class="fa fa-print text-primary mx-2"></i> Sujet de stage</a>
                                    </div>
                                 @endif
                               </div>
                            </td>
                            @endif
                        </tr>
                    </table>
                </div>
        </div>

        {{-- the right part of the page --}}
        <div class="col-md-5">
            <div class="card p-1 bg-light">
                <div class=" card  p-1">
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
                    @if(count($results))
                    <table>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>cin</th>
                        <th>date_debut</th>
                        <th>date_fin</th>
                        <tbody>
                            @foreach ($results as $result)

                            <tr>

                                <td><a href="/stagiaires/{{$result->id}}">{{$result->nom}}</a></td>
                                <td><a href="/stagiaires/{{$result->id}}">{{$result->prenom}}</a></td>
                                <td><a href="/stagiaires/{{$result->id}}">{{$result->cin}}</a></td>
                                <td><a href="/stagiaires/{{$result->id}}">{{$result->date_debut}}</a></td>
                                <td><a href="/stagiaires/{{$result->id}}">{{$result->date_fin}}</a></td>

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
