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
    <!-- Bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="/images/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
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
                                

                                
                        </span></li>
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

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold" v-pre>
                                   <i> <?php echo e(Auth::user()->name); ?> </i>
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

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH D:\Share\main\Gestion_stage\resources\views/layouts/app.blade.php ENDPATH**/ ?>