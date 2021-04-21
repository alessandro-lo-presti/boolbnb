    <!-- header -->
    <header>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <!-- LOGO -->
                <div class="box logo">
                    <!-- Rotta home del guest -->
                    <a href="{{ route('index') }}">
                        <img class="main"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png"
                            alt="logo">
                        <img class="logo-small" src="https://i.postimg.cc/5242xRKq/Senza-titolo-1.png"
                            alt="Logo piccolo">
                    </a>
                </div>

                <!-- SEARCHBAR -->
                <div class="search">
                    <a href="{{ route('search') }}">
                        <i class="fas fa-search"></i></a>
                </div>


                <!-- Rotta show/Ricerca -->
                <div class="box login d-flex align-items-center">
                    <!-- DROPDOWN UTENTE -->
                    <div class="user d-flex justify-content-around">
                        @guest
                            <div class="nav-item">
                                <a class="btn_l" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="btn_r" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            @endif
                        @else
                            <!-- Rotta Log In utente -->
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown btn_dd" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-2x btn_dd"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <span class="account"> {{ Auth::user()->name }}</span>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{route ('apartment.index')}}">I miei appartamenti</a>
                                </div>
                            </div>

                            <!-- Rotta sponsor utente -->
                        </div>
                    </div>
                @endguest
            </div>
        </div>
        </div>
        </div>
    </header>
    <!-- /header -->
