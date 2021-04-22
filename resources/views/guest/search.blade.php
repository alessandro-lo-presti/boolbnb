@extends('layouts.app')
@section('script')
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
@include('partials.header')
@section('content')
  <div id="advanced-search" class="container">
    <div class="card">
        <div class="card-header">
          Advanced Search
        </div>
        <div class="card-body search">
          <input type="text" class='form-control' name="title" placeholder="Search..." v-model="searchInput" @keyup='autocomplete' @keyup.enter='search' autocomplete="off">

          <div :class="(searchInput.length) ? 'active' : ''" class="autocomplete" v-if="suggests.length">

            <div v-for='suggest in suggests'>
              <span @click='changeSearchInput(suggest)'>@{{ suggest }}</span>
            </div>

          </div>
        </div>
    </div>
    <div class="card mt-4" v-for="apartment in apartments">
      <div class="card-header">
        @{{apartment.title}}
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a :href='"/apartment/" + apartment.id' class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
@endsection
