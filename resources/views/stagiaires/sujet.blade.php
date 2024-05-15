<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
    table{
        margin-left: 30px;
    }
    .tdleft{
        font-style: bold;
    }
    .titre{
        text-align: center;
        font-style: bold
    }
    .sujet{
        margin-left: 30px;
    }
    h3{
        margin-left: 30px;
    }
</style>
<div class="note"> <small> <b> OIG/H/DH - ES n° {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}} </b> </small> </div>

<h4 class="titre"> SUJET DE STAGE</h4>
<table>
    <tr>
        <td class="tdleft">Stagiaire</td>
        <td class="tdright">: {{$stagiaire->titre}} {{$stagiaire->prenom}} {{$stagiaire->nom}}</td>
    </tr>
    <tr>
        <td class="tdleft">Spécialité</td>
        <td class="tdright">: {{$stagiaire->filiere}}</td>
    </tr>
    <tr>
        <td class="tdleft">Etablissement</td>
        <td class="tdright">: {{$stagiaire->etab}} ({{$stagiaire->sigle_etab}})</td>
    </tr>
    <tr>
        <td class="tdleft">Lieu de stage</td>
        <td class="tdright">: {{$stagiaire->lib}}({{$stagiaire->sigle_service}})</td>
    </tr>
    <tr>
        <td class="tdleft">Période de stage</td>
        <td class="tdright">: Du {{$date_debut}} au {{$date_fin}}</td>
    </tr>
    <tr>
        <td class="tdleft">Parrain de stage</td>
        <td class="tdright">: {{$stagiaire->titreenc}} {{$stagiaire->prenomenc}} {{$stagiaire->nomenc}}</td>
    </tr>
</table>

<h3> <b>Sujet:</b> </h3><br>
<div class="sujet">{{$stagiaire->sujet}}</div>
