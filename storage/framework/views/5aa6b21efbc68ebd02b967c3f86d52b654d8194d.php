<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-oGq1BrH7tx2LlO3S3z5gDvDHt5eRq3s7l5xFZbgYFBJIU8Z6enP00HRlL2LZ6ENg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Great+Vibes&family=Parisienne&family=Petit+Formal+Script&family=Pinyon+Script&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<style>
    #toggler {
        width:50px;
        height:25px;
        position: relative;
        top: 0;
        background: #ebebeb;
        border-radius: 20px;
        box-shadow: inset 0px 5px 15px rgba(0,0,0,0.4), inset 0px -5px 15px rgba(255,255,255,0.4);
        cursor: pointer;
        transition: 0.3s;
    }
    #toggler:after {
        content: "";
        width:24px;
        height: 25px;
        position: absolute;
        left:1px;
        background: linear-gradient(180deg,#ffcc89,#d8860b);
        border-radius: 24px;
        box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
        transition: 0.3s;
    }
    #darkmode-toggle {
        width: 0;
        height: 0;
        visibility: hidden;
    }
    #darkmode-toggle:checked + #toggler {
        background: #242424;
    }
    #darkmode-toggle:checked + #toggler:after {
        left:49px;
        transform: translateX(-100%);
        background: linear-gradient(180deg,#777,#3a3a3a);
    }
    #toggler:active:after{
        width: 26px;
    }

    #toggler svg {
        position: absolute;
        width: 12px;
        top:6px;
        z-index: 10;
    }
    #toggler svg.sun {
        left:6px;
        fill:#fff;
        transition: 0.3s;
    }
    #toggler svg.moon {
        left:35px;
        fill:#7e7e7e;
        transition: 0.3s;
    }
    #darkmode-toggle:checked + #toggler svg.sun {
        fill:#7e7e7e;
    }
    #darkmode-toggle:checked + #toggler svg.moon {
        fill:#fff;
    }
    .toggleThemeBtn {
        display: flex;
        align-items: center;
    }

    .toggleThemeBtn > div {
        margin-right: 5px;
    }

    #darkThemeBtn {
        display: none;
    }

    body[data-bs-theme='dark'] #lightThemeBtn {
        display: none;
    }

    body[data-bs-theme='dark'] #darkThemeBtn {
        display: block;
    }

    .toggleThemeBtn i {
        font-size: 24px;
        border-radius: 50%;
    }
    #moon{
        background-color: rgb(110, 135, 182);
        border-radius: 50%;
        padding: 2px;
    }
    #sun{
        border-radius: 50%;
        background-color: rgb(94, 94, 94);
        padding: 2px;
    }
    #moon::after{
        animation: ease-out:
    }
    #sun::after{
        animation: ease-out:
    }


    .navbarli{
        margin-left: 10rem;
        font-size: 18px;
        font-weight:bold;
    }
    @media screen and (max-width:600px){
        .navbarli{margin-left: 0rem;}
    }

    #navbar a{
        text-decoration: none;
        color:inherit;
    }
    a{
        text-decoration: none;
        color:inherit;
    }

    th{
        font-weight:bold;
    }

    @media (min-width: 768px) {
        body{
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    }



    .dep {
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 36px;
        font-weight: bolder;
        color: rgb(157, 157, 157);
        padding: 2%;
        height: 10vh;
        padding-left: 10%;
    }
    .motto {
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        font-size: 36px;
        font-weight: bolder;
        color: rgb(157, 157, 157);
        padding-left: 15%;
        transition: font-size 2s ease;
        height: 20vh;
    }


    .motto:hover{
        font-size: 3rem;
        transition-delay: 0.5ms;
    }
    .middle{
        height: 40vh;

    }

    table td{
        margin: 0%;
        padding: 0%;
        width: 20%;
    }
    #gear1, #gear2, #gear3 {
        color: rgb(157, 157, 157);
        display: block;
        float: left;
        font-size: 10rem;
        transition: font-size 2s ease;
        top:45px;
    }

    #gear1:hover, #gear3:hover, #gear2:hover {
        color:#ffc107;
        font-size: 20rem;
        transition-delay: 0.5ms;
    }



    .spin {
        -webkit-animation:spin 15s linear infinite;
        -moz-animation:spin 15s linear infinite;
        animation:spin 15s linear infinite;
    }

    .spin-back {
        -webkit-animation:spin-back 15s linear infinite;
        -moz-animation:spin-back 15s linear infinite;
        animation:spin-back 15s linear infinite;
        transition-delay: 0.5ms;
    }

    @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
    @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
    @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

    @-moz-keyframes spin-back { 100% { -moz-transform: rotate(-360deg); } }
    @-webkit-keyframes spin-back { 100% { -webkit-transform: rotate(-360deg); } }
    @keyframes spin-back { 100% { -webkit-transform: rotate(-360deg); transform:rotate(-360deg); }}

    #gear {
            position: relative;
        }

        #link1, #link2,#link3 {
            font-weight: 400;
            display: none;
            position: absolute;
            transform: translateX(-50%);
        }

        #gear:hover .fa-gear {
            animation: none;
        }

        #gear1:hover #link1 {
            /* color:rgb(91, 144, 241); */
            display: inline-block;
            padding: 14%;
            left: 21%;
            top: 18%;
            animation: none;
        }
        #gear2:hover #link2 {
            /* color:rgb(91, 144, 241); */
            display: inline-block;
            padding: 14%;
            left: 41%;
            top: 18%;
            animation: none;
        }
        #gear3:hover #link3 {
            /* color:rgb(91, 144, 241); */
            display: inline-block;
            padding: 14%;
            left: 63%;
            top: 18%;
            animation: none;
        }


        .fa-gear {
            transition: transform 0.3s ease-in-out;
        }

        .spin {
            animation: spin 15s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #link1, #link2,#link3{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20%;
            font-weight: bolder;
        }
    #sign {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 8px;
            font-weight: bold;
            font-size: 24px;
            font-family: 'Pinyon Script', cursive;
        }
        body{
            box-sizing: border-box;
            height: 95vh;
            margin:0;
            padding:0;
        }
        body, html {
            overflow: hidden;
        }

