@extends('layouts.app')

@section('content')
<div id="show" class="container">

  <!--Title-->
  <section class="row title-section">
    <div class="col-12">
      <h2>{{ $apartment->title }}</h2>
    </div>
    <div class="col-12">
      <p>{{ $apartment->address }} {{ $apartment->city }}</p>
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


  <section class="row info-section">

    <div class="col-xs-12 col-sm-6 d-flex flex-column align-items-center info_box">
      <h3>Servizi</h3>
      <ul>
        @foreach($services as $service)
          <li class="d-flex justify-content-between">
            <span class="info">{{ $service->name }}:</span>
            @if($apartment->services->contains($service->id))
            <span><i class="fas fa-check"></i></span>
            @endif
          </li>
        @endforeach
      </ul>
    </div>

    <div class="col-xs-12 col-sm-6 d-flex flex-column align-items-center info_box">
      <h3>Informazioni</h3>
      <ul>
        <li class="d-flex justify-content-between">
          <span class="info">Stanze:</span>
          <span>{{ $apartment->n_rooms }}</span>
        </li>
        <li class="d-flex justify-content-between">
          <span class="info">Letti:</span>
          <span>{{ $apartment->n_beds }}</span>
        </li>
        <li class="d-flex justify-content-between">
          <span class="info">Bagni:</span>
          <span>{{ $apartment->n_bathrooms }}</span>
        </li>
        <li class="d-flex justify-content-between">
          <span class="info">Mqs:</span>
          <span>{{ $apartment->mqs }}</span>
        </li>
      </ul>
    </div>

  </section>


</div>
@endsection
