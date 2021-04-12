@extends('layouts.app')

@section('content')
<h1>Inserisci un nuovo appartamente</h1>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="container">
    <form action="{{route('apartment.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title">
        </div>
        <div class="form-group">
          <label for="image">Scegli l'immagine</label>
          <input type="file" class="form-control-file" id="image" name="image">
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
        <div class="form-group">
          <label for="inputLongitude">Longitude</label>
          <input type="number" class="form-control" id="inputLongitude" name="longitude">
        </div>
        <div class="form-group">
          <label for="inputLatitude">Latitude</label>
          <input type="text" class="form-control" id="inputLatitude" name="latitude">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
</div>
@endsection
