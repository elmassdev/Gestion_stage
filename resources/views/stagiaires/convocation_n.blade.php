@extends('layouts.doc')
@section('content')


<style>

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
        margin-top: 75px;
    }
    span{
        font-size: 15px;
        padding-left: 60px;
        padding-top: 40px;
    }
    p{
        font-size: 15px;
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        font-size: 15px;
        margin-left: 20px;
    }
    .tdleft{
        font-size: 15px;
        font-style: bold;
    }
    li{
        font-size: 15px;
        margin-left: 35px;
    }

</style>

{{-- <div class="top"> {{$stagiaire->site}}, le {{$today}}</div> --}}
<div class="top">
    @if(isset($dateLO))
        {{$stagiaire->site}}, le {{$dateLO}}
    @elseif(Carbon\Carbon::parse($stagiaire->date_debut)->isPast())
        {{$stagiaire->site}}, le {{$ddemande}}
    @else
        {{$stagiaire->site}}, le {{$ddemande}}
    @endif
</div>







<div class="note"> <small> <b> OIG/H/DH - ES n° {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}} </b> </small> </div>
<div class="nomsta"><small> <b> {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}} </b><br>  S/C de: {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) <br> - {{$stagiaire->ville}} -</small> </div>
<table>
    <tr>
        <td> <b>Objet</b> </td>
        <td>: {{$stagiaire->type_stage}} </td>
    </tr>
    <tr>
        <td> <b>Réf</b> </td>
        <td>: Votre demande du {{$ddemande}}  </td>
    </tr>
</table>
{{-- <div><b>Objet        :</b> {{$stagiaire->type_stage}}     </div>
<div><b>Réf       :</b> Votre demande du {{$ddemande}}     </div> --}}
<p>{{$stagiaire->titre}}, <br>
<p><span>Suite à votre demande citée en référence,</span>nous avons l’honneur de vous faire part de notre accord pour un {{$stagiaire->type_stage}} au sein du Groupe OCP.</p>
<span>Nous vous donnons ci-après les indications relatives à l'organisation du stage :</span>
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
            Direction d'accueil
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
</table>

<p>Conditions générales        :  </p>
{{-- <table>
    <tr>
        <td>Hébergement  </td>
        <td> et restauration: à la charge des stagiaires</td>
    </tr>
    <tr>
        <td>Assurance </td>
        <td>: Les stagiaires doivent être assurés par leurs soins ou leur
            école contre les risques encourus durant leur séjour au sein
            du Groupe OCP (accident de travail, de trajet, maladie,...)</td>
    </tr>
</table> --}}
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
<p><span>Veuillez agréer, {{$stagiaire->titre}}, l'expression de nos sentiments distingués</span></p>
<p>NB : Le stage ne peut en aucun cas être prolongé au-delà de la durée contractée</p>






        <style>
            .sign{
                text-align: left;
                margin-top: 15;
                margin-left: 320px;
                line-height: 22pt;
            }
            .sujet{
                font-size: 10px;
            }
        </style>

<div class="sign">  <p> <b>
    P. Le Président Directeur Général & p.o., <br>
    P. Le Responsable développement RH </b> </p>

</div>



        @if ($stagiaire->sujet!='')
        <div class="sujet"><small> <i>PJ: Sujet de stage </i>  </small></div>
       @endif

@endsection
