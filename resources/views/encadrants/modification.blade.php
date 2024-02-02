@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier les informations de {{$encadrant->titre}} {{$encadrant->nom}}</div>


                <div class="card-body">
                    <form method="POST" action="/encadrants/{{$encadrant->id}}/modification" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="titre" class="col-md-3 col-form-label text-md-left"> Titre de civilité</label>

                            <div class="col-md-8">
                                <select id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" required autocomplete="titre">
                                    <option value="{{$encadrant->titre}}" selected>{{$encadrant->titre}}</option>
                                    <option value="M." >Monsieur</option>
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
                                <input id="prenom" type="text" value="{{ $encadrant->prenom }}" class="form-control @error('prenom') is-invalid @enderror"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="prenom"   required autocomplete="prenom"  autofocus>

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
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $encadrant->nom }}" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" required autocomplete="nom"  autofocus>

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
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $encadrant->phone }}"  autocomplete="phone" placeholder="ex: +212662077439" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $encadrant->email }}"  autocomplete="email">

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
                                <option  value="{{$encadrant->service}}" selected >{{$encadrant->service}}</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->sigle_service}} - {{ $service->libelle}}</option>
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
                                    {{ __('Enregisterer la modifcation') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
