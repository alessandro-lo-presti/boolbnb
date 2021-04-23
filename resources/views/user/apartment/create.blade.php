@extends('layouts.app')
@section('script')
  <script src="{{ asset('js/create.js') }}"></script>
@endsection
@section('content')
@include('partials.header')
<div id="create">
  <div class="container">
    <div class="row justify-content-center">
      {{-- validation --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="col-md-8 col-lg-6">
        <div class="card">
          <div class="card-header text-center font-weight-bold">
            Nuovo annuncio
          </div>
          <div class="card-body">
            {{-- form --}}
            <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="inputTitle">Inserisci descrizione</label>
                  <input type="text" class="form-control" id="inputTitle" name="title">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="inputAdress">Inserisci indirizzo</label>
                  <input type="text" class="form-control" id="inputAddress" name="address">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="inputCity">Inserisci città</label>
                  <input type="text" class="form-control" id="inputCity" name="city">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                <label for="apartment_images">Inserisci immagini del tuo appartamento</label>
                <input type="file" class="form-control-file" id="apartment_images" name="apartment_images[]" multiple>
                </div>
              </div>

              <div class="counter-details row d-flex justify-content-around">

                <div class="form-group row col-6">
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title">Stanze</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeRoom"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{rooms}}
                      <a @click="addRoom"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputRooms" name="n_rooms" :value="rooms">
                </div>

                <div class="form-group row col-6">
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title">Letti</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeBed"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{beds}}
                      <a @click="addBed"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputBedrooms" name="n_beds" :value="beds">
                </div>

                <div class="form-group row col-6">
                  <div class="counter d-flex justify-content-start">
                    <div class="counter-title">Bagni</div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeBathroom"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{bathrooms}}
                      <a @click="addBathroom"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputBathrooms" name="n_bathrooms" :value="bathrooms">
                </div>

                <div class="form-group row col-6">
                  <div class="counter d-flex justify-content-start ">
                    <div class="counter-title">M<sup>2</sup></div>
                    <div class="counter-number d-flex justify-content-around">
                      <a @click="removeMq"><i class="fas fa-minus-circle fa-lg"></i></a>
                      @{{mq}}
                      <a @click="addMq"><i class="fas fa-plus-circle fa-lg"></i></a>
                    </div>
                  </div>
                  <input type="number" class="form-control" id="inputMq" name="mqs" :value="mq">
                </div>
              </div>


                <div class="services row">
                  @foreach ($services as $service)
                    <div class="form-group row form-check offset-1 col-5">
                      <input type="checkbox" class="form-check-input" id="{{$service->id}}" name="services[]" value="{{$service->id}}">
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

                <button type="submit" class="btn btn-primary">Salva</button>

              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
