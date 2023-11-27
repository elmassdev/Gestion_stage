@extends('layouts.app')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
    }

    #container {
        display: flex;
        height: 100vh;
    }

    #left {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
    }

    #right {
        flex-shrink: 0;
        width: 300px;
        height: 100%;
        position: fixed;
        top: 5;
        right: 0;
        overflow-y: auto;
    }

    @media (max-width: 767px) {
        #container {
            flex-direction: column;
        }

        #right {
            position: relative;
            width: 100%;
            top: auto;
            bottom: 0;
        }
    }
</style>

<div class="container col-md-12" id="container">

    <div class="row col-md-12">
        <div class="col-md-9" style="overflow-y: scroll;" id="left">

            <div class="card">
                <div class="card-header">{{ __('Ajouter un stagiaire') }}</div>

                <div class="card-body">
                    <form method="POST" action="/stagiaires/create" enctype="multipart/form-data" onsubmit="return validateDates()">
                        @csrf
                        {{-- Verification date debut date fin  --}}
                        <script>
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
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //1er Mai
                                holidays.push(`${year}-05-01`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //30 juillet
                                holidays.push(`${year}-07-30`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //14 Aout
                                holidays.push(`${year}-08-14`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }

                                    //20 aout
                                holidays.push(`${year}-08-20`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //21 aout
                                holidays.push(`${year}-08-21`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }

                                //almassira
                                holidays.push(`${year}-11-06`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //independance
                                holidays.push(`${year}-11-18`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
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
                                if ( startDate.getTime() < today+1 ) {
                                    alert("La date de début ne peut pas être antérieure à aujourd'hui.");
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
                            var tab = @json($services);
                        </script>

                        <div class="row mb-3">
                            <label for="code" class="col-md-3 col-form-label text-md-left" > Code Stagiaire</label>

                            <div class="col-md-8">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror"   name="code" value="{{ old('code') }}"  required autocomplete="code" placeholder="code stagiare" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"   autofocus>

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
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" required autocomplete="nom"  autofocus>

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
                            <label for="phone" class="col-md-3 col-form-label text-md-left">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" placeholder="ex: +212662077439" autofocus>

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


                        <div class="row mb-3">
                            <label for="diplome" class="col-md-3 col-form-label text-md-left"> Diplôme</label>

                            <div class="col-md-8">
                                <select id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome"  autocomplete="diplome">
                                    <option value="" disabled>----Diplôme----</option>
                                    <option value="Qualification Professionnelle">Qualification Professionnelle</option>
                                    <option value="Technicien">Technicien</option>
                                    <option value="Technicien spécialisé">Technicien spécialisé</option>
                                    <option value="DUT">DUT</option>
                                    <option value="DUT">BTS</option>
                                    <option value="Licence fondamentale">Licence fondamentale</option>
                                    <option value="Licence professionnelle">Licence professionnelle</option>
                                    <option value="Cycle d'ingénieur">Cycle d'ingénieur</option>
                                    <option value="Master">Master</option>
                                    <option value="Master spécialisé">Master spécialisé</option>
                                    <option value="Doctorat">Doctorat</option>
                                    <option value=" ">Master ENCG</option>
                            </select>
                                @error('diplome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="filiere" class="col-md-3 col-form-label text-md-left"> Filiere</label>
                            <div class="col-md-8">
                                <select id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" required autocomplete="filiere">
                                <option selected disabled> ----- </option>
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
                                <option selected disabled></option>
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

                        <div class="row mb-3">
                            <label for="ville" class="col-md-3 col-form-label text-md-left"> Ville </label>
                            <div class="col-md-8">
                                <select id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville"  autocomplete="ville">
                                    <option selected hidden></option>
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
                        </div>

                        <div class="row mb-3">
                            <label for="type_stage" class="col-md-3 col-form-label text-md-left"> Type Stage</label>

                            <div class="col-md-8">
                                <select id="type_stage" type="text" class="form-control @error('type_stage') is-invalid @enderror" name="type_stage"  autocomplete="type_stage">
                                    <option value="stage ouvrier" selected>stage ouvrier</option>
                                    <option value="stage d'application">stage d'application</option>
                                    <option value="stage d'observation">stage d'observation</option>
                                    <option value="stage PFE">Stage PFE</option>
                            </select>
                                @error('type_stage')
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
                                    {{-- <option selected disabled>Service</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->sigle_service}}">{{$service->sigle_service}} - {{ $service->libelle}}</option>
                                        @endforeach    --}}

                            </select>
                                @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="encadrant" class="col-md-3 col-form-label text-md-left"> Encadrant</label>
                            <div class="col-md-8">
                                <select id="encadrant" type="text" class="form-control @error('encadrant') is-invalid @enderror" name="encadrant" required autocomplete="encadrant">
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
                            <label for="date_debut" class="col-md-3 col-form-label text-md-left"> Date de début</label>

                            <div class="col-md-8">
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

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="remunere" class="col-md-4 col-form-label text-md-left">{{ __('Stage remuneré') }}</label>
                            <input type="checkbox" name="remunere" id="remunere" value="true">
                            </div>
                            <div class="col-md-6">
                                <label for="EI" class="col-md-4 col-form-label text-md-left">{{ __('Elève Ingénieur') }}</label>
                            <input type="checkbox" name="EI" id="EI" value="true">
                            </div>

                        </div>

                        {{-- filter services by site;  Made By ELHASSOUNI --}}

                        <script>
                        window.onload = function(){
                                var site =document.getElementById('site').value;
                                var filtered_services = tab.filter(function(services) {
                                    return services.site === site;
                                });
                                //alert(JSON.stringify(filtered_services));

                                var service_select = document.getElementById('service');
                                service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
                                filtered_services.forEach(function(services) {
                                    service_select.innerHTML += '<option value="' + services.sigle_service + '">' + services.sigle_service+' - '+services.libelle + '</option>';
                                });
                            }
                            document.getElementById('site').addEventListener('change', function() {
                                site = this.value;
                                var filtered_services = tab.filter(function(services) {
                                    return services.site === site;
                                });
                                //alert(JSON.stringify(filtered_services));

                                var service_select = document.getElementById('service');
                                service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
                                filtered_services.forEach(function(services) {
                                    service_select.innerHTML += '<option value="' + services.sigle_service + '">' + services.sigle_service+' - '+services.libelle + '</option>';
                                });
                            });
                        </script>







                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="validateDates()">
                                    {{ __('Enregisterer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 float-right" style="overflow-y: fixed;" id="right">
            <div class="card  col-md-12">
                <div class="card-header bg-primary">{{ __('Autre informations à ajouter:') }}</div>
                <table>
                    <tr>
                        <a href="/filiere" target="/blank"  class=" col-md-11 mx-auto my-2 btn btn-primary">Ajouter une filière</a>
                        <a href="/etablissement" target="/blank" class=" col-md-11 mx-auto my-2 btn btn-primary">Ajouter un établissement</a>
                        <a href="/services" target="/blank" class=" col-md-11 mx-auto my-2 btn btn-primary">Ajouter un service</a>
                        <a href="/encadrants/create" target="/blank" class=" col-md-11 mx-auto my-2 btn btn-primary">Ajouter un encadrant </a>
                        <a href="/villes" target="/blank" class=" col-md-11 mx-auto my-2 btn btn-primary">Ajouter une ville</a>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
