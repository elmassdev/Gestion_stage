@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row">
        {{-- the left part of the page --}}
        <div class="col-md-7">
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
                                @if(($stagiaire->phone) &&($stagiaire->date_debut>now()))
                                <div class="col-md-3 text-center"> <a href="https://wa.me/{{$stagiaire->phone}}?text=Bonjour,%20{{$stagiaire->civilite}}%20{{$stagiaire->prenom}}%20{{$stagiaire->nom}}: %0Avotre%20stage%20est%20approuvé,%20du%20{{ \Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y') }}%20au%20{{ \Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y') }} , @if($stagiaire->sujet) %20et%20votre%20sujet%20est%20:%20{{$stagiaire->sujet}}, @endif  Merci de se présenter le premier jour de votre stage au CCI/UM6P : https://maps.app.goo.gl/J8ZP8REoFHxYqVUs9" target="_blank"> <p class=" btn text-warning btn-secondary"> <b>Notifier!</b>  </p> </a> </div>

                                {{-- <div class="col-md-3 text-center"> <a href="https://wa.me/{{$stagiaire->phone}}?text=Bonjour,%20{{$stagiaire->civilite}}%20{{$stagiaire->prenom}}%20{{$stagiaire->nom}}:%0Avotre%20stage%20est%20approuvé,%20du%20{{$stagiaire->date_debut}}%20au%20{{$stagiaire->date_fin}} @if($stagiaire->sujet) ,%20et%20votre%20sujet%20est%20:%20{{$stagiaire->sujet}}, @endif Merci de se présenter le premier jour de votre stage au CCI/UM6P : https://maps.app.goo.gl/J8ZP8REoFHxYqVUs9" target="_blank">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#159345" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg> --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#159345" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                </a> </div> --}}
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
                                                <?php if(isset($service) && $service->sigle_service): ?>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-left head">Service d'accueil</span>
                                                        <span class="text-left bottom"><?php echo e($service->sigle_service); ?></span>
                                                    </div>
                                                <?php endif; ?>
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
                                <td> <a href="{{ URL::to( 'stagiaires/' . $previous ) }}" class="btn btn-success text-light"> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="{{ URL::to( 'stagiaires/' . $next ) }}" class="btn btn-success text-light"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/" class="btn btn-success text-light"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/{{$stagiaire->id}}/modification"  class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td>
                                    <form action="{{ route('stagiaires.duplicate', ['id' => $stagiaire->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning text-primary"><i class="fa-regular fa-copy"></i></button>
                                    </form>
                                </td>
                                @if(auth()->check() && auth()->user()->hasRole('superadmin'))
                                <td><form action="/stagiaires/{{$stagiaire->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                                </td>
                                @endif
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
                                @if(($stagiaire->date_fin > now()) && !($stagiaire->annule))
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
                <div class="card p-1 py-2">
                    <form method="POST" action="/stagiaires/{{$stagiaire->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="dateLO" class="col-md-3 mx-1 col-form-label text-md-left"> Lettre d'offre éditée le: </label>
                            <div class="col-md-5">
                                <input id="dateLO" type="date" value = "{{$stagiaire->dateLO}}" class="form-control datepicker  @error('dateLO') is-invalid @enderror"   name="dateLO" value="{{ old('dateLO') }}"    autocomplete="dateLO"  autofocus>
                                @error('dateLO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->dateLO)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->dateLO)->format('d/m/Y') }}</p></div>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <label for="date_reception_FFS" class="col-md-3 mx-1 col-form-label text-md-left"> FA + FP reçues le: </label>
                            <div class="col-md-5">
                                <input id="date_reception_FFS" type="date" value = "{{$stagiaire->date_reception_FFS}}" class="form-control datepicker  @error('date_reception_FFS') is-invalid @enderror"   name="date_reception_FFS" value="{{ old('date_reception_FFS') }}"    autocomplete="date_reception_FFS" lang="fr-CA" autofocus>
                                @error('date_reception_FFS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->date_reception_FFS)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->date_reception_FFS)->format('d/m/Y') }}</p></div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <label for="date_Att_etablie" class="col-md-3 mx-1 col-form-label text-md-left"> Attestation établie le: </label>
                            <div class="col-md-5">
                                <input id="date_Att_etablie" type="date" value = "{{$stagiaire->date_Att_etablie}}" class="form-control datepicker  @error('date_Att_etablie') is-invalid @enderror"   name="date_Att_etablie" value="{{ old('date_Att_etablie') }}"    autocomplete="date_Att_etablie" lang="fr-CA" autofocus>
                                @error('date_Att_etablie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->date_Att_etablie)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->date_Att_etablie)->format('d/m/Y') }}</p></div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <label for="Attestation_remise_le" class="col-md-3  mx-1 col-form-label text-md-left"> Attestation remise le:</label>
                            <div class="col-md-5">
                                <input id="Attestation_remise_le" type="date" value = "{{$stagiaire->Attestation_remise_le}}" class="form-control datepicker  @error('Attestation_remise_le') is-invalid @enderror"   name="Attestation_remise_le" value="{{ old('Attestation_remise_le') }}"    autocomplete="Attestation_remise_le" lang="fr-CA" autofocus>
                                @error('Attestation_remise_le')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->Attestation_remise_le)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->Attestation_remise_le)->format('d/m/Y')}}</p></div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <label for="Att_remise_a" class="col-md-3 mx-1 col-form-label text-md-left">{{ __('Attestation remise à: ') }}</label>
                            <div class="col-md-5">
                                <input id="Att_remise_a" type="text" value="{{ $stagiaire->Att_remise_a }}" class="form-control @error('Att_remise_a') is-invalid @enderror"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="Att_remise_a"    autocomplete="Att_remise_a"  autofocus>
                                @error('Att_remise_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->Att_remise_a)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{ $stagiaire->Att_remise_a }}</p></div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <label for="OP_etabli_le" class="col-md-3 mx-1 col-form-label text-md-left"> OP établie le: </label>
                            <div class="col-md-5">
                                <input id="OP_etabli_le" type="date" value = "{{$stagiaire->OP_etabli_le}}" class="form-control datepicker  @error('OP_etabli_le') is-invalid @enderror"   name="OP_etabli_le" value="{{ old('OP_etabli_le') }}"    autocomplete="OP_etabli_le" lang="fr-CA" autofocus>
                                @error('OP_etabli_le')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->OP_etabli_le)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->OP_etabli_le)->format('d/m/Y') }}</p></div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <label for="indemnite_remise_le" class="col-md-3 mx-1 col-form-label text-md-left"> Indemnité remise le:</label>
                            <div class="col-md-5">
                                <input id="indemnite_remise_le" type="date" value = "{{$stagiaire->indemnite_remise_le}}" class="form-control datepicker  @error('indemnite_remise_le') is-invalid @enderror"   name="indemnite_remise_le" value="{{ old('indemnite_remise_le') }}"    autocomplete="indemnite_remise_le" lang="fr-CA" autofocus>
                                @error('indemnite_remise_le')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($stagiaire->indemnite_remise_le)
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center">{{\Carbon\Carbon::parse($stagiaire->indemnite_remise_le)->format('d/m/Y') }}</p></div>
                            @endif
                        </div>
                        <div class="row mb-0">
                            <div >
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-regular fa-floppy-disk"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
