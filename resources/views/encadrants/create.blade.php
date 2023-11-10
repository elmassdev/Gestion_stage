@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row ">        
        <div class="col-md-9" style="overflow-y: scroll;">
            
            <div class="card">
                <div class="card-header">{{ __('Ajouter un encadrant') }}</div>

                <div class="card-body">
                    <form method="POST" action="/encadrants/create" enctype="multipart/form-data">
                        @csrf

                        
                        <div class="row mb-3">
                            <label for="titre" class="col-md-3 col-form-label text-md-left"> Titre de civilité</label>

                            <div class="col-md-8">
                                <select id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" required autocomplete="titre">
                                    <option value="M." selected>Monsieur</option>
                                    <option value="Mlle">Mademoiselle</option>
                                    <option value="Mme">Madame</option>                              
                            </select>
                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-3 col-form-label text-md-left">{{ __('prenom') }}</label>

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
                            <label for="nom" class="col-md-3 col-form-label text-md-left">{{ __('nom') }}</label>

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
                            <label for="phone" class="col-md-3 col-form-label text-md-left">{{ __('phone') }}</label>

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
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('email') }}</label>

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
                            <label for="service" class="col-md-3 col-form-label text-md-left"> Service d'accueil</label>
                            <div class="col-md-8">
                                <select id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" required autocomplete="service">
                                <option selected hidden></option>
                                @foreach($services as $service)
                                <option value="{{ $service->sigle_service}}">{{$service->sigle_service}} - {{ $service->libelle}}</option>
                                @endforeach                         
                            </select>
                                @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregisterer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 float-right" style="top: 5; right: 0;">
            <div class="card bg-secondary">
                <div class="card-header bg-warning">{{ __('Autre informations à ajouter:') }}</div>
                <table>
                    <tr>
                        <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Liste des encadrants</a>
                        <a href="/encadrants/show" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Rechercher un encadrant</a>
                        <a href="/service" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                        <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire </a>
                        <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                    </tr>
                </table>

            </div>
            

            

        </div>
    </div>
</div>
@endsection
