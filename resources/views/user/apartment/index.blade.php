@extends('layouts.app')

@section('content')
@include('partials.header')
<div class="container">
   @foreach ($apartments as $apartment)
   {{$apartment->title}}
   {{$apartment->address}}
   {{$apartment->city}}
   <h1>Cristina</h1>
   <a class="btn btn-danger" href="{{route('apartment.destroy',$apartment)}}">Cancella</a>


   @endforeach
{{-- Aggiungi appartamento
<div>
    <a class="btn btn-primary" href="{{route('apartment.create')}}">Aggiungi</a>
</div>
{{-- Mostra appartamento --}}
{{-- <div>
    <a class="btn btn-seondary" href="{{route('apartment.show/{}')}}">Mostra</a>
</div> --}}
 {{-- Edit appartamento --}}
{{-- <div>
    <a class="btn btn-warning" href="{{route('apartment.edit')}}">Cambia</a>
</div> --}}
{{-- Cancella appartamento --}}
{{-- <form action="{{route('apartment.destroy')}}" method='post'>
    @csrf
    @method('delete')
    <div class="form-group">
        <button class="btn btn-danger" type="submit">Cancella</button>
    </div>

{{-- </form> --}}

</div>
@include('partials.footer')
@endsection
