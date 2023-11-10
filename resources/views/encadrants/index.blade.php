@extends('layouts.app')
@section('content')
@if(count($encadrants))
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>titre</th>
            <th>Prenom</th>
            <th>Nom</th>  
            <th>phone</th>
            <th>email</th>              
            <th>Service</th>          
        </tr>
    </thead>
    <tbody>@foreach($encadrants as $encadrant)
    <tr class=" table table-row my-auto h-10 small">
                        <td>{{ $encadrant->titre}}</td>
                        <td>{{ $encadrant->prenom}}</td>
                        <td>{{ $encadrant->nom}}</td>                                
                        <td>{{ $encadrant->phone}}</td>
                        <td>{{ $encadrant->email}}</td>                                
                        <td>{{ $encadrant->service}}</td>
                        <td ><a  href="/encadrants/{{$encadrant->id}}/modification"> <i class="fa fa-edit text-warning"></i></a></td>
                        <td > 
                        <form action="/encadrants/{{$encadrant->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="fa fa-trash text-danger"></button>
                        </form>
                        </td>
                        <td> <a  href="/encadrants/{{$encadrant->id}}"><i class="fa fa-print text-primary"></i></a></td>                           
                    </tr>
@endforeach

    </tbody>
</table>
{{ $encadrants->links() }}

@else
<p> Pas de encadrants</p>
@endif


@endsection