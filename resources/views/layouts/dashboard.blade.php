<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- link font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    {{-- link css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header class="d-flex float-right">
        <input type="search-bar">
         <div class="icona-notifche">notifiche</div>
         <div class="account">account?</div>




    </header>
    <main>
        {{-- dashboard --}}
        <div id="dashboard">
            <ul class="nav nav-flush flex-column mb-auto text-center">
                <div class="nav-item">
                    {{-- logo --}}
                    <img class="logo-big"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png"
                        alt="logo-big">
                    <img class="logo-dash logo-small" src="https://i.postimg.cc/5242xRKq/Senza-titolo-1.png" alt="logo">
                </div>
                <hr class="divider">

                {{-- rotta alla home --}}
                <a href="Home">
                    <li class="nav-item"><i class="fas fa-home fa-2x"></i><span>Home</span></li>
                </a>


                {{-- rotta allo apartment/show --}}
                <a href="My apartments">
                    <li class="nav-item"><i class="fas fa-building fa-2x"></i> <span>My apartments</span> </li>
                </a>


                <a href="Logout">
                    <li class="nav-item"><i class="fas fa-sign-out-alt fa-2x"></i> <span>Logout</span> </li>
                </a>

            </ul>
        </div>
        {{-- my apartment --}}
        <section id="chart" class="my-apartment float-right">
            <h1>I miei appartamenti</h1>
            <div class="container d-flex flex-row justify-content-around flex-wrap">
            <div v-for="chart in charts" class="cards bg-success"></div>
            <div class="cards bg-primary"></div>
            <div class="cards bg-warning"></div>
            <div class="cards bg-danger"></div>
        </div>

        </section>
    </main>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
