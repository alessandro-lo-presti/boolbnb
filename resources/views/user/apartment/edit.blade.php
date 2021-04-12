@extends('layouts.app')

@section('content')
<div class="container">

    {{-- validation --}}
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- form --}}
    <form action="{{route('apartment.update', $apartment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{$apartment->title}}">
        </div>

        <div class="form-group">
            <label for="inputRooms">N_rooms</label>
            <input type="number" class="form-control" id="inputRooms" name="n_rooms" value="{{$apartment->n_rooms}}">
        </div>

        <div class="form-group">
            <label for="inputBedrooms">N_bedrooms</label>
            <input type="number" class="form-control" id="inputBedrooms" name="n_beds" value="{{$apartment->n_beds}}">
        </div>

        <div class="form-group">
            <label for="inputBathrooms">N_bathrooms</label>
            <input type="number" class="form-control" id="inputBathroooms" name="n_bathrooms" value="{{$apartment->n_bathrooms}}">
        </div>

        <div class="form-group">
            <label for="inputMq">Mqs</label>
            <input type="number" class="form-control" id="inputMq" name="mqs" value="{{$apartment->mqs}}">
        </div>

        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{$apartment->address}}">
        </div>

        <div class="form-group">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{$apartment->city}}">
        </div>

        <div class="form-group">
          <label for="image">cambia l'immagine</label>
          <input type="file" value="{{asset('storage/'.$apartment->image)}}" class="form-control-file" id="image" name="image">
        </div>

        <button class="btn btn-primary" type="submit">Salva</button>

    </form>

</div>
@endsection
