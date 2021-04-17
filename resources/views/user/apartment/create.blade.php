@extends('layouts.app')
@section('script')
  <script src="{{ asset('js/create.js') }}"></script>
@endsection
@section('content')
<div id="create">
  <div class="container">
    <div class="row">
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
      <div class="form col-10">
        <h1>Ciao, {{ Auth::user()->name }}!<br> Iniziamo a creare un annuncio per il tuo spazio.</h1>
        {{-- form --}}
        <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <div class="form-group">
            <label for="inputTitle">Inserisci descrizione riepilogativa</label>
            <input type="text" class="form-control" id="inputTitle" name="title">
          </div>

          <div class="form-group">
            <label for="apartment_images">Scegli l'immagine del tuo appartamento</label>
            <input type="file" class="form-control-file" id="apartment_images" name="apartment_images[]" multiple>
          </div>

          <div class="form-group">
            <label for="inputRooms">Quante stanze ci sono?</label>
            <div class="counter">
              <div class="title">Stanze</div >
                <a @click="removeRoom"><i class="fas fa-minus-circle fa-lg"></i></a>
                @{{rooms}}
                <a @click="addRoom"><i class="fas fa-plus-circle fa-lg"></i></a>
              </div>
              <input type="number" class="form-control" id="inputRooms" name="n_rooms" :value="rooms">
            </div>

            <div class="form-group">
              <label for="inputBedrooms">Quanti letti ci sono?</label>
              <div class="counter">
                <div class="title">Letti</div>
                <a @click="removeBed"><i class="fas fa-minus-circle fa-lg"></i></a>
                @{{beds}}
                <a @click="addBed"><i class="fas fa-plus-circle fa-lg"></i></a>
              </div>
              <input type="number" class="form-control" id="inputBedrooms" name="n_beds" :value="beds">
            </div>

            <div class="form-group">
              <label for="inputBathrooms">Quanti bagni ci sono?</label>
              <div class="counter">
                <div class="title">Bagni</div>
                <a @click="removeBathroom"><i class="fas fa-minus-circle fa-lg"></i></a>
                @{{bathrooms}}
                <a @click="addBathroom"><i class="fas fa-plus-circle fa-lg"></i></a>
              </div>
              <input type="number" class="form-control" id="inputBathrooms" name="n_bathrooms" :value="bathrooms">
            </div>

            <div class="form-group">
              <label for="inputMq">Qual' è la superficie del tuo appartamento?</label>
              <div class="counter">
                <div class="title">Mq</div>
                <a @click="removeMq"><i class="fas fa-minus-circle fa-lg"></i></a>
                @{{mq}}
                <a @click="addMq"><i class="fas fa-plus-circle fa-lg"></i></a>
              </div>
              <input type="number" class="form-control" id="inputMq" name="mqs" :value="mq">
            </div>

            <div class="form-group">
              <label for="inputAdress">Dove si trova il tuo appartamento?</label>
              <input type="text" class="form-control" id="inputAddress" name="address">
            </div>

            <div class="form-group">
              <label for="inputCity">In quale città?</label>
              <input type="text" class="form-control" id="inputCity" name="city">
            </div>
            <div class="services row">
              @foreach ($services as $service)
                <div class="form-group form-check col-3 offset-md-1">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="services[]" value="{{$service->id}}">
                  <label class="form-check-label" for="exampleCheck1"><i class="fas fa-wifi"></i>{{$service->name}}</label>
                </div>
              @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>

          </form>
        </div>
    </div>
  </div>
</div>
<div class="container">

    {{-- <h1 class="text-center">Inserisci un nuovo appartamente</h1> --}}

    {{-- validation --}}
    {{-- @if ($errors->any())
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    </div>
   @endif --}}

   {{-- form --}}
    {{-- <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title">
        </div>

        <div class="form-group">
          <label for="apartment_images">Scegli le immagini</label>
          <input type="file" class="form-control-file" id="apartment_images" name="apartment_images[]" multiple>
        </div>

        <div class="form-group">
          <label for="inputRooms">N_rooms</label>
          <input type="number" class="form-control" id="inputRooms" name="n_rooms">
        </div>

        <div class="form-group">
          <label for="inputBedrooms">N_bedrooms</label>
          <input type="number" class="form-control" id="inputBedrooms" name="n_beds">
        </div>

        <div class="form-group">
          <label for="inputBathrooms">N_bathrooms</label>
          <input type="number" class="form-control" id="inputBathrooms" name="n_bathrooms">
        </div>

        <div class="form-group">
          <label for="inputMq">Mq</label>
          <input type="number" class="form-control" id="inputMq" name="mqs">
        </div>

        <div class="form-group">
          <label for="inputAdress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="address">
        </div>

        <div class="form-group">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" id="inputCity" name="city">
        </div>

        @foreach ($services as $service)
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="services[]" value="{{$service->id}}">
            <label class="form-check-label" for="exampleCheck1">{{$service->name}}</label>
          </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Salva</button>

      </form> --}}

</div>
@endsection
