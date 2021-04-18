@extends('layouts.app')
@section('script')
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
@section('content')
  <div id="search" class="container">
    <div class="">
      <input type="text" name="title" placeholder="search" v-model="searchInput">
      <button type="submit" name="button" @click="search">Invia</button>
    </div>
    <div class="card mt-2" v-for="apartment in apartments">
      <div class="card-header">
        @{{apartment.title}}
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
@endsection
