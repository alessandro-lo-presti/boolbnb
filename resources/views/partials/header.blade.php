<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>



<!-- header -->
<header>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <!-- LOGO -->
            <div class="box logo">
                <!-- Rotta home del guest -->
                <a href="#">
                    <img class="main" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png"
                        alt="logo">
                        <img class="logo-small" src="https://i.postimg.cc/5242xRKq/Senza-titolo-1.png" alt="Logo piccolo">
                </a>
            </div>

            <!-- SEARCHBAR -->


            <!-- Rotta show/Ricerca -->
            <div class="box login d-flex align-items-center">
                <!-- DROPDOWN UTENTE -->
                <div class="user">
                    @guest
                    <div class="dropdown">
                        <a class="btn btn_dd" href="#" role="button" id="dropdownMenu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenu">
                            <!-- Rotta registrazione utente -->
                            @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                            <!-- Rotta Log In utente -->
                            <a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                            <!-- Rotta sponsor utente -->
                            <a class="dropdown-item" href="#">Sponsor</a>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /header -->

</body>
</html>
