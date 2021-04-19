@extends('layouts.app')

@section('content')
@include('partials.header')
<div class="container">
    <div id="dashboard">
        <ul class="nav nav-flush flex-column mb-auto text-center">
            {{-- <div class="nav-item">
                {{-- logo --}}
                {{-- <img class="logo-big"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png"
                    alt="logo-big">
                <img class="logo-dash logo-small" src="https://i.postimg.cc/5242xRKq/Senza-titolo-1.png" alt="logo"> --}}
            {{-- </div>
            <hr class="divider"> --}}

            {{-- rotta alla home --}}
            <a href="home">
                <li class="nav-item"><i class="fas fa-home fa-2x"></i><span>Home</span></li>
            </a>


            {{-- rotta allo apartment/show --}}
            <a href="My apartments">
                <li class="nav-item"><i class="fas fa-building fa-2x"></i> <span>My apartments</span> </li>
            </a>


            <a href="Logout">
                <li class="nav-item"><i class="fas fa-sign-out-alt fa-2x"></i> <span>Logout</span> </li>
            </a>
            <a href=""><li></li></a>

        </ul>
    </div>

    {{-- Aggiungi appartamento --}}
    <div>
        <a class="btn btn-success mb-2" href="{{route('apartment.create')}}">Aggiungi</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        @foreach ($apartments as $apartment)
            <section>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}"  alt="{{ $apartment->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $apartment->title }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{ $apartment->address }}</li>
                      <li class="list-group-item">{{ $apartment->city }}</li>
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-secondary card-link" href="{{route('apartment.show',$apartment->id)}}">Mostra</a>
                        <a class="btn btn-warning card-link" href="{{route('apartment.edit',$apartment->id)}}">Modifica</a>
                        <form action="{{route('apartment.destroy',$apartment->id)}}" method='post'>
                            @csrf
                            @method('delete')
                            <div class="form-group">
                                <button class="btn btn-danger card-link" type="submit">Cancella</button>
                            </div>
                        </form>
                    </div>
                  </div>
            </section>
        @endforeach
        </tbody>



@include('partials.footer')
@endsection

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Annuncio</th>
        <th scope="col">Titolo</th>
        <th scope="col">Stanze</th>
        <th scope="col">Letti</th>
        <th scope="col">Bagni</th>
        <th scope="col">Posizione</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($apartments as $apartment)
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>
