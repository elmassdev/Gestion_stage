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
    <link href="/css/style.css" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <style>
        body{
            font-family: sans-serif;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

    <div id="app">
        <div class="row">
            <div class="container">
                <div>
                    <img src="{{ public_path("/images/logow.jpg") }}" alt="" style="width: 140px; height: 50px;"> <br>
                 <b>SBU Industrial Facility Management <br>
                    Direction Industrielle Mines Gantour <br>
                    Direction Capital Humain Gantour <br>
                    Developpement RH <br></b> <div class="phones">
                    <small>Tel: +212 662 07 74 39</small> <br>
                    <small>Fax: +212 524 64 60 86   </small>     </div>
                </div>
            </div>
        </div>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style>
        .phones{
            margin-top: 5px;
        }
        footer{

            position: absolute;
            bottom: 20px;
            font-size: 11px;
            font-family: 'Times New Roman', Times, serif;
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
