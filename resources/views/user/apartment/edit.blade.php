@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('apartment.update', $apartment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{$apartment->title}}">
        </div>
        <div class="form-group">
            <label for="inputRooms">N_rooms</label>
            <input type="number" class="form-control" id="inputRooms" name="n_rooms" value="{{$apartment->N_rooms}}">
        </div>
        <div class="form-group">
            <label for="inputBedrooms">N_bedrooms</label>
            <input type="number" class="form-control" id="inputBedrooms" name="n_beds" value="{{$apartment->N_bedrooms}}">
        </div>
        <div class="form-group">
            <label for="inputBathrooms">N_bathrooms</label>
            <input type="number" class="form-control" id="inputBathroooms" name="n_sbathrooms" value="{{$apartment->N_bathrooms}}">
        </div>
        <div class="form-group">
            <label for="inputMq">Mqs</label>
            <input type="number" class="form-control" id="inputMq" name="mq" value="{{$apartment->Mqs}}">
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{$apartment->Address}}">
        </div>
        <div class="form-group">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" value="{{$apartment->city}}">
        </div>
        <img src="{{asset('storage/'.$apartment->image)}}" alt="{{$apartment->title}}">
        <button class="btn btn-primary" type="submit">Salva</button>




    </form>
</div>
@endsection
