@extends('layouts.doc')
@section('content')

<style>
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 80px;
    }
    span{
        padding-left: 40px;
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
    }
</style>
<div class="note"> <small> <b> {{ $activeSignature->sigle }}  - ES n° {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}} </b> </small> </div>


    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

    <p><span>Le Responsable Développement RH</span> de Gantour du Groupe OCP.sa certifie que
        {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}}, @if(isset($stagiaire->cin) && !empty($stagiaire->cin))
        titulaire de la CIN n°: {{$stagiaire->cin}}@endif, étudiant{{$stagiaire->genre}} {{$stagiaire->article}} {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) de {{$stagiaire->ville}}, Spécialité: {{$stagiaire->filiere}}, a effectué avec assiduité un {{$stagiaire->type_stage}} :</p>

        <p>
        - à la {{$stagiaire->direction}}  <br>
        - du  @php echo $dd_long  @endphp au {{ $fin_long }} ( du {{$dd_short}} au {{$fin_short}})     <br>   </p>
        <p>
            <span>La présente attestation est délivrée à l'intéressé{{$stagiaire->genre}} pour servir et
                valoir ce que de droit.</span>

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
            {{$stagiaire->site}}, le {{$today}} <br>
            {{ $activeSignature->sign1 }}

        </div>









@endsection
