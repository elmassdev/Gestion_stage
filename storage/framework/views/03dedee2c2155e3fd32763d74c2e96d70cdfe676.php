<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <?php
    \Carbon\Carbon::setLocale('fr');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    ?>



    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: sans-serif;
            font-family: Arial, Helvetica, sans-serif;
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
         .title_container{
        justify-content: center;
        padding-left: 20%;
        padding-right: 20%;


        }
        .op_title{
            border: solid 1px black;
            width: 45%;
            padding: 2%;
            font-size: 20px;
            margin-bottom: 0;

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
                        <img src="<?php echo e(public_path("/images/logow.jpg")); ?>"> <br>
                        <b>SBU Industrial Facility Management <br>
                        Direction Industrielle Mines Gantour <br>
                        Direction Capital Humain Gantour <br>
                        Developpement RH <br></b>
                    </div>
                    <div>
                        <p>OIG/H/D -  <?php echo e(substr($stagiaire->code, -4)); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?></p>
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
            <div class="title_container">
                <h4 class="op_title"> Ordre de paiement</h4>
                <p class="imp">Imputation: ____________</p>
            </div>
            <div class="intro">
                <p>
                    <span>Le Secrétariat </span>comptable payera à : <?php echo e($stagiaire->civilite); ?>. <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?>, CIN N° <?php echo e($stagiaire->cin); ?>, élève
                    stagiaire <?php echo e($stagiaire->article); ?> <?php echo e($stagiaire->sigle_etab); ?>, la somme de : <?php echo e($Le_net); ?> dhs (<?php echo e($net); ?> dh)
                </p>
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
                        /* margin-right: 10%; */
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

                    <div>- Indemnité de stage pour la période allant du <?php echo e($date_debut); ?> au <?php echo e($date_fin); ?> à <?php echo e($stagiaire->service); ?> (*) <br> (OIG/H/D -  <?php echo e($stagiaire->code); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?> du <?php echo e($ddem); ?>) <br>
                </div>
                    <div> <br> - Absentéisme</div>

            </td>
            <td><?php echo e($somme); ?> dh</td>
            <td> <br> <br> <br> <br> <?php echo e($retenue); ?> dh</td>
        </tr>
        <tr>
            <td>Total</td>
            <td><?php echo e($somme); ?> dh</td>
            <td><?php echo e($retenue); ?> dh</td>
        </tr>
        <tr>
            <td>Net à payer</td>
            <td colspan="2" style="text-align: center"> <b> <?php echo e($net); ?> dh </b> </td>
        </tr>
    </table>
    <p>(*) - Hébergement et Restauration : non pris en charge par l'OCP. <br>
    <b> Arrêté à la somme de : <?php echo e($Le_net); ?> dh (<?php echo e($net); ?> dh). </b> </p>

    <div class="LD"> <?php echo e($stagiaire->site); ?>, le <?php echo e($today); ?> </div>
<style>
    #sign{
        font-weight: bold;
        margin-top: 15%;
        font-size: 14px;
        font-family: sans-serif;
    }
    #sign td{
        justify-content: center;
        text-align: center;

    }
    #sign .leftcol{
        padding-left: 15%;
    }
    .bottom{
        font-family: sans-serif;
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

















<?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/op.blade.php ENDPATH**/ ?>