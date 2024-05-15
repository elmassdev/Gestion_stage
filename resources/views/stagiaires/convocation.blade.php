@extends('layouts.doc')
@section('content')


<style>
    *{
        font-family: 'Poppins', sans-serif;
    }

    .top{
        position: absolute;
        top: 40px;
        margin-left: 450px;
    }
    .note{
        font-size: 15px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .nomsta{
        font-size: 15px;
        margin-top: 05px;
        margin-left: 350px;
        font-family: sans-serif;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 80px;
    }
    span{
        font-size: 15px;
        padding-left: 60px;
        padding-top: 100px;
    }
    p{
        font-size: 15px;
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        font-size: 15px;
        margin-left: 30px;
    }
    .tdleft{
        font-style: bold;
    }
    li{
        font-size: 15px;
        margin-left: 35px;
    }
    .first{
        line-height: 14px;
    }
    .last{
        line-height: 12px;
    }
    ul{
        margin-top: 0;
    }
</style>

{{-- <div class="top"> {{$stagiaire->site}}, le {{$today}}</div> --}}
<div class="top">
    @if(isset($dateLO))
        {{$stagiaire->site}}, le {{$dateLO}}
    @else
        {{$stagiaire->site}}, le {{$dateToShow}}
    @endif
</div>






<div class="note"> <small> <b> OIG/H/DH - ES n° {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}} </b> </small> </div>
<div class="nomsta"><small> <b> {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}} </b><br>S/C de: {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) <br> - {{$stagiaire->ville}} - </small> </div>

<p>{{$stagiaire->titre}}, <br>
<p class="first"><span>Suite à votre demande, </span>nous avons l’honneur de vous faire part de notre accord pour l'organisation d'un {{$stagiaire->type_stage}} au sein du Groupe OCP.</p>

<table>
    <tr>
        <td class="tdleft">
            Année d'étude et spécialité
        </td>
        <td class="tdright">
            : {{$stagiaire->niveau}} - {{$stagiaire->diplome}} - {{$stagiaire->filiere}}
        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Période de stage
        </td>
        <td class="tdright">
            : Du {{$date_debut}} au {{$date_fin}}
        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Direction d' accueil :
        </td>
        <td class="tdright">
            : {{$stagiaire->direction}}
        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Entité d'accueil
        </td>
        <td class="tdright">
            : {{$stagiaire->lib}}({{$stagiaire->sigle}})
        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Parrain de stage :
        </td>
        <td class="tdright">
            : {{$stagiaire->titreenc}} {{$stagiaire->prenomenc}} {{$stagiaire->nomenc}}
        </td>
    </tr>
</table>
<p>Conditions générales :</p>

<ul>
    <li>
        Hébergement et restauration : à la charge des stagiaires
    </li>
    <li>
        Assurance : Les stagiaires doivent être assurés par leurs soins ou leur
école contre les risques encourus durant leur séjour au sein
du Groupe OCP (accident de travail, de trajet, maladie,...)
    </li>
</ul>
<p class="last"><span>Veuillez agréer, {{$stagiaire->titre}}, l'expression de nos sentiments distingués.</span></p>
<p class="nb">NB : Le stage ne peut en aucun cas être prolongé au-delà de la durée contractée</p>






        <style>
            .nb{
                font-size: 12px;
            }
            .sign{
                text-align: left;
                margin-left: 320px;
                line-height: 4px;
            }
            .sujet{
                font-size: 10px;
            }
        </style>

        <div class="sign">  <p> <b>
            P. Le Président Directeur Général & p.o., <br>
            P. Le Responsable Développement RH </b> </p>

        </div>



        @if ($stagiaire->sujet!='')
        <div class="sujet"><small> <i>PJ: Sujet de stage </i>  </small></div>
       @endif



@endsection
