@extends('layouts.app')

@section('cdn')
  <!--TomTom-->
  <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>
@endsection

@section('content')
@include('partials.header')
<div id="show" class="container">

  <!--Title-->
  <section class="row title-section">

    <div class="col-6 d-flex flex-column">
      <h2>{{ $apartment->title }}</h2>
      <p>{{ $apartment->address }} {{ $apartment->city }}</p>
    </div>

    <div class="col-6 d-flex flex-row-reverse align-items-center">
        @if($sponsor)
          <a class="btn btn_title" href="{{ route('payment.request', $apartment->id) }}">
            <i class="far fa-star"></i>
          </a>
        @else
          <a class="btn btn_title" href="">
            <i class="fas fa-star"></i>
          </a>
        @endif
      </a>
      <span>Visite {{ $apartment->visualization }}</span>
    </div>

  </section>
  <!-- / Title-->


  <!-- Images -->
  <section class="row d-flex justify-content-between image-section">

    <div class="image_box_left col-12 col-md-8 col-lg-6">
      <img src="{{ array_key_exists(0, $images) ? asset('storage/' . $images[0]["path"]) : asset('storage/covers/placeholder.png')}}">
    </div>

    <div class="image_box_right d-none d-md-block col-sm-4 col-lg-6">

      <div class="d-flex flex-row">

        <div class="image_div">
          <img src="{{ array_key_exists(1, $images) ? asset('storage/' . $images[1]["path"]) : asset('storage/covers/placeholder.png')}}">
        </div>

        <div class="image_div d-none d-lg-block">
          <img src="{{ array_key_exists(2, $images) ? asset('storage/' . $images[2]["path"]) : asset('storage/covers/placeholder.png')}}">
        </div>

      </div>

      <div class="d-flex flex-row">

        <div class="image_div">
          <img src="{{ array_key_exists(3, $images) ? asset('storage/' . $images[3]["path"]) : asset('storage/covers/placeholder.png')}}">
        </div>

        <div class="image_div d-none d-lg-block">
          <img src="{{ array_key_exists(4, $images) ? asset('storage/' . $images[4]["path"]) : asset('storage/covers/placeholder.png')}}">
        </div>

      </div>

    </div>

  </section>
  <!-- / Images -->

  <!-- info-section -->
  <section class="row info-section">

    <!-- card -->
    <div class="col-xs-12 col-lg-6 d-flex justify-content-center align-items-center user_box">

      <div class="card user_card">

        <div class="card-body">

          <div class="d-flex align-items-center user_name">

            <i class="fas fa-home fa-2x house_i"></i>

            <div>
              <p class="name">
                {{ $apartment->title }}
              </p>
              <p class="under_name">
                Creato il {{ substr($apartment->created_at, 0, 10) }}
              </p>
            </div>

          </div>

          <p class="card-text card_text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          </p>

          <div class="">
            <a href="{{route('apartment.edit',$apartment->id)}}" class="btn btn_user">Modifica Appartamento</a>
          </div>

        </div>

      </div>

    </div>
    <!-- / card -->

    <!-- info-box -->
    <div class="col-xs-12 col-lg-6 info_box d-flex row">

        <!-- service -->
        <div class="col-xs-12 col-sm-6 d-flex flex-column align-items-center services_box">
          <h3>Servizi</h3>
          <ul>
            @foreach($services as $service)
              <li class="d-flex">
                <div class="services d-flex">
                  <span class="icon">
                    @if ($service -> name == "WiFi")
                      <i class="fas fa-wifi"></i>
                    @elseif ($service -> name == "Posto Auto")
                      <i class="fas fa-car"></i>
                    @elseif ($service -> name == "Piscina")
                      <i class="fas fa-swimmer"></i>
                    @elseif ($service -> name == "Portineria")
                      <i class="fas fa-door-open"></i>
                    @elseif ($service -> name == "Sauna")
                      <i class="fas fa-hot-tub"></i>
                    @elseif ($service -> name == "Vista Mare")
                      <i class="fas fa-water"></i>
                    @endif
                  </span>
                  <span class="text">
                    {{ $service->name }}:
                  </span>
                </div>
                @if($apartment->services->contains($service->id))
                  <span><i class="fas fa-check"></i></span>
                @endif
              </li>
            @endforeach
          </ul>
        </div>
        <!-- / service -->

        <!-- info -->
        <div class="col-xs-12 col-sm-6 d-flex flex-column align-items-center info_room_box">
          <h3>Info</h3>
          <ul>

            <li class="d-flex justify-content-between">
              <div class="info d-flex">
                <span class="icon">
                  <i class="fas fa-square"></i>
                </span>
                <span class="text">Stanze:</span>
              </div>
              <span class="text-right">{{ $apartment->n_rooms }}</span>
            </li>

            <li class="d-flex justify-content-between">
              <div class="info d-flex">
                <span class="icon">
                  <i class="fas fa-bed"></i>
                </span>
                <span class="text">Letti:</span>
              </div>
              <span class="text-right">{{ $apartment->n_beds }}</span>
            </li>

            <li class="d-flex justify-content-between">
              <div class="info d-flex">
                <span class="icon">
                  <i class="fas fa-shower"></i>
                </span>
                <span class="text">Bagni:</span>
              </div>
              <span class="text-right">{{ $apartment->n_bathrooms }}</span>
            </li>

            <li class="d-flex justify-content-between">
              <div class="info d-flex">
                <span class="icon">
                  <i class="fas fa-ruler-combined"></i>
                </span>
                <span class="text">Mqs:</span>
              </div>
              <span class="text-right">{{ $apartment->mqs }}</span>
            </li>

          </ul>
        </div>
        <!-- / info -->

    </div>

  </section>
  <!-- / info-section -->

  <!-- map -->
  <section class="row map-section">

    <h2 class="col-12 text-center">Guarda la Mappa</h2>

    <div class="col-12 d-flex justify-content-center">
      <div class="map" id="map-div"></div>
    </div>

    <script>
      const API_KEY = 'GNSLhVGN7KNDGb9SFVEjknBWIKpB1HjX';
      const APPLICATION_NAME = 'BoolBnb';
      const APPLICATION_VERSION = '1.0';
      const LOCATION = {lng: {{ $apartment->longitude }}, lat: {{ $apartment->latitude }} };

      tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);

      // mappa
      var map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: LOCATION,
        zoom: 14
      });
    </script>

  </section>
  <!-- / map-->

</div>
@endsection
