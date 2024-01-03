@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <b> {{ __('Ajouter un nouveau utilisateur') }}  </b> </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>
                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>
                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="site" class="col-md-4 col-form-label text-md-end"> Site</label>

                            <div class="col-md-6">
                                <select id="site" type="text"   class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
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
                            <label for="service" class="col-md-4 col-form-label text-md-end"> Service</label>
                            <div class="col-md-6">
                                <select id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" required autocomplete="service">
                                    <option value="" selected></option>
                                    @foreach($services as $s)
                                        <option value="{{ $s->id }}">{{ $s->sigle_service }} - {{ $s->libelle }}</option>
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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->check() && auth()->user()->hasRole('superadmin'))
    <div class="container mx-4 py-4">
        <div class="row justify-content-center py-4">
            <div class="col-md-9">
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/register"> Ajouter un utilisateur</a>
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-roles"> Gérer les roles</a>
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-permissions"> Gérer les Permissions</a>
            </div>
        </div>
    </div>
    @endif
</div>
<script>
    var FilSer = @json($services);
    document.getElementById('site').addEventListener('change', function() {
        site = this.value;
        var filtered_services = FilSer.filter(function(services) {
            return services.site === site;
        });
        var service_select = document.getElementById('service');
        service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
        filtered_services.forEach(function(services) {
            service_select.innerHTML += '<option value="' + services.id + '">' + services.sigle_service+' - '+services.libelle + '</option>';
        });
    });

</script>
@endsection
