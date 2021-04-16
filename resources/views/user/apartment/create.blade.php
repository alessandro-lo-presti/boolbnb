@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Inserisci un nuovo appartamente</h1>

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

   {{-- form --}}
    <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title">
        </div>

        <div class="form-group">
          <label for="apartment_image">Scegli l'immagine</label>
          <input type="file" class="form-control-file" id="apartment_image" name="apartment_image" multiple>
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

      </form>

</div>
@endsection
