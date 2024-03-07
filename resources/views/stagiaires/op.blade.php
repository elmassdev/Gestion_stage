<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    @php
    \Carbon\Carbon::setLocale('fr');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    @endphp
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
        }

        #title {
            font-family: sans-serif;
            font-size: 22px;
            border: 1px solid black;
            width: 38%;
            font-weight: bold;
            background-color: #8bb6e8;
        }
        table{
            width: 90%;
        }
        .topleft{
            padding-top: 0px;
            padding-left:10%;
            font-size: 12px;

        }
        .imp{
            padding-top: 0px;
            font-size: 12px;

        }
        .intro{
            margin-top: 3%;
        }
        span{
        padding-left: 60px;
        padding-top: 100px;
        }
        p{
            margin-left: 30px;
            margin-right: 30px;
            line-height: 15pt;
        }

    </style>


    <div id="app">
        <table>
            <tr>
                <td>
                    <div>
                        <img class="my-2" src="{{ public_path("/images/logow.jpg") }}"> <br>
                        <b>SBU-Mining <br>
                        Direction Industrielle Mines Gantour <br>
                        Direction Capital Humain Gantour <br>
                        Developpement RH <br></b>
                    </div>
                    <div class="py-2">
                        <p>OIG/H/D -  {{substr($stagiaire->code, -4);}} /{{substr($stagiaire->site,0,1)}}/{{$year}}</p>
                    </div>
                </td>
                <td>
                    <div class="topleft">
                        <p> <b>Mois de ___________________</b> </p>
                        <p> <b>Pièce de _______ N° ________</b> </p>
                    </div>

                </td>
            </tr>
        </table>


        <div>
            <div class="container">
                <p class=" row text-center mx-auto py-1" id="title"> Ordre de paiement</p>
            </div>
                <p class="row text-center mx-auto fs-2">Imputation: ____________</p>
            </div>
            <div class="intro">
                <p>
                    <span>Le Secrétariat </span>comptable payera à : {{ $stagiaire->civilite }} {{$stagiaire->prenom}} {{$stagiaire->nom}}, CIN N° {{$stagiaire->cin}}, élève
                    stagiaire {{$stagiaire->article}} {{$stagiaire->sigle_etab}}, la somme de : {{$Le_net}} dhs ({{$net}} dh)
                </p>
            </div>
        </div>
        <div>
            <style>
            #indem {
                border-collapse: collapse;
                width: 90%;
                margin: 10px;
            }

            #indem th, #indem td {
                border: 1px solid black;
                padding: 10px;
                font-size: 14px;

            }
            #indem ul li{
                padding-left: 0;
                margin-left: 0;
                text-decoration: none;
            }
            .LD{
                width: 40%;
                height: 100vh;
                float: right;
                margin-top: 5%;
                margin-bottom: 5%;
            }
            </style>





    <table id="indem">
        <tr>
           <th>LIBELLES</th>
           <th>ALLOCATIONS</th>
           <th>RETENUES</th>
        </tr>
        <tr>
            <td>
                <div>- Indemnité de stage pour la période allant du {{ $date_debut }} au {{ $date_fin }} à {{ $stagiaire->sigle}} (*) <br> (OIG/H/D -  {{substr($stagiaire->code, -4)}} /{{substr($stagiaire->site,0,1)}}/{{$year}} du {{$dateLO}}) <br>
                </div>
                <div> <br> - Absentéisme</div>

            </td>
            <td>{{$somme}} dh</td>
            <td> <br> <br> <br> <br> {{$retenue}} dh</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{{$somme}} dh</td>
            <td>{{$retenue}} dh</td>
        </tr>
        <tr>
            <td>Net à payer</td>
            <td colspan="2" style="text-align: center"> <b> {{$net}} dh </b> </td>
        </tr>
    </table>
    <p>(*) - Hébergement et Restauration : non pris en charge par l'OCP. <br>
    <b> Arrêté à la somme de : {{$Le_net}} dh ({{ $net}} dh). </b> </p>

    <div class="LD"> {{$stagiaire->site}}, le {{$today}} </div>
<style>
    #sign{
        font-weight: bold;
        margin-top: 15%;
        font-size: 14px;

    }
    #sign td{
        justify-content: center;
        text-align: center;

    }
    #sign .leftcol{
        padding-left: 15%;
    }
    .bottom{

        position: fixed;
        bottom: 0;
        left: 0;
        width: 200px; /* Adjust the width as needed */
        height: 100px; /* Adjust the height as needed */
        padding: 15px;
        box-sizing: border-box;
        font-weight: bold;
    }
</style>


    <table id="sign">
        <tr>
            <td>
               <div>CONFORME A L'ENGAGEMENT, <br>
                 P/ LE RESPONSABLE <br>
                 DEVELOPPEMENT RH DE GANTOUR, </div>
                </td>
            <td class="leftcol">
                 <div> BON A PAYER <br>
                   PAR DELEGATION <br>
                   DU PRESIDENT DIRECTEUR GENERAL, </div>
            </td>
        </tr>
    </table>



            </div>
        </div>

        <div class="bottom">
            Pour Acquit, <br>
            Le
        </div>

    </div>



</body>
</html>

















