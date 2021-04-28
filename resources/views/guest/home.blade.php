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

      {{-- section types --}}
      <section class="types mt-4">
        <h2>Scopri gli alloggi in primo piano</h2>

        <div class="h_types d-flex mb-2">

          <div class="prev">
            <i class="fas fa-angle-left" v-on:click="prevImg()"></i>
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
            <i class="fas fa-angle-right" v-on:click="nextImg()"></i>
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
        <h2>Scopri le esperienze</h2>

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
