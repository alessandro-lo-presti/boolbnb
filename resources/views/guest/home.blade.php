@extends('layouts.app')

@section('script')
  <script src="{{ asset('js/home.js') }}"></script>
@endsection


@section('content')

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
          <div class="boxes d-flex col-lg-3 col-sm-6 col-6 mb-2" v-for="(item, index) in destinations">

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

        <div class="primo carousel flex-no-wrap mt-3 position-relative">

          <div class="boxes d-flex col-lg-3 col-sm-6 mb-2" v-for="(item, index) in types">

            <div class="apartment_type">
              <img :src="item.cover" :alt="item.type">
              <h5 class="pt-2">@{{ item.type }}</h5>
            </div>

          </div>

        </div>



        <div class="secondo carousel mt-4">

          <button v-on:click="prev()" class="btn btn-primary mr-2">
            <i class="fas fa-angle-left"></i>
          </button>

          <div class="image mr-1">
            <img :src="types[counter].cover" alt="foto">
            <p>@{{ types[counter].type }}</p>
          </div>

          <div class="image ml-1">
            <img :src="types[nextCounter].cover" alt="foto">
            <p>@{{ types[nextCounter].type }}</p>
          </div>

          <button v-on:click="next()" class="btn btn-primary ml-2">
            <i class="fas fa-angle-right"></i>
          </button>

        </div>

        <div class="terzo carousel mt-4">

          <button v-on:click="prev()" class="btn btn-primary mr-2">
            <i class="fas fa-angle-left"></i>
          </button>

          <div class="ciao">
            <img :src="types[counter].cover" alt="foto">
            <p>@{{ types[counter].type }}</p>
          </div>


          <button v-on:click="next()" class="btn btn-primary ml-2">
            <i class="fas fa-angle-right"></i>
          </button>
        </div>




      </section>

      {{-- section beHost --}}
      <section class="behost mt-4">
        <div class="container">
          <div class="image_behost">
            <div class="description text-white">
              <h2>ciao</h2>
              <p>a tutti</p>
              <button class="btn btn-primary">ciao</button>
            </div>
          </div>
        </div>
      </section>


      {{-- test push --}}

      {{-- section experience --}}
      <section class="experience mt-5">
        <h4>scopri le esperienze</h4>

        <p>attivit&aacute; uniche con esperti del luogo, di persona oppure online</p>

        <div class="d-flex justify-content-center flex-wrap mt-3 position-relative">

          <div class="boxes d-flex col-lg-3 col-sm-6 mb-2" v-for="(item, index) in experiences">

            <div class="apartment_type">
              <img :src="item.cover" :alt="item.type">
              <h5 class="pt-2">@{{ item.title }}</h5>
              <p class="pt-2">@{{ item.type }}</p>
            </div>
          </div>

        </div>
      </section>
    </div>

  </div>

@endsection
