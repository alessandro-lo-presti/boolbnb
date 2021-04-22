@extends('layouts.app')

@section('content')
    @include('partials.header')
    {{-- <div id="dashboard">
        <ul class="nav nav-flush flex-column mb-auto text-center">
            {{-- rotta allo apartment/show --}}
    {{-- <a href="{{ route('apartment.index') }}">
                <li class="nav-item"><i class="fas fa-building fa-2x"></i> <span>My apartments</span> </li>
            </a> --}}


    {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <li class="nav-item"><i class="fas fa-sign-out-alt fa-2x"></i> <span>Logout</span> </li>
            </a> --}}
    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul> --}}
    {{-- </div> --}}

    {{-- Aggiungi appartamento --}}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="apa-index" class="container d-flex flex-column">
        <div class="d-flex p_top justify-content-between">
            <h3 class=""> Benvenuto {{ Auth::user()->name }}</h3>
            <a class="btn btn-success mb-2" href="{{ route('apartment.create') }}">
                <span class="add">Aggiungi un appartamento</span>
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="row">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col-2">Annuncio</th>
                        <th scope="col-2">Titolo</th>
                        <th scope="col-2">Stanze</th>
                        <th scope="col-2">Letti</th>
                        <th scope="col-2">Bagni</th>
                        <th scope="col-2">Posizione</th>
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
                            <td><a href="{{ route('apartment.show', $apartment->id) }}">{{ $apartment->title }}</a>
                            </td>
                            <td>{{ $apartment->n_rooms }}</td>
                            <td>{{ $apartment->n_beds }}</td>
                            <td>{{ $apartment->n_bathrooms }}</td>
                            <td>{{ $apartment->address }}
                                {{ $apartment->city }}</td>
                            <td class="del">
                                <form action="{{ route('apartment.destroy', $apartment->id) }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <div class="form-group">
                                        <input class="btn btn-danger" value="&#xf2ed;" type="submit">
                                    </div>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>


@endsection
