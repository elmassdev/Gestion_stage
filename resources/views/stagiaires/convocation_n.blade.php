@extends('layouts.doc')
@section('content')


<style>

p, span, table, ul, li, .top, .first, .last, .top,.note,.nomsta,.Att_title{
    font-family: 'Poppins', sans-serif;
    line-height: 0.9;
}

    .top{
        font-size: 14px;
        position: absolute;
        top: 40px;
        margin-left: 450px;
    }
    .note{
        font-size: 14px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .nomsta{
        font-size: 14px;
        line-height: 0.8;
        margin-top: 05px;
        margin-left: 350px;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 75px;
    }
    span{
        font-size: 14px;
        padding-left: 60px;
        padding-top: 40px;
    }
    p{
        font-size: 14px;
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        font-size: 14px;
        margin-left: 20px;
    }
    .tdleft{
        font-size: 14px;
    }
    li{
        font-size: 14px;
        margin-left: 35px;
    }
    .first{
        line-height: 0.7;
    }
    .last{
        line-height: 0.7;
    }
    ul{
        margin-top: 0;
        font-size: 14px;
    }
    .nb{
        margin-top: 0.5;
        font-size: 11px;
    }
    .sign{
        text-align: left;
        margin-left: 370px;
        margin-top: 30px;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        line-height: 0.8;
        /* font-style: bold; */
    }
    .sujet{
        font-size: 10px;
    }

</style>

{{-- <div class="top"> {{$stagiaire->site}}, le {{$today}}</div> --}}
<div class="top">
    @if(isset($dateLO) && !empty($dateLO))
    {{$stagiaire->site}}, le {{$dateLO}}
    @else
    {{$stagiaire->site}}, le {{$dateToShow}}
    @endif
</div>







<div class="note"> <small>  OIG/H/DH - ES n° {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}}  </small> </div>
<div class="nomsta"><small> <b> {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}}</b> <br>  S/C de: {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}}) <br> - {{$stagiaire->ville}} -</small> </div>
<table>
    <tr>
        <td> Objet </td>
        <td>: {{$stagiaire->type_stage}} </td>
    </tr>
    <tr>
        <td> Réf </td>
        <td>: Votre demande du {{$ddemande}}  </td>
    </tr>
</table>

<p>{{$stagiaire->titre}}, <br>
<p class="first"><span>Suite à votre demande citée en référence,</span>nous avons l’honneur de vous faire part de notre accord pour un {{$stagiaire->type_stage}} au sein du Groupe OCP.</p>
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
<p class="last"><span>Veuillez agréer, {{$stagiaire->titre}}, l'expression de nos sentiments distingués</span></p>
<p class="nb">NB : Le stage ne peut en aucun cas être prolongé au-delà de la durée contractée</p>







<div class="sign">
    P. Le Président Directeur Général & p.o., <br>
    P. Le Responsable Développement RH

</div>



        @if ($stagiaire->sujet!='')
        <div class="sujet"><small> <i>PJ: Sujet de stage </i>  </small></div>
       @endif

@endsection
