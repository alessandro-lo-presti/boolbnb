@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($apartments as $apartment)
   {{$apartment->title}}
   {{$apartment->address}}
   {{$apartment->city}}
   <h1>Cristina</h1>


   @endforeach

</div>
@endsection
