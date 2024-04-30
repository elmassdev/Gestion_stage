@extends('layouts.app')
@section('content')


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

<div class="container">
    <div class="row">
        <div class="col">
            <div class="container card pt-2">
                <div class="card-header"> Modifier les informations de <b>{{$stagiaire->civilite}} {{$stagiaire->nom}}</b> </div>
                <div class="row  card-body">
                  <div class="col border border-solid rounded mx-1 py-2">
                    <form method="POST" action="/stagiaires/{{$stagiaire->id}}/modification" enctype="multipart/form-data" onsubmit="return validateDates()">
                        @csrf
                        @method('PUT')
                        <script>
                            function validateDates() {
                                const holidays = [];
                                const year = new Date().getFullYear();
                                // New Year
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

                                // Check if either date is not a valid date
                                if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                                    alert("Merci d'entrer des dates valides.");
                                    return false;
                                }

                                if (startDate.getTime() >= endDate.getTime()) {
                                    alert("La date de début doit être antérieure à la date de fin.");
                                    return false;
                                }
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
                        <div class="row mb-3">
                            <label for="code" class="col-md-3 col-form-label text-md-left"> Code Stagiaire </label>
                            <div class="col-md-8">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror"   name="code" value="{{ $stagiaire->code }}"  required autocomplete="code"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"   autofocus>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_demande" class="col-md-3 col-form-label text-md-left"> Date demande</label>
                            <div class="col-md-8">
                                <input id="date_demande" type="date" value = "{{$stagiaire->date_demande}}" class="form-control datepicker  @error('date_demande') is-invalid @enderror"   name="date_demande" value="{{ old('date_demande') }}" pattern="dd/mm/yyyy"  required autocomplete="date_demande" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>
                                @error('date_demande')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="site" class="col-md-3 col-form-label text-md-left"> site de stage</label>

                            <div class="col-md-8">

                                <select id="site" type="text"   class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
                                    <option value="{{$stagiaire->site}}" selected>{{$stagiaire->site}}</option>
                                    <option value="Benguerir">Benguerir</option>
                                    <option value="Youssoufia"> Youssoufia</option>
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
                            <div class="col-md-8 row">
                                <div class="col-md-7">
                                    <input type="file" name="photo" accept="image/gif, image/jpeg, image/png" id="photo">
                                    @if($stagiaire->photo)
                                    <img src="{{ asset('storage/images/profile/'.$stagiaire->photo) }}" alt="Profile Picture" style="max-width: 200px; max-height: 200px;">
                                    @else
                                    <p>No profile picture available.</p>
                                    @endif
                                </div>
                                @if(!($stagiaire->photo === 'default_m.jpg') && !($stagiaire->photo === 'default_f.png'))
                                    <div class="col-md-5">
                                        <label for="deletePhoto" class="col-md-7 col-form-label text-md-left">{{ __('Supprimer la photo?') }}</label>
                                        <input type="checkbox" name="deletePhoto" id="deletePhoto" value="1">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="civilite" class="col-md-3 col-form-label text-md-left"> Titre de civilité</label>

                            <div class="col-md-8">
                                <select id="civilite" type="text" class="form-control @error('civilite') is-invalid @enderror" name="civilite" required autocomplete="civilite">
                                    <option value="{{$stagiaire->civilite}}" selected>{{$stagiaire->civilite}}</option>
                                    <option value="M." >Monsieur</option>
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
                                <input id="prenom" type="text" value="{{ $stagiaire->prenom }}" class="form-control @error('prenom') is-invalid @enderror"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="prenom"   required autocomplete="prenom"  autofocus>

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
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $stagiaire->nom }}" oninput="this.value = this.value.toUpperCase()" required autocomplete="nom"  autofocus>

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
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ $stagiaire->cin }}" oninput="this.value = this.value.toUpperCase()" required autocomplete="cin" autofocus>

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-3 col-form-label text-md-left">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $stagiaire->phone }}"  autocomplete="phone" placeholder="ex: +212662077439" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $stagiaire->email }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="row mb-3">
                            <label for="niveau" class="col-md-3 col-form-label text-md-left"> Niveau</label>
                            <div class="col-md-8">
                                <select id="niveau" type="text" class="form-control @error('niveau') is-invalid @enderror" name="niveau"  autocomplete="niveau">
                                    <option value="{{$stagiaire->niveau}}" selected>{{$stagiaire->niveau}}</option>
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
                        </div> --}}

                        <div class="row mb-3">
                            <label for="niveau" class="col-md-3 col-form-label text-md-left">Niveau</label>
                            <div class="col-md-8">
                                <select id="niveau" type="text" class="form-control @error('niveau') is-invalid @enderror" name="niveau" autocomplete="niveau">
                                    <option value="1ère année">1ère année</option>
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


                        <script>
                            // Retrieve the old value from PHP and set it as the selected option in the dropdown
                            var oldNiveau = "{{ $stagiaire->niveau }}";
                            var selectElement = document.getElementById('niveau');
                            for (var i = 0; i < selectElement.options.length; i++) {
                                if (selectElement.options[i].value === oldNiveau) {
                                    selectElement.options[i].selected = true;
                                    break;
                                }
                            }
                        </script>



                        <div class="row mb-3">
                            <label for="diplome" class="col-md-3 col-form-label text-md-left"> Diplome</label>
                            <div class="col-md-8">
                                <select id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome"  autocomplete="diplome">
                                    <option selected value="{{$stagiaire->diplome}}" selected>{{$stagiaire->diplome}}</option>
                                    <option value=""></option>
                                    <option value="Qualification Professionnelle">Qualification Professionnelle</option>
                                    <option value="Technicien">Technicien</option>
                                    <option value="Technicien spécialisé">Technicien spécialisé</option>
                                    <option value="Technicien supérieur">Technicien supérieur</option>
                                    <option value="DUT">DUT</option>
                                    <option value="BTS">BTS</option>
                                    <option value="Licence fondamentale">Licence fondamentale</option>
                                    <option value="Licence professionnelle">Licence professionnelle</option>
                                    <option value="Licence sciences et techniques">Licence sciences et techniques</option>
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
                    </div>



                    {{-- < class="col border border-solid rounded  mx-1 py-2">
                        <div class="row mb-3">
                            <label for="filiere" class="col-md-3 col-form-label text-md-left"> Filiere</label>
                            <div class="col-md-8">
                                <select id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" required autocomplete="filiere">
                                <option value="{{$stagiaire->filiere}}" selected >{{$stagiaire->filiere}}</option>
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
                        </div> --}}

                        <div class="col border border-solid rounded mx-1 py-2">
                            <div class="row mb-3">
                                <label for="filiere" class="col-md-3 col-form-label text-md-left">Filiere</label>
                                <div class="col-md-8">
                                    <select id="filiere" class="form-control @error('filiere') is-invalid @enderror" name="filiere" required autocomplete="filiere">
                                        <option value=""></option>
                                        @foreach($filieres as $filiere)
                                            <option value="{{ $filiere->filiere }}" {{ old('filiere', $stagiaire->filiere) == $filiere->filiere ? 'selected' : '' }}>
                                                {{ $filiere->filiere }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('filiere')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        {{-- <div class="row mb-3">
                            <label for="etablissement" class="col-md-3 col-form-label text-md-left"> Etablissement</label>
                            <div class="col-md-8">
                                <select id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" required autocomplete="etablissement">
                                <option  value="{{ $stagiaire->etablissement }}" selected >{{ $stagiaire->etablissement }}</option>
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
                        </div> --}}

                        <div class="row mb-3">
                            <label for="etablissement" class="col-md-3 col-form-label text-md-left">Etablissement</label>
                            <div class="col-md-8">
                                <select id="etablissement" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" required autocomplete="etablissement">
                                    <option value=""></option>
                                    @foreach($etablissements as $etab)
                                        <option value="{{ $etab->sigle_etab }}" {{ old('etablissement', $stagiaire->etablissement) == $etab->sigle_etab ? 'selected' : '' }}>
                                            {{ $etab->sigle_etab }} - {{ $etab->Etab }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('etablissement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="row mb-3">
                            <label for="ville" class="col-md-3 col-form-label text-md-left"> Ville </label>
                            <div class="col-md-8">
                                <select id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville"  autocomplete="ville">
                                    <option value="{{$stagiaire->ville}}" selected>{{$stagiaire->ville}}</option>
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


                    {{--
                        <div class="row mb-3">
                            <label for="encadrant" class="col-md-3 col-form-label text-md-left"> Encadrant</label>
                            <div class="col-md-8">
                                <select id="encadrant" type="text" class="form-control @error('encadrant') is-invalid @enderror" name="encadrant" required autocomplete="encadrant">
                                <option value="{{$encadr->id}}" selected >{{$encadr->nom}}  {{ $encadr->prenom}}</option>
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
                                <select id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" required autocomplete="service">
                                <option  value="{{$serv->id}}" selected >{{$serv->sigle_service}}</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id}}">{{$service->sigle_service}} - {{ $service->libelle}}</option>
                                @endforeach
                            </select>
                                @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="ville" class="col-md-3 col-form-label text-md-left">Ville</label>
                            <div class="col-md-8">
                                <select id="ville" class="form-control @error('ville') is-invalid @enderror" name="ville" autocomplete="ville">
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->ville }}" {{ old('ville', $stagiaire->ville) == $ville->ville ? 'selected' : '' }}>
                                            {{ $ville->ville }}
                                        </option>
                                    @endforeach
                                </select>
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
                                <select id="type_stage" type="text" class="form-control @error('type_stage') is-invalid @enderror" name="type_stage"  autocomplete="type_stage">
                                    <option value="{{$stagiaire->type_stage}}" selected>{{$stagiaire->type_stage}}</option>
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
                                <select id="type_formation" type="text" class="form-control @error('type_formation') is-invalid @enderror" name="type_formation"  autocomplete="type_formation">
                                    <option value="{{$stagiaire->type_formation}}">{{$stagiaire->type_formation}}</option>
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

                        {{-- <div class="row mb-3">
                            <label for="type_stage" class="col-md-3 col-form-label text-md-left">Type Stage</label>
                            <div class="col-md-8">
                                <select id="type_stage" class="form-control @error('type_stage') is-invalid @enderror" name="type_stage" autocomplete="type_stage">
                                    @foreach(['stage ouvrier', 'stage d\'application', 'stage d\'observation', 'stage projet fin d\'études'] as $type)
                                        <option value="{{ $type }}" {{ old('type_stage', $stagiaire->type_stage) == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_stage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type_formation" class="col-md-3 col-form-label text-md-left">Type Formation</label>
                            <div class="col-md-8">
                                <select id="type_formation" class="form-control @error('type_formation') is-invalid @enderror" name="type_formation" autocomplete="type_formation">
                                    @foreach(['EI', 'OFPPT', 'EST+FAC+BTS', 'Cycle Préparatoire (CI)', 'IMM+IMT', 'Autres'] as $type)
                                        <option value="{{ $type }}" {{ old('type_formation', $stagiaire->type_formation) == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_formation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="encadrant" class="col-md-3 col-form-label text-md-left">Encadrant</label>
                            <div class="col-md-8">
                                <select id="encadrant" class="form-control @error('encadrant') is-invalid @enderror" name="encadrant" required autocomplete="encadrant">
                                    <option value="">Select Encadrant</option>
                                    @foreach($encadrants as $encadrant)
                                        <option value="{{ $encadrant->id }}" {{ old('encadrant', $encadr->id) == $encadrant->id ? 'selected' : '' }}>
                                            {{ $encadrant->nom }} {{ $encadrant->prenom }}
                                        </option>
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
                            <label for="service" class="col-md-3 col-form-label text-md-left">Service d'accueil</label>
                            <div class="col-md-8">
                                <select id="service" class="form-control @error('service') is-invalid @enderror" name="service" required autocomplete="service">
                                    <option value="">Select Service d'accueil</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service', $serv->id) == $service->id ? 'selected' : '' }}>
                                            {{ $service->sigle_service }} - {{ $service->libelle }}
                                        </option>
                                    @endforeach
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
                                <input id="date_debut" type="date"  class="form-control datepicker  @error('date_debut') is-invalid @enderror"   name="date_debut" value="{{$stagiaire->date_debut}}" pattern="dd/mm/yyyy"  required autocomplete="date_debut" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>
                                @error('date_debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_fin" class="col-md-3 col-form-label text-md-left"> Date de fin</label>
                            <div class="col-md-8">
                                <input id="date_fin" type="date"  class="form-control datepicker  @error('date_fin') is-invalid @enderror"   name="date_fin" value="{{$stagiaire->date_fin}}" pattern="dd/mm/yyyy"  required autocomplete="date_fin" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>
                                @error('date_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sujet" class="col-md-3 col-form-label text-md-left">{{ __('Sujet') }}</label>
                            <div class="col-md-8">
                                <textarea id="sujet" class="form-control @error('sujet') is-invalid @enderror" name="sujet" value="{{ $stagiaire->sujet}}"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="sujet"  autofocus oninput="validateDates()" >{{ $stagiaire->sujet}}</textarea>
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
                                <textarea id="observation" class="form-control @error('observation') is-invalid @enderror" name="observation" value="{{ $stagiaire->observation}}"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="observation"  autofocus >{{ $stagiaire->observation}}</textarea>
                                @error('observation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="absence" class="col-md-3 col-form-label text-md-left">{{ __('Absence') }}</label>
                            <div class="col-md-8">
                                <input id="absence" class="form-control @error('absence') is-invalid @enderror" name="absence" value="{{$stagiaire->absence}}"    autocomplete="absence"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" autofocus />
                                @error('absence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 display-inline">
                            <div class="col-md-4">
                                <label for="remunere" class="col-form-label text-md-left">{{ __('Stage remuneré') }}</label>
                            <input type="checkbox" name="remunere" id="remunere" value="true" {{ old('remunere', $stagiaire->remunere) ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-4">
                                <label for="EI" class=" col-form-label text-md-left">{{ __('Elève Ingénieur') }}</label>
                            <input type="checkbox" name="EI" id="EI" value="true" {{ old('EI', $stagiaire->EI) ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-4">
                                <label for="annule" class="col-form-label text-md-left">{{ __('Annulé') }}</label>
                            <input type="checkbox" name="annule" id="annule" value="true" {{ old('annule', $stagiaire->annule) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" oninput="validateDates()">
                                    {{ __('Enregistrer la modifcation') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row pt-1 ">
                <a href="/filieres/create" target="/_blank"  class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter une filière</a>
                <a href="/etablissements/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un établissement</a>
                <a href="/services/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un service</a>
                <a href="/encadrants/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter un encadrant </a>
                <a href="/villes/create" target="/_blank" class=" btn btn-outline-success col-md-2  mx-auto  rounded-pill ">Ajouter une ville</a>
            </div>
        </div>
    </div>
</div>



<script>
    var EI = document.getElementById('EI');

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
        var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENCG','ISCAE','EMINES','FS','FSJES','AIAC']
        var isMasterOrCycle = diplome === 'Cycle d\'Ingénieur' || diplome === 'Master' || diplome === 'Mastère spécialisé' || diplome ==='Doctorat';
        document.getElementById('EI').checked = isMasterOrCycle;
        var isRemunere = ((isMasterOrCycle && ListEtab.includes(etab))|| etab ==='IMM'|| etab ==='IMT');
        document.getElementById('remunere').checked =isRemunere;
    });

    document.getElementById('etablissement').addEventListener('change', function(){
        var etab = this.value;
        var diplome = document.getElementById('diplome').value;
        var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENCG','ISCAE','EMINES','FS','FSJES','AIAC']
        var isMoCI = diplome === 'Cycle d\'Ingénieur' || diplome === 'Master' || diplome === 'Mastère spécialisé' || diplome ==='Doctorat';
        document.getElementById('EI').checked = isMoCI;
        var isRem = ( (isMoCI && ListEtab.includes(etab)) || etab ==='IMM'|| etab ==='IMT');
        document.getElementById('remunere').checked =isRem;
    });

</script>
@endsection
