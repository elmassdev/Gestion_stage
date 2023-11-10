@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">{{ __('Ajouter une ville') }}</div>

                <div class="card-body">
                    <form method="POST" action="/villes" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="ville" class="col-md-3 col-form-label text-md-left" > Ville</label>

                            <div class="col-md-8">
                                <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror"   name="ville" value="{{ old('ville') }}"  required autocomplete="ville" placeholder="ville stagiaire" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pays" class="col-md-3 col-form-label text-md-left" > pays</label>

                            <div class="col-md-8">
                                <input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror"   name="pays" value="{{ old('pays') }}"  required autocomplete="pays" placeholder="Pays" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                @error('pays')
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
            {{-- Formulaire de modification --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Modifier une ville') }}</div>
                    <div class="card-body">
                <form method="GET" action="/villes" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="oldville" class="col-md-3 col-form-label text-md-left" > Ville</label>
    
                        <div class="col-md-8">
                            <input id="oldville" type="text" class="form-control @error('oldville') is-invalid @enderror"   name="oldville" value="{{ old('oldville') }}"  required autocomplete="oldville" placeholder="Entrer le nom de la ville à modifier" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>
    
                            @error('oldville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pays" class="col-md-3 col-form-label text-md-left" > pays</label>
    
                        <div class="col-md-8">
                            <input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror"   name="pays" value="{{ old('pays') }}"  required autocomplete="pays" placeholder="Pays" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>
    
                            @error('pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
<hr>
<div class="row mb-3">
    <label for="newville" class="col-md-3 col-form-label text-md-left" > Ville</label>

    <div class="col-md-8">
        <input id="newville" type="text" class="form-control @error('newville') is-invalid @enderror"   name="newville" value="{{ old('newville') }}"  required autocomplete="newville" placeholder="Entrer le nouveau nom de la ville " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

        @error('newville')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="newpays" class="col-md-3 col-form-label text-md-left" > newpays</label>

    <div class="col-md-8">
        <input id="newpays" type="text" class="form-control @error('newpays') is-invalid @enderror"   name="newpays" value="{{ old('newpays') }}"  required autocomplete="newpays" placeholder="newpays" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

        @error('newpays')
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Rechercher une ville') }}</div>
                <div class="card-body">
                    <form method="GET" action="/villes" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > Ville à rechercher</label>

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
                    Villes:
                    <ul>
                        @if(count($results)) 
                        @foreach ($results as $result)
                        <li>{{ $result->ville }}</li>
                        @endforeach
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


        
    
    </div>
</div>




 
                        
                    
   

@endsection