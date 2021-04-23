@extends('layouts.app')

@section('content')
    @include('partials.header')
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

@endsection
