@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
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
                            {!!$msg!!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Rechercher un service') }}</div>
                <div class="card-body">
                    <form method="GET" action="/service" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > services à rechercher</label>
                            <div class="col-md-8">
                                <input id="search" type="text" class="form-control @error('search') is-invalid @enderror"   name="search" value="{{ old('search') }}"  required autocomplete="search" placeholder="rechercher un service " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>
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
                        <table class="table table-striped table-responsive">
                            <th>sigle_service</th>
                            <th>service</th>
                            <th>site</th>
                            <tbody>  
                                @foreach ($results as $result)                             
                                <tr>                                   
                                    <td> <b>{{$result->sigle_service}}  </b> </td>
                                    <td>{{$result->libelle}}</td>  
                                    <td>{{$result->site}}</td>              
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
    </div>
</div>



@endsection