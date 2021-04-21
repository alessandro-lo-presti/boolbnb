@extends('layouts.app')

@section('content')
    @include('partials.header')
    <div id="dashboard">
        <ul class="nav nav-flush flex-column mb-auto text-center">
            {{-- rotta allo apartment/show --}}
            <a href="{{ route('apartment.index') }}">
                <li class="nav-item"><i class="fas fa-building fa-2x"></i> <span>My apartments</span> </li>
            </a>


            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <li class="nav-item"><i class="fas fa-sign-out-alt fa-2x"></i> <span>Logout</span> </li>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>

    {{-- Aggiungi appartamento --}}


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="apa-index" class="container">
        <div class="row">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Annuncio</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Stanze</th>
                        <th scope="col">Letti</th>
                        <th scope="col">Bagni</th>
                        <th scope="col">Posizione</th>
                        <th class='float-right' id='aggiungi'>
                            <a class="btn btn-success mb-2" href="{{ route('apartment.create') }}">
                                <i class="fas fa-plus"></i>
                            </a>
                        </th>
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



    @include('partials.footer')
@endsection
