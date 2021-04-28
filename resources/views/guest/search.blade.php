@extends('layouts.app')
@section('title', 'advanced search')
@section('cdn')
  <!--TomTom-->
  <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>
@endsection
@section('title' ,'Ricerca Avanzata')
@section('script')
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection

@section('content')
  <div id="advanced-search" class="container mt-5 mb-5">
    <div class="card search-bar">
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
          <div class="col-md-12">
            <input type="text" class='form-control mt-3' name="address" placeholder="Inserisci indirizzo" autocomplete="off" v-model="inputAddress" @keyup="getCordsAddress()">
            <a class="btn btn-primary address" v-on:click="addressFilter()">Cerca</a>
          </div>
          <div class="filters-dropdown d-flex justify-content-around" :class="dropdownBox">
            <div class="filters-left">
              <h3 class="text-center">Caratteristiche</h3>
              <div class="counter-details row d-flex justify-content-center col-md-12 p-3">
                {{-- n stanze --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title text-left">Stanze</div>
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
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title text-left">Letti</div>
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
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title text-left text-left">Bagni</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeBathroom"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{bathrooms}}
                      <a @click="addBathroom"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputBathrooms" name="n_bathrooms" :value="bathrooms">
                </div>
                {{-- raggio --}}
                <div class="form-group row col-md-6">
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title text-left">Raggio</div>
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
            <div class="filters-right mr-5">
              <h3 class="text-center">Servizi</h3>
              {{-- servizi --}}
              <div class="services row d-flex justify-content-around ml-5">
                @foreach ($services as $service)
                  <div class="form-group row form-check col-md-4 text-left">
                    <input v-model="{{ str_replace(" ","", $service->name) }}" type="checkbox" class="form-check-input" id="exampleCheck1" name="services[]" value="{{$service->id}}">
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
          <div class="filters-dropdown">
            <a href="#" @click="dropdown"><i class="fas fa-angle-down fa-lg" :class="dropdownAngle"></i></a>
          </div>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="card mt-4" style="width: 18rem;" v-for="apartment in apartments"
       v-if="(rooms <= apartment.n_rooms) && (beds <= apartment.n_beds) &&
              (bathrooms <= apartment.n_bathrooms) && ( (WiFi) ? apartment.services.includes(1) : true ) &&
              ( (Piscina) ? apartment.services.includes(2) : true ) && ( (PostoAuto) ? apartment.services.includes(3) : true ) &&
              ( (Portineria) ? apartment.services.includes(4) : true ) && ( (Sauna) ? apartment.services.includes(5) : true ) &&
              ( (VistaMare) ? apartment.services.includes(6) : true ) && (checkBound(apartment.latitude, apartment.longitude))
              ">
          <img :src="(apartment.image) ? host + '/storage/' + apartment.image : host + '/storage/covers/placeholder.png'" class="card-img-top" alt="appartamento">
        <div class="card-body">
          <h5 class="card-title ml-3">@{{apartment.title}}</h5>
          <p class="card-text ml-3 pb-2">
            @{{apartment.address}}
          </p>
          <a :href='"/apartment/" + apartment.id' class="btn btn-primary">Visualizza</a>
        </div>
      </div>
    </div>
  </div>
@endsection
