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
                                @if($stagiaire->phone)
                                <div class="col-md-3 text-center"> <a href="https://wa.me/{{$stagiaire->phone}}?text=Bonjour,%20{{$stagiaire->civilite}}%20{{$stagiaire->prenom}}%20{{$stagiaire->nom}}: %0Avotre%20stage%20est%20approuvé,%20du%20{{ \Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y') }}%20au%20{{ \Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y') }} , @if($stagiaire->sujet) %20et%20votre%20sujet%20est%20:%20{{$stagiaire->sujet}}, @endif  Merci de se présenter le premier jour de votre stage au CCI/UM6P : https://maps.app.goo.gl/J8ZP8REoFHxYqVUs9" target="_blank"><i class="fa-brands fa-whatsapp fa-2xl" style="color: #1d9f78;"></i></a> </div>
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
                                <td> <a href="{{ URL::to( 'stagiaires/' . $previous ) }}" class="btn btn-success text-light "> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="{{ URL::to( 'stagiaires/' . $next ) }}" class="btn btn-success text-light"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/" class="btn btn-primary text-light"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/{{$stagiaire->id}}/modification"  class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

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
                            <label for="OP_etabli_le" class="col-md-3 mx-1 col-form-label text-md-left"> OP établi le: </label>
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
