<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body  id="body-element" data-bs-theme="dark">


    <style>

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




        /* .toggleThemeBtn > div > i {
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
            border-radius:100%;
        } */

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
            font:bold;
        }

        /*----------------------*/



/*--------------------*/

    </style>


    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm sticky-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="display:absolute" >
                        <li class="navbarli"><a href="/stagiaires">Stagiaires</a></li>
                        <li class="navbarli"><a href="/indicators/index">Indicateurs</a></li>
                        <li class="navbarli"><a href="/contact">Contact</a></li>
                        <li class="navbarli"><span class="toggleThemeBtn" id="toggleThemeBtn">
                            <div id="lightThemeBtn"><img id="moon" src="/images/moon-svgrepo-com.svg" alt="" height="24px" width="24px"></div>
                            <div id="darkThemeBtn"><img id="sun" src="/images/sun-bright-svgrepo-com.svg" alt="" height="24px" width="24px"></div>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#363532" d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"/></svg>         </div>                        --}}

                                {{-- <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#e9b82f" d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>                            </div> --}}
                        </span></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold" v-pre>
                                   <i> {{ Auth::user()->name }} </i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

 <script>

    const bodyElement = document.getElementById('body-element');
    const toggleThemeButton = document.getElementById('toggleThemeBtn');
    const navbar = document.getElementById('navbar');

    const setTheme = (theme) => {
        bodyElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
    };

    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
        setTheme(storedTheme);
    }

    toggleThemeButton.addEventListener('click', () => {
        const currentTheme = bodyElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        navbar.classList.remove('navbar-dark', 'bg-dark', 'navbar-light', 'bg-light');
        navbar.classList.add(`navbar-${newTheme}`, `bg-${newTheme}`);
    });
    window.onload = function() {
        const currentTheme = bodyElement.getAttribute('data-bs-theme');
        var navbar = document.getElementById('navbar');
        if(currentTheme==='dark'){
            navbar.classList.add(`navbar-dark`, `bg-dark`);
            toggleThemeButton.style.backgroundColor = 'linear-gradient(180deg,#777,#3a3a3a)';
        }else{
            navbar.classList.add(`navbar-light`, `bg-light`);
        }
    }

</script>



</body>
</html>
