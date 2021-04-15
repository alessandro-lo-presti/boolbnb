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
    <header>

    </header>
    <main>
        {{-- dashboard --}}
        <div id="dashboard">
            <ul class="nav nav-flush flex-column mb-auto text-center">
                <li class="nav-item">
                    {{-- logo --}}
                    <img class="logo-dash" src="https://i.postimg.cc/5242xRKq/Senza-titolo-1.png" alt="logo">
                </li>
                <li class="nav-item">
                    {{-- rotta alla home --}}
                    <a href="Home"><i class="fas fa-home fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    {{-- rotta allo apartment/show --}}
                    <a href="My apartments"><i class="fas fa-building fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a href="Logout"><i class="fas fa-sign-out-alt fa-2x"></i></a>
                </li>
            </ul>
        </div>
        {{-- my apartment --}}
        <section class="my_apartment">


        </section>
    </main>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
