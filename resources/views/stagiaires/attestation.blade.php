@extends('layouts.doc')
@section('content')

<style>
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 80px;
    }
    span{
        padding-left: 60px;
        padding-top: 100px;
    }
    p{
        margin-left: 30px;
        margin-right: 30px;
        line-height: 26pt;
    }

    .note{
        font-size: 14px;
        margin-top: 20px;
        margin-left: 5px;
        font-family: 'Roboto', sans-serif;
    }
</style>
<div class="note"> <small> <b> {{ $activeSignature->sigle }} - ES n° {{substr($stagiaire->code, -4);}}/{{substr($stagiaire->site,0,1)}}/{{substr($year,-2)}} </b> </small> </div>
@php
    \Carbon\Carbon::setLocale('fr');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
@endphp

    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

        <p> <span>{{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}}, @if(isset($stagiaire->cin) && !empty($stagiaire->cin))
            titulaire de la CIN n°: {{$stagiaire->cin}}@endif,
         </span> étudiant{{$stagiaire->genre}} {{$stagiaire->article}} {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) de {{$stagiaire->ville}},
        Specialité:{{$stagiaire->filiere}} a effectué un {{$stagiaire->type_stage}} au sein de la {{$stagiaire->direction}} et ce pendant la période du @php echo $dd_long  @endphp au {{ $fin_long }} (du {{$dd_short}} au {{$fin_short}})     <br>   </p>
        <p>
            <span>Faite</span> à la demande de l'intéressé{{$stagiaire->genre}} pour servir et valoir ce que de droit.

        </p>

        <style>
            .sign{
                text-align: left;
                margin-top: 70px;
                margin-left: 370px;
                line-height: 18pt;
            }
        </style>

        <div class="sign">
            {{$stagiaire->site}}, le {{$date_Att}} <br>
            {{ $activeSignature->sign2 }}  <br>
            {{ $activeSignature->sign1 }}

        </div>









@endsection
