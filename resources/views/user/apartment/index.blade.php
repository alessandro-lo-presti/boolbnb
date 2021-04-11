@extends('layouts.app')

@section('content')
@include('partials.header')
<div class="container">
   @foreach ($apartments as $apartment)
   {{$apartment->title}}
   {{$apartment->address}}
   {{$apartment->city}}
   <h1>Cristina</h1>


   @endforeach

</div>
@include('partials.footer')
@endsection
