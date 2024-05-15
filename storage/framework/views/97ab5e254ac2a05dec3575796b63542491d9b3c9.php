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
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">



    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            line-height: 0.9;
        }
        .logo{
            margin: 0% 0% 1% 0%;
        }
    </style>

    <div id="app">
        <div class="row">
            <div class="container entete">
                <div style="margin-left:1%;">
                    <img class="logo" src="<?php echo e(public_path("/images/logow.png")); ?>" alt="" style="width: 140px; height: 50px;"> <br>
                    <b>SBU-Mining <br>
                    Direction Industrielle Mines Gantour <br>
                    Direction Capital Humain Gantour <br>
                    Développement RH <br></b>
                    <div class="phones">
                        <small>Tel: +212 662 07 74 39</small><br>
                        <small>Fax: +212 524 64 60 86</small>
                    </div>
                </div>
            </div>
        </div>



        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <style>
        .entete{
            line-height: 0.7;
        }
        .phones{
            margin-top: 5px;
        }
        footer{
            position: absolute;
            bottom: 1px;
            font-size: 9px;
            /* font-family: 'Times New Roman', Times, serif; */
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <footer>
        OCP S.A <br>
Société anonyme au capital de 8.287.500.000 DH - Registre de Commerce : 40327  Identification Fiscale : 02220794 - Patente n°36000670
2-4, rue Al Abtal, Hay Erraha, 20 200 Casablanca, Maroc  Téléphone/ Standard: +212 (0) 5 22 23 20 25 / + 212 (0) 5 22 92 30 00 /+ 212 (0) 5 22 92 40 00
<br> www.ocpgroup.ma
    </footer>
</body>
</html>
<?php /**PATH D:\Share\main\Gestion_stage\resources\views/layouts/doc.blade.php ENDPATH**/ ?>