</style>

<body  id="body-element" data-bs-theme="dark">
    <nav class="navbar navbar-expand-md shadow-sm sticky-top" id="navbar">
        <a class="navbar-brand mx-auto" href="<?php echo e(url('/')); ?>">
            <img src="/images/logo.svg" alt="">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="display:absolute" >
                    <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                    <li class="navbarli"><a href="/stagiaires">Stagiaires</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_indicators')): ?>
                    <li class="navbarli"><a href="/indicators/index">Indicateurs</a></li>
                    <?php endif; ?>
                    <li class="navbarli"><a href="/contact">Contact</a></li>
                    <li class="navbarli" style="display: inline" >
                        <input type="checkbox" id="darkmode-toggle"/>
                        <label for="darkmode-toggle" id="toggler" >
                            <svg  version="1.1" class="sun" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
                                <rect x="152.994" y="58.921" transform="matrix(0.3827 0.9239 -0.9239 0.3827 168.6176 -118.5145)" width="40.001" height="16"/>
                                <rect x="46.9" y="164.979" transform="matrix(0.9239 0.3827 -0.3827 0.9239 71.29 -12.4346)" width="40.001" height="16"/>
                                <rect x="46.947" y="315.048" transform="matrix(0.9239 -0.3827 0.3827 0.9239 -118.531 50.2116)" width="40.001" height="16"/>
                                <rect x="164.966" y="409.112" transform="matrix(-0.9238 -0.3828 0.3828 -0.9238 168.4872 891.7491)" width="16" height="39.999"/>
                                <rect x="303.031" y="421.036" transform="matrix(-0.3827 -0.9239 0.9239 -0.3827 50.2758 891.6655)" width="40.001" height="16"/>
                                <rect x="409.088" y="315.018" transform="matrix(-0.9239 -0.3827 0.3827 -0.9239 701.898 785.6559)" width="40.001" height="16"/>
                                <rect x="409.054" y="165.011" transform="matrix(-0.9239 0.3827 -0.3827 -0.9239 891.6585 168.6574)" width="40.001" height="16"/>
                                <rect x="315.001" y="46.895" transform="matrix(0.9238 0.3828 -0.3828 0.9238 50.212 -118.5529)" width="16" height="39.999"/>
                                <path d="M248,88c-88.224,0-160,71.776-160,160s71.776,160,160,160s160-71.776,160-160S336.224,88,248,88z M248,392 c-79.4,0-144-64.6-144-144s64.6-144,144-144s144,64.6,144,144S327.4,392,248,392z"/>
                                <rect x="240" width="16" height="72"/>
                                <rect x="62.097" y="90.096" transform="matrix(0.7071 0.7071 -0.7071 0.7071 98.0963 -40.6334)" width="71.999" height="16"/>
                                <rect y="240" width="72" height="16"/>
                                <rect x="90.091" y="361.915" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 -113.9157 748.643)" width="16" height="71.999"/>
                                <rect x="240" y="424" width="16" height="72"/>
                                <rect x="361.881" y="389.915" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 397.8562 960.6281)" width="71.999" height="16"/>
                                <rect x="424" y="240" width="72" height="16"/>
                                <rect x="389.911" y="62.091" transform="matrix(0.7071 0.7071 -0.7071 0.7071 185.9067 -252.6357)" width="16" height="71.999"/>
                            </svg>
                            <svg version="1.1" class="moon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 49.739 49.739" style="enable-background:new 0 0 49.739 49.739;" xml:space="preserve">
                                <path d="M25.068,48.889c-9.173,0-18.017-5.06-22.396-13.804C-3.373,23.008,1.164,8.467,13.003,1.979l2.061-1.129l-0.615,2.268 c-1.479,5.459-0.899,11.25,1.633,16.306c2.75,5.493,7.476,9.587,13.305,11.526c5.831,1.939,12.065,1.492,17.559-1.258v0 c0.25-0.125,0.492-0.258,0.734-0.391l2.061-1.13l-0.585,2.252c-1.863,6.873-6.577,12.639-12.933,15.822 C32.639,48.039,28.825,48.888,25.068,48.889z M12.002,4.936c-9.413,6.428-12.756,18.837-7.54,29.253 c5.678,11.34,19.522,15.945,30.864,10.268c5.154-2.582,9.136-7.012,11.181-12.357c-5.632,2.427-11.882,2.702-17.752,0.748 c-6.337-2.108-11.473-6.557-14.463-12.528C11.899,15.541,11.11,10.16,12.002,4.936z"/></svg>
                            </label>
                        </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold" v-pre>
                                <?php echo e(Auth::user()->nom); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="home">
        <div class="row">
            <h1 class="dep"> Département Développement RH  </h1>
        </div>


   <style>
    .menu{
        margin-right: 35%;
        margin-top: 5%;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      max-width: 80%; /* Adjust as needed */
      margin: 0 auto;
    }

    .square {
      width: calc(31% - 2px);
      height: 150px;
      box-sizing: border-box;
      transition: background-color 0.3s;
      transition: font-size 2s ease;
      transition: font-size 2s ease;
      display: flex;
      align-items: center;
      gap: 28px;
      border-radius: 5%;
      position: relative;
      z-index: 1;
      box-shadow: 6px 28px 46px -6px #bebbbb;
       margin:1%;
    }
    .square:hover{
        transform: scale(1.1);
        background-color: rgb(221, 164, 49);
    }
    .square::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 1rem;
    background: linear-gradient(135deg, #f27121, #000000 40%);
    z-index: -2;
  }
  .square::after {
    content: '';
    position: absolute;
    left: 1px;
    top: 1px;
    width: calc(100% - 1px);
    height: calc(100% - 1px);
    border-radius: 1rem;
    background: linear-gradient(90deg, #171721, #060609);
    transition: box-shadow 0.3s ease;
    z-index: -1;
  }

  .square .info {
    display: flex;
    flex-flow: column nowrap;
  }

  .square .info .sub {
    color: #ff7a00;
    line-height: 28px;
    font-size: 14px;
    font-weight: 400;
  }

  .square .info .title {
    max-width: 260px;
    line-height: 28px;
    font-size: 17px;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .square .info .btn {
    margin-top: 28px;
    color: #fff;
    background: transparent;
    border: unset;
    border-radius: 16px;
    overflow: hidden;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 16px;
    margin-right: auto;
    cursor: pointer;
    position: relative;
    z-index: 0;
    transition: background 0.3s ease;
  }

  .square .info .btn::before,
  .square .info .btn::after {
    content: '';
    position: absolute;
  }

  .square .info .btn::before {
    left: 50%;
    top: 50%;
    background: linear-gradient(90deg, #ff7a00 0%, transparent 45%, transparent 55%, #ff7a00 100%);
    transform: translate(-50%, -50%) rotate(55deg);
    width: 100%;
    height: 240%;
    border-radius: 16px;
    z-index: -2;
    opacity: 0.4;
    transition: all 0.3s ease;
    animation: 5s move infinite linear paused;
  }

  .square .info .btn::after {
    left: 2px;
    top: 2px;
    background: #171721;
    width: calc(100% - 4px);
    height: calc(100% - 4px);
    border-radius: 16px;
    z-index: -1;
  }

  .square .info .btn:hover::before {
    animation-play-state: running;
    opacity: 1;
  }

  .square .image {
    min-width: 86px;
    min-height: 86px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 8px 12px 16px #000;
    position: relative;
    z-index: 0;
  }

  .square .image::before {
    content: '';
    position: absolute;
    background: linear-gradient(110deg, #ff7a00 10%, #000000);
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    z-index: -2;
  }

  .square .image::after {
    content: '';
    position: absolute;
    left: 1px;
    top: 1px;
    width: calc(100% - 1px);
    height: calc(100% - 1px);
    border-radius: 50%;
    background: linear-gradient(90deg, #12121a, #030303);
    box-shadow: 6px 6px 14px -6px #f2712150 inset;
    z-index: -1;
  }

  .square .image > i {
    font-size: 30px;
    color: #ff7a00;
  }

  @keyframes move {
    0% {transform: translate(-50%, -50%)  rotate(55deg);}
    100% {transform: translate(-50%, -50%)  rotate(415deg);}
  }






    @media (max-width: 600px) {
      .square {
        width: calc(50% - 2px); /* Adjust for border width */
        height: 150px; /* Adjust as needed */
        font-size: 1rem;
      }
    }

    @media (max-width: 400px) {
      .square {
        width: calc(100% - 2px); /* Adjust for border width */
        height: 100px; /* Adjust as needed */
      }
    }
  </style>

  <div class="menu">
    <div class="container">
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/stagiaires/create"> Nouveau</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-plus"></i>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/indicators/index"> Indicateurs</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-chart-line"></i>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/stagiaires"> Stagiaires</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-list"></i>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/export"> Sauvegarde</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-database"></i>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12  " href="/stagiaires/1"> Rechercher</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
         </div><div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/encadrants/1"> Encadrants</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-sitemap"></i>
              </div>
        </div>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/indicators/graph"> Diagrammes</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-chart-pie"></i>
              </div>
        </div>
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/user/assign-roles"> Menu Admin</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-pen-nib"></i>
              </div>
        </div>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_surete_page')): ?>
        <div class="square">
            <div class="info">
                <a class="btn col-md-12" href="/surete"> Canevas</a>
              </div>
              <div class="image">
                <i class="fa-solid fa-pen-nib"></i>
              </div>
        </div>
        <?php endif; ?>
      </div>
  </div>









        

        <div id="sign">
            
        </div>
    </div>
</body>

<script>
    const bodyElement = document.getElementById('body-element');
    const toggleThemeButton = document.getElementById('toggler');
    const navbar = document.getElementById('navbar');

    // Function to set the theme based on user preference
    const setTheme = (theme) => {
        bodyElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
    };

    // Function to update the toggle button based on the dark mode state
    const updateToggleButton = () => {
        const darkModeToggle = document.getElementById('darkmode-toggle');
        const toggler = document.getElementById('toggler');

        if (darkModeToggle.checked) {
            toggler.querySelector('svg.sun').style.fill = '#7e7e7e';
            toggler.querySelector('svg.moon').style.fill = '#fff';
            toggler.querySelector('svg.moon').style.left = '35px';
        } else {
            toggler.querySelector('svg.sun').style.fill = '#fff';
            toggler.querySelector('svg.moon').style.fill = '#7e7e7e';
            toggler.querySelector('svg.moon').style.left = '35px';
        }
    };

    // Check for user's theme preference in local storage
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
        setTheme(storedTheme);
        updateToggleButton();
    }

    // Set the initial state of the dark mode toggle button
    const darkModeToggle = document.getElementById('darkmode-toggle');
    darkModeToggle.checked = storedTheme === 'dark';

    toggleThemeButton.addEventListener('click', () => {
        const currentTheme = bodyElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        navbar.classList.remove('navbar-dark', 'bg-dark', 'navbar-light', 'bg-light');
        navbar.classList.add(`navbar-${newTheme}`, `bg-${newTheme}`);
        if(newTheme==='dark'){
            bodyElement.style.background = 'black';
        }else{
            bodyElement.style.background = 'url("/images/bg.jpg")';
            bodyElement.style.backgroundSize = 'cover';
            bodyElement.style.backgroundRepeat = 'no-repeat';
            bodyElement.style.backgroundPosition= "center";
            bodyElement.style.margin = '0';
            bodyElement.style.padding = '0';
            document.documentElement.style.margin = '0';
            document.documentElement.style.padding = '0';
        }
        updateToggleButton();
    });

    window.onload = function() {
        const currentTheme = bodyElement.getAttribute('data-bs-theme');
        var navbar = document.getElementById('navbar');
        if(currentTheme==='dark'){
            navbar.classList.add(`navbar-dark`, `bg-dark`);
            toggleThemeButton.style.backgroundColor = 'linear-gradient(180deg,#777,#3a3a3a)';
            bodyElement.style.background = 'black';
        }else{
            navbar.classList.add(`navbar-light`, `bg-light`);
            bodyElement.style.background = 'url("/images/bg.jpg")';
            bodyElement.style.backgroundSize = 'cover';
            bodyElement.style.backgroundRepeat = 'no-repeat';
            bodyElement.style.backgroundPosition= "center";
            bodyElement.style.margin = '0';
            bodyElement.style.padding = '0';
            document.documentElement.style.margin = '0';
            document.documentElement.style.padding = '0';
        }
        updateToggleButton();
    }

</script>



</html>





<?php /**PATH D:\Share\main\Gestion_stage\resources\views/home.blade.php ENDPATH**/ ?>