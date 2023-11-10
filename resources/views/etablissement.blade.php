@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">{{ __('Ajouter un établissement') }}</div>

                <div class="card-body">
                    <form method="POST" action="/etablissement" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="sigle_etab" class="col-md-3 col-form-label text-md-left" > sigle</label>

                            <div class="col-md-8">
                                <input id="sigle_etab" type="text" class="form-control @error('sigle_etab') is-invalid @enderror"   name="sigle_etab" value="{{ old('sigle_etab') }}"  required autocomplete="sigle_etab" placeholder="sigle établissement " oninput="this.value = this.value.toUpperCase()"   autofocus>

                                @error('sigle_etab')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="etab" class="col-md-3 col-form-label text-md-left" > Libellé </label>

                            <div class="col-md-8">
                                <input id="etab" type="text" class="form-control @error('etab') is-invalid @enderror"   name="etab" value="{{ old('etab') }}"  required autocomplete="etab" placeholder="Entrer le libellé d'établissement" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('etab')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Statut" class="col-md-3 col-form-label text-md-left">Statut</label>

                            <div class="col-md-8">
                                <select id="statut" type="text" class="form-control @error('statut') is-invalid @enderror" name="statut"  autocomplete="statut">
                                    <option value="Etatique" >Etatique</option>
                                    <option value="Privé">Privé</option>
                                    <option value="Etranger">Etranger</option>
                                </select>
                                @error('Statut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-3 col-form-label text-md-left">Type</label>

                            <div class="col-md-8">
                                <select id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type"  autocomplete="type">
                                    <option value="Ecoles Supérieures" >ECOLES SUPERIEURES</option>
                                    <option value="OFPPT">OFPPT</option>
                                    <option value="Faculté">Faculté</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article" class="col-md-3 col-form-label text-md-left">Article</label>

                            <div class="col-md-8">
                                <select id="article" type="text" class="form-control @error('article') is-invalid @enderror" name="article"  autocomplete="article">
                                    <option value="à la">à la</option>
                                    <option value="à">à</option>
                                    <option value="au">au</option>
                                    <option value="à l'">à l'</option>
                                </select>
                                @error('article')
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
                <div class="card-header">{{ __('Rechercher un établissement') }}</div>
                <div class="card-body">
                    <form method="GET" action="/etablissement" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > Sigle</label>

                        <div class="col-md-8">
                            <input id="search" type="text" class="form-control @error('search') is-invalid @enderror"   name="search" value="{{ old('search') }}"  required autocomplete="search" placeholder="ٌRechercher par sigle d'établissement" oninput="this.value = this.value.toUpperCase()"    autofocus>

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
                    <ul>
                        @if(count($results)) 
                        <table class=" table table-striped table-responsive mx-0">
                            <th>sigle_etab</th>
                            <th>etablissement</th>
                            <tbody>
                                @foreach ($results as $result)
                                <tr>
                                    <td> <b>{{$result->sigle_etab}}  </b> </td>
                                    <td>{{$result->Etab}}</td>                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 
                        {{ $results->links() }} 
                        @else
                       <p class="bg-warning text-danger">
                           pas de résultats
                       </p>
                       @endif                     
                        
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