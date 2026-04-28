
@extends('layouts.app')

@section('content')
<div class="row py-4 px-4">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">{{ __('Ajouter un service') }}</div>

            <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sigle_service">Sigle Service:</label>
                <input type="text" name="sigle_service" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="libelle">Libelle:</label>
                <input type="text" name="libelle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="entite">Entite:</label>
                <input type="text" name="entite" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="site">Site:</label>
                <input type="text" name="site" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="direction">Direction:</label>
                <input type="text" name="direction" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="secretariat">Secretariat:</label>
                <input type="text" name="secretariat" class="form-control" >
            </div>

            <div class="form-group">
                <label for="EPI">EPI:</label>
                <input type="checkbox" name="EPI" class="form-check-input" >
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
            </div>
        </div>
    </div>

    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card ">
            <div class="card-header">{{ __('Autre informations à ajouter:') }}</div>
            <table>
                <tr>
                    <a href="/services" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Liste des services</a>
                    <a href="/services/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un service</a>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Rechercher un encadrant</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un stagiaire </a>
                    <a href="/villes/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>

</div>

</div>


    {{-- <div class="col-md-6">

        <div class="card">
            <div class="card-header">{{ __('Ajouter un service') }}</div>

            <div class="card-body">
                <form method="POST" action="/service" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="sigle_service" class="col-md-3 col-form-label text-md-left" > sigle service</label>

                        <div class="col-md-8">
                            <input id="sigle_service" type="text" class="form-control @error('sigle_service') is-invalid @enderror"   name="sigle_service" value="{{ old('sigle_service') }}"  required autocomplete="sigle_service" placeholder="sigle_service " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                            @error('sigle_service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="libelle" class="col-md-3 col-form-label text-md-left" >Service</label>

                        <div class="col-md-8">
                            <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror"   name="libelle" value="{{ old('libelle') }}"  required autocomplete="libelle" placeholder="libelle " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                            @error('libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="entite" class="col-md-3 col-form-label text-md-left" > sigle entité</label>

                        <div class="col-md-8">
                            <input id="entite" type="text" class="form-control @error('entite') is-invalid @enderror"   name="entite" value="{{ old('entite') }}"  required autocomplete="entite" placeholder="entite " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                            @error('entite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="site" class="col-md-3 col-form-label text-md-left"> Site </label>

                        <div class="col-md-8">

                            <select id="site" type="text"   class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
                                <option value="Benguerir">Benguerir</option>
                                <option value="Youssoufia"> Youssoufia</option>
                                <option value="Youssoufia"> Safi</option>
                                <option value="Benguerir">Jorf Lasfar</option>
                                <option value="Youssoufia"> Khouribga</option>
                        </select>
                            @error('site')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="direction" class="col-md-3 col-form-label text-md-left"> Direction</label>

                        <div class="col-md-8">

                            <select id="direction" type="text"   class="form-control  @error('direction') is-invalid @enderror" name="direction"  autocomplete="direction">
                                <option value="Benguerir">Direction du Site Gantour</option>
                                <option value="Youssoufia"> Direction Industrielle Achats</option>
                            </select>
                            @error('direction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="EPI" class="col-md-6 col-form-label text-md-left">EPI est nécéssaire?</label>
                            <input type="checkbox" name="EPI" id="EPI" value="true">
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
    </div> --}}
@endsection
