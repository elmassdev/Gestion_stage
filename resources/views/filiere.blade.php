@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">{{ __('Ajouter une filière') }}</div>

                <div class="card-body">
                    <form method="POST" action="/filiere" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="filiere" class="col-md-3 col-form-label text-md-left" > Filière</label>

                            <div class="col-md-8">
                                <input id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror"   name="filiere" value="{{ old('filiere') }}"  required autocomplete="filiere" placeholder="filiere stagiaire" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('filiere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profil" class="col-md-3 col-form-label text-md-left" > Profil</label>

                            <div class="col-md-8">
                                <input id="profil" type="text" class="form-control @error('profil') is-invalid @enderror"   name="profil" value="{{ old('profil') }}"  required autocomplete="profil" placeholder="profil" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('profil')
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

                            {!!$msg!!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Rechercher une filiere') }}</div>
                <div class="card-body">
                    <form method="GET" action="/filiere" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > Filière à rechercher</label>
                            <div class="col-md-8">
                                <input id="search" type="text" class="form-control @error('search') is-invalid @enderror"   name="search" value="{{ old('search') }}"  required autocomplete="search" placeholder="search stagiaire" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>
                                @error('search')
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
                
                    filieres:
                    <ul>
                        @foreach ($results as $result)
                        <li>{{ $result->filiere }}</li>
                        @endforeach
                    </ul>            
            </div>           
        </div>
    </div>

    {{-- <div class="row ">        
        <div class="col-md-6 my-4">            
            <div class="card">
                <div class="card-header">{{ __('Modifier une ville') }}</div>
                <div class="card-body">
                    <form method="POST" action="/villes/modification" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="oldville" class="col-md-3 col-form-label text-md-left"> Liste des Ville </label>
                            <div class="col-md-8">
                                <select id="oldville" type="text" class="form-control @error('oldville') is-invalid @enderror" name="oldville"  autocomplete="oldville">
                                    <option selected hidden></option>
                                       @foreach($villes as $ville)
                                <option value="{{ $ville->ville }}">{{$ville->ville}}</option>
                                @endforeach  
                      
                                </select>                   

                                @error('oldville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        
{{-- 
                        <div class="row mb-3">
                            <label for="newville" class="col-md-3 col-form-label text-md-left" > Ville</label>

                            <div class="col-md-8">
                                <input id="newville" type="text" class="form-control @error('newville') is-invalid @enderror"   name="newville" value="{{ old('newville') }}"  required autocomplete="newville" placeholder="Entrer le nom de la ville à modifier" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('newville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profil" class="col-md-3 col-form-label text-md-left" > profil</label>

                            <div class="col-md-8">
                                <input id="profil" type="text" class="form-control @error('profil') is-invalid @enderror"   name="profil" value="{{ old('profil') }}"  required autocomplete="profil" placeholder="profil" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('profil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Modifier') }}
                                </button>
                            </div>

                            <div class="warning text-dark">{{$editmsg}}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>--}}
</div>

@endsection