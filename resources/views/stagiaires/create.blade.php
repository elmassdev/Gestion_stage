@extends('layouts.app')
@section('content')

{{-- <div class="row display-inline py-4 ">
    <a href="/filieres/create" target="/_blank"  class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter une filière</a>
    <a href="/etablissements/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un établissement</a>
    <a href="/services/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un service</a>
    <a href="/encadrants/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un encadrant </a>
    <a href="/villes/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter une ville</a>
</div> --}}
{{-- <div class="row">
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
</div> --}}
@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif

<div class="d-flex align-items-center py-4">
    <div class="container card">
        <div class="card-header"> <h5>{{ __('Ajouter un stagiaire') }}</h5>  </div>
        <div class="row  card-body">
            <div class="col border border-solid rounded pt-2">
                <form method="POST" action="/stagiaires/create" enctype="multipart/form-data" onsubmit="return validateDates()">
                    @csrf
                    {{-- Verification date debut date fin  --}}
                    <script>
                    $(document).ready(function() {
                        $('#filiere').select2();
                    });
                    function validateDates() {
                        // Get the input elements
                        let today = new Date();
                        const holidays = [];
                        const year = new Date().getFullYear();

                        // New Year's Day
                        holidays.push(`${year}-01-01`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-01-01`);
                            }

                        // 11 janvier
                        holidays.push(`${year}-01-11`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-01-11`);
                            }
                        //1er Mai
                        holidays.push(`${year}-05-01`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-05-01`);
                            }
                        //30 juillet
                        holidays.push(`${year}-07-30`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-07-30`);
                            }
                        //14 Aout
                        holidays.push(`${year}-08-14`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-08-14`);
                            }

                            //20 aout
                        holidays.push(`${year}-08-20`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-08-20`);
                            }
                        //21 aout
                        holidays.push(`${year}-08-21`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-08-21`);
                            }

                        //almassira
                        holidays.push(`${year}-11-06`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-11-06`);
                            }
                        //independance
                        holidays.push(`${year}-11-18`);
                        for (let i = 1; i <= 10; i++) {
                            holidays.push(`${year+i}-11-18`);
                            }


                        const startDateInput = document.getElementById("date_debut");
                        const endDateInput = document.getElementById("date_fin");

                        // Get the selected dates
                        const startDate = new Date(startDateInput.value);
                        const endDate = new Date(endDateInput.value);



                        const formattedBeginningDate = startDate.toISOString().slice(0, 10);
                        const formattedEndDate = endDate.toISOString().slice(0, 10);

                        // Check if the beginning date input is a holiday
                        if (holidays.includes(formattedBeginningDate)){
                            alert('La date de debut est un jour ferié.');
                            return false;
                        }
                        if (holidays.includes(formattedEndDate)){
                            alert('La date de fin est un jour ferié.');
                            return false;
                        }



                        if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                            alert("Merci d'entrer des dates valides.");
                            return false;
                        }
                        if (startDate.getTime() >= endDate.getTime()) {
                            alert("La date de début doit être antérieure à la date de fin.");
                            return false;
                        }
                        // if ( startDate.getTime() < today+1 ) {
                        //     alert("La date de début ne peut pas être antérieure à aujourd'hui.");
                        //     return false;
                        // }
                        if (startDate.getDay()===6 || startDate.getDay()===0) {
                            alert("La date de début correspond à un weekend");
                            return false;
                        }
                        if (endDate.getDay()===6 || endDate.getDay()===0) {
                            alert("La date de fin correspond à un weekend");
                            return false;
                        }
                        // All validation checks passed
                        return true;
                        }

                </script>
                <script>
                    //change data values to json
                    var FilSer = @json($services);
                    var FilSerEnc = @json($encadrants);
                </script>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#nom, #prenom').on('input', function () {
                            updateEmail();
                        });

                        function updateEmail() {
                            var nomValue = $('#nom').val().toLowerCase();
                            var prenomValue = $('#prenom').val().toLowerCase();
                            var emailValue = prenomValue + '.' + nomValue + '@gmail.com';
                            $('#email').val(emailValue);
                        }
                    });
                </script>
                <div class="row mb-3">
                    <label for="date_demande" class="col-md-3 col-form-label text-md-left"> Date demande</label>
                    <div class="col-md-8">
                        <input id="date_demande" type="date" value="<?php echo date('Y-m-d');?>"  class="form-control datepicker  @error('date_demande') is-invalid @enderror"   name="date_demande" value="{{ old('date_demande') }}" pattern="dd/mm/yyyy"  required autocomplete="date_demande" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>
                        @error('date_demande')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="site" class="col-md-3 col-form-label text-md-left"> Site de stage</label>

                    <div class="col-md-8">

                        <select id="site" type="text" class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
                            <option value="Benguerir" @if (Auth::user()->site =='Benguerir') selected     @endif>Benguerir</option>
                            <option value="Youssoufia" @if (Auth::user()->site =='Youssoufia') selected     @endif > Youssoufia</option>
                        </select>
                        @error('site')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="photo" class="col-md-3 col-form-label text-md-left">Photo de profile</label>

                    <div class="col-md-8">
                        <input class="form-control" name="photo" type="file" id="photo"  accept="image/gif, image/jpeg, image/png" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="civilite" class="col-md-3 col-form-label text-md-left"> Titre de civilité</label>

                    <div class="col-md-8">
                        <select id="civilite" type="text" class="form-control @error('civilite') is-invalid @enderror" name="civilite" required autocomplete="civilite">
                            <option value="M." selected>Monsieur</option>
                            <option value="Mlle">Mademoiselle</option>
                            <option value="Mme">Madame</option>
                    </select>
                        @error('civilite')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="prenom" class="col-md-3 col-form-label text-md-left">{{ __('Prénom') }}</label>

                    <div class="col-md-8">
                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="prenom" value="{{ old('prenom') }}"  required autocomplete="prenom"  autofocus>

                        @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="nom" class="col-md-3 col-form-label text-md-left">{{ __('Nom') }}</label>

                    <div class="col-md-8">
                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" oninput="this.value = this.value.toUpperCase()" required autocomplete="nom"  autofocus>

                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cin" class="col-md-3 col-form-label text-md-left">{{ __('CIN') }}</label>

                    <div class="col-md-8">
                        <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" oninput="this.value = this.value.toUpperCase()" required autocomplete="cin" autofocus>

                        @error('cin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-md-3 col-form-label text-md-left">{{ __('Téléphone') }}</label>

                    <div class="col-md-8">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', '+212') }}"  autocomplete="phone"  placeholder="ex: +212662077439" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('Email') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="niveau" class="col-md-3 col-form-label text-md-left"> Niveau</label>

                    <div class="col-md-8">
                        <select id="niveau" type="text" class="form-control @error('niveau') is-invalid @enderror" name="niveau"  autocomplete="niveau">
                            <option value="1ère année" >1ère année</option>
                            <option value="2ème année">2ème année</option>
                            <option value="3ème année">3ème année</option>
                            <option value="4ème année">4ème année</option>
                            <option value="5ème année">5ème année</option>
                    </select>
                        @error('niveau')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label for="diplome" class="col-md-3 col-form-label text-md-left"> Diplôme</label>

                    <div class="col-md-8">
                        <input list="diplome-list" id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome" autocomplete="diplome">
                        <datalist id="diplome-list">
                            <option selected value=""></option>
                            <option value="Qualification Professionnelle">
                            <option value="Technicien">
                            <option value="Technicien spécialisé">
                            <option value="DUT">
                            <option value="BTS">
                            <option value="Licence fondamentale">
                            <option value="Licence professionnelle">
                            <option value="Cycle d'Ingénieur">
                            <option value="Master">
                            <option value="Mastère spécialisé">
                            <option value="Doctorat">
                        </datalist>
                        @error('diplome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}



                <div class="row mb-3">
                    <label for="diplome" class="col-md-3 col-form-label text-md-left"> Diplôme</label>

                    <div class="col-md-8">
                        <select id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome"  autocomplete="diplome">
                            <option selected value=""></option>
                            <option value="Qualification Professionnelle">Qualification Professionnelle</option>
                            <option value="Technicien">Technicien</option>
                            <option value="Technicien spécialisé">Technicien spécialisé</option>
                            <option value="DUT">DUT</option>
                            <option value="DUT">BTS</option>
                            <option value="Licence fondamentale">Licence fondamentale</option>
                            <option value="Licence professionnelle">Licence professionnelle</option>
                            <option value="Cycle d'Ingénieur">Cycle d'Ingénieur</option>
                            <option value="Master">Master</option>
                            <option value="Mastère spécialisé">Mastère spécialisé</option>
                            <option value="Doctorat">Doctorat</option>
                    </select>
                        @error('diplome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label for="filiere" class="col-md-3 col-form-label text-md-left"> Filiere</label>
                    <div class="col-md-8">
                        <select id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" required autocomplete="filiere">
                        <option selected disabled> -- Filières-- </option>
                        @foreach($filieres as $f)
                        <option value="{{ $f->filiere}}">{{$f->filiere}}</option>
                        @endforeach
                    </select>
                        @error('filiere')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="etablissement" class="col-md-3 col-form-label text-md-left"> Etablissement</label>
                    <div class="col-md-8">
                        <select id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" required autocomplete="etablissement">
                        <option selected disabled>----------</option>
                        @foreach($etablissements as $etab)
                        <option value="{{ $etab->sigle_etab}}">{{$etab->sigle_etab}} - {{ $etab->Etab}}</option>
                        @endforeach
                    </select>
                        @error('etablissement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> --}}

            <div class="row mb-3">
                <label for="filiere" class="col-md-3 col-form-label text-md-left"> Filière</label>
                <div class="col-md-8">
                    <input list="filiere-list" id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" required autocomplete="filiere" required>
                    <datalist id="filiere-list">
                        <option selected disabled> -- Filières-- </option>
                        @foreach($filieres as $f)
                            <option value="{{ $f->filiere }}">
                        @endforeach
                    </datalist>
                    @error('filiere')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="etablissement" class="col-md-3 col-form-label text-md-left"> Etablissement</label>
                <div class="col-md-8">
                    <input list="etablissement-list" id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" required autocomplete="etablissement" required>
                    <datalist id="etablissement-list">
                        @foreach($etablissements as $etab)
                            <option value="{{ $etab->sigle_etab }}">{{ $etab->Etab }}</option>
                        @endforeach
                    </datalist>
                    @error('etablissement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <script>
            // document.getElementById('filiere').addEventListener('input', function() {
            //     var input = this.value;
            //     var options = document.getElementById('filiere-list').getElementsByTagName('option');
            //     var match = false;
            //     for (var i = 0; i < options.length; i++) {
            //         if (input === options[i].value) {
            //             match = true;
            //             break;
            //         }
            //     }
            //     if (!match) {
            //         this.setCustomValidity('Merci de selectionner une filière de la liste!');
            //     } else {
            //         this.setCustomValidity('');
            //     }
            // });

            // document.getElementById('etablissement').addEventListener('input', function() {
            //     var input = this.value;
            //     var options = document.getElementById('etablissement-list').getElementsByTagName('option');
            //     var match = false;
            //     for (var i = 0; i < options.length; i++) {
            //         if (input === options[i].value) {
            //             match = true;
            //             break;
            //         }
            //     }
            //     if (!match) {
            //         this.setCustomValidity('Merci de selectionner un établissement de la liste!');
            //     } else {
            //         this.setCustomValidity('');
            //     }
            // });
        </script>

        {{-- <div class="col border border-solid rounded pt-2">
            <div class="row mb-3">
                <label for="ville" class="col-md-3 col-form-label text-md-left"> Ville </label>
                <div class="col-md-8">
                    <select id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville"  autocomplete="ville">
                        <option selected disabled> -- ----- -- </option>
                        @foreach($villes as $ville)
                    <option value="{{ $ville->ville }}">{{$ville->ville}}</option>
                    @endforeach

                    </select>

                    @error('ville')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
            <div class="col border border-solid rounded pt-2">
                <div class="row mb-3">
                    <label for="ville" class="col-md-3 col-form-label text-md-left"> Ville </label>
                    <div class="col-md-8">
                        <input list="ville-list" id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" autocomplete="ville" required>
                        <datalist id="ville-list">
                            <option selected disabled> -- ----- -- </option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->ville }}">
                            @endforeach
                        </datalist>

                        @error('ville')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            <div class="row mb-3">
                <label for="type_stage" class="col-md-3 col-form-label text-md-left"> Type Stage</label>
                <div class="col-md-8">
                    <select id="type_stage" type="text" class="form-control @error('type_stage') is-invalid @enderror" name="type_stage"  autocomplete="type_stage" required>
                        <option  selected disabled></option>
                        <option value="stage ouvrier">stage ouvrier</option>
                        <option value="stage d'application">stage d'application</option>
                        <option value="stage d'observation">stage d'observation</option>
                        <option value="stage projet fin d'études">Stage PFE</option>
                </select>
                    @error('type_stage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="type_formation" class="col-md-3 col-form-label text-md-left"> Type Formation</label>

                <div class="col-md-8">
                    <select id="type_formation" type="text" class="form-control @error('type_formation') is-invalid @enderror" name="type_formation"  autocomplete="type_formation" required>
                        <option  selected disabled>  </option>
                        <option value="EI">EI</option>
                        <option value="OFPPT">OFPPT</option>
                        <option value="EST+FAC+BTS">EST+FAC+BTS</option>
                        <option value="Cycle Préparatoire (CI)">Cycle Préparatoire (CI)</option>
                        <option value="IMM+IMT">IMM+IMT</option>
                        <option value="Autres">Autres</option>
                </select>
                    @error('type_formation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="encadrant" class="col-md-3 col-form-label text-md-left"> Encadrant</label>
                <div class="col-md-8">
                    <select id="encadrant" type="text" class="form-control @error('encadrant') is-invalid @enderror" name="encadrant" required autocomplete="encadrant" required>
                    <option selected disabled></option>
                    @foreach($encadrants as $encadrant)
                    <option value="{{ $encadrant->id}}">{{$encadrant->nom}}  {{ $encadrant->prenom}}</option>
                    @endforeach
                </select>
                    @error('encadrant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="service" class="col-md-3 col-form-label text-md-left"> Service d'accueil</label>
                <div class="col-md-8">
                    <select id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" required autocomplete="service" required>
                        <option selected disabled>Service</option>
                        {{-- @foreach($services as $service)
                            <option value="{{ $service->sigle_service}}">{{$service->sigle_service}} - {{ $service->libelle}}</option>
                            @endforeach --}}
                    </select>
                    @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <label for="date_debut" class="col-md-3 col-form-label text-md-left"> Date de début</label>

                <div class="col-md-8">
                    {{-- <input id="date_debut" type="date" class="form-control datepicker @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut') }}" required autocomplete="date_debut" placeholder="dd/mm/yyyy" min="1997-01-01" max="2045-12-31" autofocus> --}}

                    <input id="date_debut" type="date"  class="form-control datepicker  @error('date_debut') is-invalid @enderror"   name="date_debut" value="{{ old('date_debut') }}" pattern="dd/mm/yyyy"  required autocomplete="date_debut" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>

                    @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <span class="bg-warning text-danger" id="dd"></span>

            </div>


            <div class="row mb-3">
                <label for="date_fin" class="col-md-3 col-form-label text-md-left"> Date de fin</label>

                <div class="col-md-8">
                    {{-- <input id="date_fin" type="text" class="form-control datepicker @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin') }}" pattern="\d{2}/\d{2}/\d{4}" required autocomplete="date_fin" placeholder="dd/mm/yyyy" minlength="10" maxlength="10" oninput="formatDate(this)" onchange="validateDate(this)" title="Enter a date in the format dd/mm/yyyy" /> --}}

                    <input id="date_fin" type="date"  class="form-control datepicker  @error('date_fin') is-invalid @enderror"   name="date_fin" value="{{ old('date_fin') }}" pattern="dd/mm/yyyy"  required autocomplete="date_fin" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>
                    <span class=" bg-warning tex-danger" id="datewarning"></span>

                    @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <span class="bg-warning text-danger" id="df"></span>

            </div>

            <div class="row mb-3">
                <label for="sujet" class="col-md-3 col-form-label text-md-left">{{ __('Sujet') }}</label>

                <div class="col-md-8">
                    <textarea id="sujet" oninput="validateDates()" class="form-control @error('sujet') is-invalid @enderror" name="sujet" value="{{ old('sujet') }}"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="sujet"  autofocus ></textarea>

                    @error('sujet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="observation" class="col-md-3 col-form-label text-md-left">{{ __('Observation') }}</label>
                <div class="col-md-8">
                    <textarea id="observation" class="form-control @error('observation') is-invalid @enderror" name="observation" value="{{ old('observation') }}"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="observation"  autofocus ></textarea>
                    @error('observation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 display-inline">
                <div class="col-md-6">
                    <label for="remunere" class="col-md-6 col-form-label text-md-left">{{ __('Stage remuneré') }}</label>
                    <input type="checkbox" name="remunere" id="remunere" value="true">
                </div>
                <div class="col-md-6">
                    <label for="EI" class="col-md-6 col-form-label text-md-left">{{ __('Elève Ingénieur') }}</label>
                    <input type="checkbox" name="EI" id="EI" value="true">
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" onclick="validateDates()">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<div class="col-md-2">
    <a href="/filieres/create" target="/_blank"  class=" btn btn-outline-success col-md-11 my-3  py-2 mx-auto  rounded-pill ">Ajouter une filière</a>
    <a href="/etablissements/create" target="/_blank" class=" btn btn-outline-success col-md-11 my-3  py-2 mx-auto  rounded-pill ">Ajouter un établissement</a>
    <a href="/services/create" target="/_blank" class=" btn btn-outline-success col-md-11 my-3  py-2 mx-auto  rounded-pill ">Ajouter un service</a>
    <a href="/encadrants/create" target="/_blank" class=" btn btn-outline-success col-md-11 my-3  py-2 mx-auto  rounded-pill ">Ajouter un encadrant </a>
    <a href="/villes/create" target="/_blank" class=" btn btn-outline-success col-md-11 my-3  py-2 mx-auto  rounded-pill ">Ajouter une ville</a>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#diplome').select2();
    });
</script>




<script>
    var EI = document.getElementById('EI');
    window.addEventListener('load', function() {
        var site =document.getElementById('site').value;
        var filtered_services = FilSer.filter(function(services) {
            return services.site === site;
        });
        var service_select = document.getElementById('service');
        service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
        filtered_services.forEach(function(services) {
            service_select.innerHTML += '<option value="' + services.id + '">' + services.sigle_service+' - '+services.libelle + '</option>';
        });
    });

    document.getElementById('site').addEventListener('change', function() {
        site = this.value;
        var filtered_services = FilSer.filter(function(services) {
            return services.site === site;
        });
        //alert(JSON.stringify(filtered_services));

        var service_select = document.getElementById('service');
        service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
        filtered_services.forEach(function(services) {
            service_select.innerHTML += '<option value="' + services.id + '">' + services.sigle_service+' - '+services.libelle + '</option>';
        });
    });

    document.getElementById('encadrant').addEventListener('change', function() {
        var selectedEncadrantId = this.value;
        var serviceDropdown = document.getElementById('service');
        serviceDropdown.innerHTML = '';

        if (selectedEncadrantId) {
            var selectedEncadrant = FilSerEnc.find(function(encadrant) {
                return encadrant.id == selectedEncadrantId;
            });

            if (selectedEncadrant) {
                var option = document.createElement('option');
                var filteredService = FilSer.find(function(service) {
                    return service.id === selectedEncadrant.service;
                });

                if (filteredService) {
                    option.value = filteredService.id;
                    option.text = filteredService.sigle_service + ' - ' + filteredService.libelle;
                    serviceDropdown.appendChild(option);
                }
            }
        }
    });

    document.getElementById('diplome').addEventListener('change', function(){
        var diplome = this.value;
        var etab = document.getElementById('etablissement').value;
        var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENSET','ENCG','ISCAE','EMINES','FS','FST','FSJES','UM6P','AIAC','ENSEM','FSS']
        var isMasterOrCycle = diplome === 'Cycle d\'Ingénieur' || diplome === 'Master' || diplome === 'Mastère spécialisé' || diplome ==='Doctorat';
        document.getElementById('EI').checked = isMasterOrCycle;
        var isRemunere = ((isMasterOrCycle && ListEtab.includes(etab))|| etab ==='IMM'|| etab ==='IMT');
        document.getElementById('remunere').checked =isRemunere;
    });

    document.getElementById('etablissement').addEventListener('change', function(){
        var etab = this.value;
        var diplome = document.getElementById('diplome').value;
        var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENCG','ISCAE','EMINES','FS','FST','FSJES','UM6P','AIAC','ENSEM','FSS']
        var isMoCI = diplome === 'Cycle d\'Ingénieur' || diplome === 'Master' || diplome === 'Mastère spécialisé' || diplome ==='Doctorat';
        document.getElementById('EI').checked = isMoCI;
        var isRem = ((isMoCI && ListEtab.includes(etab)) || etab ==='IMM'|| etab ==='IMT');
        document.getElementById('remunere').checked =isRem;
    });

    function updateTypeStage() {
       var diplomeInput = document.getElementById('diplome').value;
       var niveauInput = document.getElementById('niveau').value;
       var typeF = document.getElementById('type_formation');
       var typeStageSelect = document.getElementById('type_stage');
       var Etab = document.getElementById('etablissement');

       if ((diplomeInput === 'Master' && niveauInput === '2ème année') || (diplomeInput === 'Mastère spécialisé' && niveauInput === '2ème année') || (diplomeInput === 'Cycle d\'Ingénieur' &&  niveauInput === '3ème année')) {
           typeStageSelect.value = 'stage projet fin d\'études';
           typeF.value="EI";
       } else if ((diplomeInput === 'Master' && niveauInput === '1ère année') || (diplomeInput === 'Cycle d\'Ingénieur' && niveauInput === '1ère année') || (diplomeInput === 'Cycle d\'Ingénieur' && niveauInput === '2ème année') || (diplomeInput==='Mastère spécialisé' && niveauInput === '1ère année')) {
           typeStageSelect.value = 'stage d\'application';
           typeF.value="EI";
       } else {
           typeStageSelect.value = 'stage d\'observation';
       }
       if(diplomeInput==='Master' || diplomeInput === 'Cycle d\'Ingénieur' || diplomeInput==='Mastère spécialisé' || diplomeInput==='Doctorat' ){
        typeF.value="EI";
       }else if(diplomeInput==='Licence' || diplomeInput==='Licence professionnelle' || diplomeInput==='Licence fondamentale' || diplomeInput === 'DUT' || diplomeInput === 'BTS'){
        typeF.value="EST+FAC+BTS";
       }
       if(Etab.value === 'IMM' || Etab.value === 'IMT'){
        typeF.value="IMM+IMT";
       }else if(Etab.value === 'ISTA' || Etab.value === 'ISMTRL' || Etab.value === 'EMVIFMTP' || Etab.value === 'ITA' || Etab.value === 'ISTAMH' || Etab.value === 'ISTA NTIC'){
        typeF.value="OFPPT";
       }
   }

   document.getElementById('diplome').addEventListener('change', updateTypeStage);
   document.getElementById('niveau').addEventListener('change', updateTypeStage);
   updateTypeStage(); // Call the function on page load
</script>

<script>
    function updateTypeF() {
       var diplomeInput = document.getElementById('diplome').value;
       var typeF = document.getElementById('type_formation');
       var Etab = document.getElementById('etablissement');

       if(diplomeInput==='Master' || diplomeInput === 'Cycle d\'Ingénieur' || diplomeInput==='Mastère spécialisé' || diplomeInput==='Doctorat' ){
        typeF.value="EI";
       }else if(diplomeInput==='Licence' || diplomeInput==='Licence professionnelle' || diplomeInput==='Licence fondamentale' || diplomeInput === 'DUT' || diplomeInput === 'BTS'){
        typeF.value="EST+FAC+BTS";
       }
       if(Etab.value === 'IMM' || Etab.value === 'IMT'){
        typeF.value="IMM+IMT";
       }else if(Etab.value === 'ISTA' || Etab.value === 'ISMTRL' || Etab.value === 'ISTA IE' || Etab.value === 'ISTA GM' || Etab.value === 'EMVIFMTP' || Etab.value === 'ITA' || Etab.value === 'ISTAMH' || Etab.value === 'ISTA NTIC'){
        typeF.value="OFPPT";
       }else if(Etab.value === 'IIPM' || Etab.value === 'SAGI'){
        typeF.value="Autres";
       }
   }

   document.getElementById('diplome').addEventListener('change', updateTypeF);
   document.getElementById('etablissement').addEventListener('change', updateTypeF);
   updateTypeF();
</script>

</script>




@endsection
