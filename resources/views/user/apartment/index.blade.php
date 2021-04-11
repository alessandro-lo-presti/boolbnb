@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($apartments as $apartment)
   {{$apartment->title}}
   {{$apartment->address}}
   {{$apartment->city}}
   <br>

   @endforeach

</div>
@endsection
