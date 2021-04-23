@extends('layouts.app')
@section('script')
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
@include('partials.header')
@section('content')
  <div id="advanced-search" class="container">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
          Ricerca avanzata
        </div>
        <div class="card-body search">
          <div class="col-md-12">
            <input type="text" class='form-control' name="title" placeholder="Inserisci appartamento" v-model="searchInput" @keyup='autocomplete' @keyup.enter='search' autocomplete="off">
          </div>
          <div :class="(searchInput.length) ? 'active' : ''" class="autocomplete">

            <div v-for='suggest in suggests'>
              <span @click='changeSearchInput(suggest)'>@{{ suggest }}</span>
            </div>

          </div>

          <h2 class="ml-3">Inserisci filtri</h2>
          <div class="d-flex justify-content-around">
            <div class="filters-left">
              <h3 class="text-center">Caratteristiche</h3>
              <div class="counter-details row d-flex justify-content-between col-md-6 p-3">
                {{-- n stanze --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-center">
                    <div class="counter-title">Stanze</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeRoom"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{rooms}}
                      <a @click="addRoom"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputRooms" name="n_rooms" :value="rooms">
                </div>
                {{-- n letti --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-center">
                    <div class="counter-title">Letti</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeBed"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{beds}}
                      <a @click="addBed"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputBedrooms" name="n_beds" :value="beds">
                </div>
                {{-- bagni --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-center">
                    <div class="counter-title">Bagni</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeBathroom"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{bathrooms}}
                      <a @click="addBathroom"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputBathrooms" name="n_bathrooms" :value="bathrooms">
                </div>
                {{-- m2 --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-center ">
                    <div class="counter-title">M<sup>2</sup></div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeMq"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{mq}}
                      <a @click="addMq"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputMq" name="mqs" :value="mq">
                </div>
                {{-- raggio --}}
                <div class="form-group row col-md-12">
                  <div class="counter d-flex justify-content-center ">
                    <div class="counter-title">Raggio</sup></div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeRadius"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{radius}}
                      <a @click="addRadius"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputRadius" name="radius" :value="radius">
                </div>

              </div>
            </div>
            <div class="filters-right">
              <h3 class="text-center">Servizi</h3>
              {{-- servizi --}}
              <div class="services row d-flex justify-content-around col-md-6">
                @foreach ($services as $service)
                  <div class="form-group row form-check offset-md-2 col-md-4">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="services[]" value="{{$service->id}}">
                    <label class="form-check-label" for="{{$service->id}}">
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
                      {{$service->name}}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="card mt-4" style="width: 18rem;" v-for="apartment in apartments">
        <img src="{{asset('storage/covers/placeholder.png')}}" class="card-img-top" alt="appartamento">
        <div class="card-body">
          <h5 class="card-title">@{{apartment.title}}</h5>
          <p class="card-text">
            @{{apartment.address}}
          </p>
          <a :href='"/apartment/" + apartment.id' class="btn btn-primary">Visualizza</a>
        </div>
      </div>
    </div>
    {{-- card ufficale --}}
    {{-- <div class="card mt-4" v-for="apartment in apartments">
      <div class="card-header text-center font-weight-bold">
        @{{apartment.title}}
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a :href='baseUrl + "/apartment/" + apartment.id' class="btn btn-primary">Go somewhere</a>
      </div>
    </div> --}}
  </div>
@endsection
