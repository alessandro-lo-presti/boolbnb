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
      <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}">
    </div>

    <div class="image_box_right d-none d-md-block col-sm-4 col-lg-6">

      <div class="d-flex flex-row">

        <div class="image_div">
          <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}">
        </div>

        <div class="image_div d-none d-lg-block">
          <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}">
        </div>

      </div>

      <div class="d-flex flex-row">

        <div class="image_div">
          <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}">
        </div>

        <div class="image_div d-none d-lg-block">
          <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}">
        </div>

      </div>

    </div>

  </section>

  <section class"row">

    <div class="col-6">
      prova
    </div>

    <div class="col-6">
      prova
    </div>

  </section>

</div>
@endsection


{{--
    <td scope="row"><img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}" alt="{{ $apartment->title }}"></td>
    <th>{{ $apartment->id }}</th>
    <td>{{ $apartment->title }}</td>
    <td>{{ $apartment->user_id }}</td>
    <td>{{ $apartment->n_rooms }}</td>
    <td>{{ $apartment->n_beds }}</td>
    <td>{{ $apartment->n_bathrooms }}</td>
    <td>{{ $apartment->mqs }}</td>
    <td>{{ $apartment->address }}</td>
    <td>{{ $apartment->city }}</td>
    <td>{{ $apartment->longitude }}</td>
    <td>{{ $apartment->latitude }}</td>
    <td>{{ $apartment->visibility }}</td>
    {{-- <td>{{ $apartment->visualization }}</td> --}}
