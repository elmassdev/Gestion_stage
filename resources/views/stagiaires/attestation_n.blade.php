@extends('layouts.doc')
@section('content')

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
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
        line-height: 16pt;
    }
</style>


    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

    <p><span>Le Responsable Développement RH</span> de Gantour du Groupe OCP.sa certifie que
        {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}} étudiant{{$stagiaire->genre}} {{$stagiaire->article}} {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) de {{$stagiaire->ville}}, Spécialité: {{$stagiaire->filiere}}, a effectué avec assiduité un {{$stagiaire->type_stage}} :</p>

        <p>
        - <b>à la {{$stagiaire->direction}} </b> <br>
        - du <b> @php echo $dd_long  @endphp au {{ $fin_long }} ( du {{$dd_short}} au {{$fin_short}})   </b>  <br>   </p>
        <p>
            <span>La présente attestation est délivrée à l'intéressé{{$stagiaire->genre}} pour servir et
                valoir ce que de droit.</span>

        </p>

        <style>
            .sign{
                text-align: left;
                margin-left: 370px;
                line-height: 0.7;
            }
            .date{
                text-align: left;
                font-size: 15px;
                margin-top: 40px;
                margin-left: 370px;
            }
        </style>
        <p class="date">
            {{$stagiaire->site}}, le {{$today}} <br>
        </p>

        <div class="sign">

            P. Le Responsable Développement RH

        </div>









@endsection
