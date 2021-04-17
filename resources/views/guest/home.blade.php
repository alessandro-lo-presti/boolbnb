{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    @include('partials.header')
    <div id="home">

        {{-- section jumbotron --}}
        <section class="jumbo">
            <div class="d-flex justify-content-center">
                <img src="https://a0.muscache.com/im/pictures/166791ff-bc82-4b88-ba3d-49be1d462dce.jpg?im_w=2560" alt="img-jumbotron">
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center text-white py-4">
                    <h2>Grazie agli host puoi</h2>
                </div>
            </div>
        </section>

        <div class="container">

            {{-- section explore --}}
            <section class="explore">
                <h4>Esplora i dintorni</h4>
                <div class="d-flex justify-content-center flex-wrap mt-3">
                    <div class="boxes d-flex col-lg-3 col-sm-6 mb-2" v-for="(item, index) in destinations">

                        <div class="left_side">
                            <img :src="item.cover" :alt="item.city">
                        </div>

                        <div class="right_side d-flex flex-column justify-content-center pl-3">

                            <h5 class="">@{{ item.city }}</h5>
                            <p class="">@{{ item.description }}</p>

                        </div>

                    </div>
                </div>

            </section>

            {{-- section types --}}
            <section class="types mt-4">
                <h4>Una casa ovunque nel mondo</h4>

                <div class="d-flex justify-content-center flex-no-wrap mt-3 position-relative">

                    <div class="boxes d-flex col-lg-3 col-sm-6 mb-2" v-for="(item, index) in types">

                        <div class="apartment_type">
                            <img :src="item.cover" :alt="item.type">
                            <h5 class="pt-2">@{{ item.type }}</h5>
                        </div>

                    </div>

                </div>



                <div class="primo d-flex justify-content-center mt-4">

                    <button v-on:click="prev()" class="btn btn-primary">
                        <i class="fas fa-angle-left"></i>
                    </button>

                    <div class="ciao">
                        <img :src="types[counter].cover" alt="foto">
                        <p>@{{ types[counter].type }}</p>
                    </div>

                    <div class="ciao">
                        <img :src="types[nextCounter].cover" alt="foto">
                        <p>@{{ types[nextCounter].type }}</p>
                    </div>

                    <button v-on:click="next()" class="btn btn-primary">
                        <i class="fas fa-angle-right"></i>
                    </button>

                </div>

                <div class="secondo d-flex justify-content-center mt-4">

                    <button v-on:click="prev()" class="btn btn-primary">
                        <i class="fas fa-angle-left"></i>
                    </button>

                    <div class="ciao">
                        <img :src="types[counter].cover" alt="foto">
                        <p>@{{ types[counter].type }}</p>
                    </div>


                    <button v-on:click="next()" class="btn btn-primary">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>




            </section>

            {{-- section beHost --}}
            <section class="behost mt-4 position-relative">
                <div class="description position-absolute text-white">
                    <h2>ciao</h2>
                    <p>a tutti</p>
                    <button class="btn btn-primary">ciao</button>
                </div>
            </section>

            {{-- section experience --}}
            <section class="experience mt-5">
                <h4>scopri le esperienze</h4>
                <p>attivit&aacute; uniche con esperti del luogo, di persona oppure online</p>

                <div class="d-flex justify-content-center flex-no-wrap mt-3 position-relative">

                    <div class="scroll position-absolute sx bg-primary"></div>

                    <div class="boxes d-flex col-lg-3 col-sm-6 mb-2" v-for="(item, index) in experiences">

                        <div class="apartment_type">
                            <img :src="item.cover" :alt="item.type">
                            <h5 class="pt-2">@{{ item.title }}</h5>
                            <p class="pt-2">@{{ item.type }}</p>
                        </div>

                    </div>

                    <div class="scroll position-absolute dx bg-primary"></div>

                </div>

        </div>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
