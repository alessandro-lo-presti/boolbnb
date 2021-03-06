<!-- header -->
<header>

  <nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container">

      <a class="navbar-brand" href="{{ route('index') }}">
        <img class="main"
            src="https://i.postimg.cc/8ccPsg1K/Airbnb-logo-intero-bianco.png"
            alt="logo">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('search') }}">Ricerca</a>
          </li>
          <li class="nav-item dropdown">
            @guest
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Area Clienti
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('login')}}">Login</a>
                @if (Route::has('register'))
                  <a class="dropdown-item" href="{{ 'register' }}">Registrati</a>
                @endif
              </div>
            @else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('apartment.index')}}">Host</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
            @endguest
          </li>
        </ul>
      </div>

    </div>

  </nav>

</header>
<!-- /header -->
