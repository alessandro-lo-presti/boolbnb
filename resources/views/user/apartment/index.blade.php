@extends('layouts.app')

@section('content')
    @include('partials.header')
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
            <a href="">
                <li></li>
            </a>

        </ul>
    </div>

    {{-- Aggiungi appartamento --}}
    <div>
        <a class="btn btn-success mb-2" href="{{ route('apartment.create') }}">Aggiungi</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
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
                        <th scope="row" id="ad">
                            <img class="card-img-top"
                                src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/' . $apartment->image) }}"
                                alt="{{ $apartment->title }}">
                        </th>

                        <td><a href="{{ route('apartment.show', $apartment->id) }}">{{ $apartment->title }} </a></td>
                        <td>{{ $apartment->n_rooms }}</td>
                        <td>{{ $apartment->n_beds }}</td>
                        <td>{{ $apartment->n_bathrooms }}</td>
                        <td>{{ $apartment->address }}
                            {{ $apartment->city }}</td>
                        <td>
                            <form action="{{ route('apartment.destroy', $apartment->id) }}" method='post'>
                                @csrf
                                @method('delete')
                                <div class="form-group">
                                    <button type="submit"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>




        @include('partials.footer')
    @endsection
