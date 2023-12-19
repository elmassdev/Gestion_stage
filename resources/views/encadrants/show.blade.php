@extends('layouts.app')
@section('content')

<div class="container">
    <a href="/encadrants/create" class="btn btn-warning text-primary my-4 mx-4"><i class="fa fa-plus" aria-hidden="true"></i></a>
    <div class="row">
        {{-- the left part of the page --}}
        <div class="col-md-6">
            <div class="card p-1">
                <div class="row ">
                    <div class="row ">
                            <div class="col-md-8  position my-auto top-0 end-0">
                                <div class="allergy"><b>{{$encadrant->titre}} {{$encadrant->prenom}} {{$encadrant->nom}}</b></div>
                                <div class="allergy"><b>{{$encadrant->service}}</b></div>
                                <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:{{$encadrant->phone}}">{{$encadrant->phone}}</a> </div>
                                <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:{{$encadrant->email}}">{{$encadrant->email}}</a></div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="{{ URL::to( 'encadrants/' . $previous ) }}" class="btn btn-success "> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="{{ URL::to( 'encadrants/' . $next ) }}" class="btn btn-success text-light"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/encadrants/" class="btn btn-primary text-light"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/encadrants/{{$encadrant->id}}/modification"  class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td><form action="/encadrants/{{$encadrant->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

        </div>

        {{-- the right part of the page --}}
        <div class="col-md-6">
            <div class="card p-1">
                <div class=" card  p-1">
                    <div class="card-header">{{ __('Rechercher un encadrant') }}</div>
                    <div class=" card-body py-2">

                <form method="GET" action="/encadrants/{{$encadrant->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="column" class="col-md-6 col-form-label text-md-left"> Rechercher un encadrant:</label>

                        <div class="col-md-6">
                            <select id="column" type="text" class="form-control @error('column') is-invalid @enderror" name="column" required autocomplete="column">
                                <option value="nom" selected>Rechercher par nom</option>
                                <option value="prenom">Rechercher par prenom</option>
                                <option value="service">Rechercher service </option>
                        </select>
                            @error('column')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="term" class="col-md-6 col-form-label text-md-left">{{ __('Entrer votre recherche') }}</label>

                        <div class="col-md-6">
                            <input id="term" type="text" name="term" class="form-control @error('term') is-invalid @enderror"    value="{{ old('term') }}"  required autocomplete="term"  autofocus>

                            @error('term')
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
                    </div>
                </div>
                <div>
                    @if(count($results))
                    <table class="table table-striped col-md-12">
                        <th>Civilité</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Service</th>
                        <tbody>
                            @foreach ($results as $result)

                            <tr>
                                <td><a href="/encadrants/{{$result->id}}">{{$result->titre}}</a></td>
                                <td><a href="/encadrants/{{$result->id}}">{{$result->nom}}</a></td>
                                <td><a href="/encadrants/{{$result->id}}">{{$result->prenom}}</a></td>
                                <td><a href="/encadrants/{{$result->id}}">{{$result->service}}</a></td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $results->links() }}
                    @else
                    <p>
                        pas de résultats
                    </p>
                    @endif


                </div>


            </div>
        </div>
    </div>
</div>



@endsection
