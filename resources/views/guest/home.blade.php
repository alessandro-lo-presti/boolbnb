@extends('layouts.app')

@section('script')
  <script src="{{ asset('js/home.js') }}"></script>
@endsection
@section('title' ,'BoolBnb')



@section('content')

  <div id="home" class="mb-3">

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

              <h5>@{{ item.city }}</h5>

            </div>

          </div>
        </div>

      </section>

      {{-- section types --}}
      <section class="types mt-4">
        <h4>Una casa ovunque nel mondo</h4>

        <div class="h_types d-flex mb-2 mt-3">

          <div class="prev">
            <i class="fas fa-arrow-left" v-on:click="prevImg()"></i>
          </div>

          <div class="img-array" style='align-items: center;'>
            <div :style='`left: ${pippo}px`' class="invisibile" style="height: 300px; left: 0px;">
                <div v-for='(item, index) in sponsored' class="container-img">
                  <img :src="(item.image) ? host + '/storage/' + item.image : host + '/storage/covers/placeholder.png'" alt="apartment_sponsored">
                  <h5 class="pt-2">@{{ item.city }}</h5>
                  <p class="pt-2">@{{ item.title }}</p>
                </div>
            </div>
          </div>

          {{-- <div class="apartment_type" v-for="item in sponsored">
            <img :src="item.image" alt="apartment_sponsored">

          </div> --}}
          <div class="next">
            <i class="fas fa-arrow-right" v-on:click="nextImg()"></i>
            </div>

        </div>

      </section>

      {{-- section beHost --}}
      <section class="behost mt-4">
        <div class="container">
          <div class="image_behost">
            <div class="description text-white">
              <h2>Diventa host</h2>
              <p>Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunità.</p>
              <button class="btn btn-primary">scopri di più</button>
            </div>
          </div>
        </div>
      </section>


      {{-- section experience --}}
      <section class="experience mt-5 mb-4">
        <h4>scopri le esperienze</h4>

        <p>attivit&aacute; uniche con esperti del luogo, di persona oppure online</p>

        <div class="row justify-content-center position-relative">

          <div class="apartment_type col-sm-12 col-md-6 col-lg-4 mt-3 mb-2" v-for="(item, index) in experiences">
            <img :src="item.cover" :alt="item.type">
            <h5 class="pt-2">@{{ item.title }}</h5>
            <p class="pt-2">@{{ item.type }}</p>
          </div>

        </div>
      </section>
    </div>

  </div>

@endsection
