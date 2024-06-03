@extends('layouts.doc')
@section('content')

<style>


    .Att_title{
        text-align: center;
        padding-bottom: 20px;
        margin-top: 80px;
        font-family: 'Poppins';
    }
    span{
        padding-left: 60px;
        padding-top: 100px;
    }
    p{
        margin-left: 30px;
        margin-right: 30px;
        line-height: 16pt;
        font-family: 'Poppins';
    }
    .sign{
        text-align: left;
        margin-left: 340px;
        line-height: 0.9;
        font-family: 'Poppins';
    }
    .date{
        text-align: left;
        margin-top: 70px;
        margin-left: 340px;
    }
</style>
@php
    \Carbon\Carbon::setLocale('fr');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
@endphp

    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

        <p> <span>{{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}}, </span> étudiant{{$stagiaire->genre}} {{$stagiaire->article}} {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) de {{$stagiaire->ville}},
        Specialité: {{$stagiaire->filiere}} a effectué un {{$stagiaire->type_stage}} au sein de la {{$stagiaire->direction}} et ce pendant la période du @php echo $dd_long  @endphp au {{ $fin_long }} ( du {{$dd_short}} au {{$fin_short}})     <br>   </p>
        <p>
            <span>Faite</span> à la demande de l'intéressé{{$stagiaire->genre}} pour servir et valoir ce que de droit.

        </p>


<p class="date">{{$stagiaire->site}}, le {{$today}} <br></p>
        <p class="sign">
            P. Le président Directeur Générale et p.o. <br>
            P. Le Responsable Développement RH
        </p>









@endsection
