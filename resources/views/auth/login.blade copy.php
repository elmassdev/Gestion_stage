@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center py-4 ">
<style>
    i{
        font-size: 9rem;
    }
    
    #topdec{
        justify-content: center;
        justify-items: center;
        text-align: center;
        height: 20vh;
        padding: 10%;

    }
    .fade-in {
                animation: fadeIn 1s ease-in-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

</style>

        <div id="topdec" class="col-md-6 fade-in">
            <i id="user" class="fa-solid fa-user fa-2xl"></i>
            <i id="env" class="fa-regular fa-envelope fa-beat-fade fa-2xl" style="color: #ff4500;"></i>
            <i id="at" class="fa-solid fa-at fa-beat-fade fa-2xl" style="color: #005eff;"></i>
            <i id="key" class="fa-solid fa-key fa-2xl" style="color: #2fb646;"></i>
            <i id="lock" class="fa-solid fa-lock  fa-2xl" style="color: #ff4500;"></i>
            <i id="unlock" class="fa-solid fa-unlock  fa-2xl" style="color: #ff4500;"></i>
            <i id="open" class="fa-solid fa-lock-open fa-2xl" style="color: #38b74e;"></i>

        </div>


    </div>
    <div class="row justify-content-center py-4">

        <div class="col-md-6 py-10">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const userIcon = document.getElementById('user');
    const lockIcon = document.getElementById('lock');
    const unlockIcon = document.getElementById('unlock');
    const openIcon = document.getElementById('open');
    const keyIcon = document.getElementById('key');
    const atIcon = document.getElementById('at');
    const envIcon = document.getElementById('env');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    window.onload = function() {
        userIcon.classList.add('fade-in');
        lockIcon.style.display = 'none';
        unlockIcon.style.display = 'none';
        openIcon.style.display = 'none';
        keyIcon.style.display = 'none';
        atIcon.style.display = 'none';
        env.style.display = 'none';
    };
    function showAndHideIcon(iconToShow, iconToHide) {
            iconToShow.classList.add('fade-in');
            setTimeout(function () {
                iconToShow.classList.remove('fade-in');
                iconToHide.classList.add('fade-in');
            }, 2000);
        }
    email.addEventListener('input', function () {
        userIcon.style.display = 'none';
        const emailValue = this.value;
        const envIcon = document.getElementById('env');
        const atIcon = document.getElementById('at');
        if (emailValue.includes('@')) {
            showAndHideIcon(envIcon, atIcon);
        } else {
            showAndHideIcon(atIcon, envIcon);
        }
    });
    const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', function () {
            const passwordValue = this.value;
            const lockIcon = document.getElementById('lock');
            const unlockIcon = document.getElementById('unlock');
            const openIcon = document.getElementById('open');
            const atIcon = document.getElementById('at');
            const envIcon = document.getElementById('env');

            if (passwordValue.length > 0) {
                showAndHideIcon(lockIcon, atIcon);
                showAndHideIcon(unlockIcon, lockIcon);
                showAndHideIcon(openIcon, unlockIcon);
            } else {
                showAndHideIcon(atIcon, openIcon);
            }
        });


</script>

@endsection
