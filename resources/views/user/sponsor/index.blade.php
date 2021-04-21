@extends('layouts.app')

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
    <div id="sponsor">
        <div class="container">
            <h3>Rendi più visibile il tuo appartamento {{ $apartment->title }} a {{ $apartment->city }}</h3>
            <p>Acquista una delle nostre sponsorizzazioni</p>
            <div class="layout-cards">
                <div class="card" style="width: 18rem;" v-for="(sponsor, index) in sponsors">
                    <div class="card-body center-card" v-on:mouseenter="enter(index)" v-on:mouseleave="leave(index)" :class="test">
                        <h5 class="card-title">@{{ sponsor.title }}</h5>
                        <p class="card-text">@{{ sponsor.duration }} days</p>
                        <p class="card-text">@{{ sponsor.amount }}€</p>
                        <a href="#" class="btn btn-success">Acquista</a>
                    </div>
                </div>
            </div>
        </div>


        

    </div>

    <script src="{{ asset('js/sponsor.js') }}"></script>
</body>
</html>



{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}