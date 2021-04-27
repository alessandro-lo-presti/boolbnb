@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="apa-index" class="container d-flex flex-column">
        <div class="d-flex p_top justify-content-between">
            <h3 class=""> I Miei Appartamenti</h3>
            <a class="btn btn-success mb-2" href="{{ route('apartment.create') }}">
                <span class="add">Aggiungi un appartamento</span>
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="row">
            <table class="table table-hover bordo_tabella">
                <thead>
                    <tr>
                        <th scope="col">Annuncio</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Stanze</th>
                        <th scope="col">Letti</th>
                        <th scope="col">Bagni</th>
                        <th scope="col">Posizione</th>
                        <th scope="col">Messaggi</th>
                        <th scope="col">Cancella</th>
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
                            <td class="col-xs-2"><a href="{{ route('apartment.show', $apartment->id) }}">{{ $apartment->title }}</a>
                            </td>
                            <td class="col-xs-2">{{ $apartment->n_rooms }}</td>
                            <td class="col-xs-2">{{ $apartment->n_beds }}</td>
                            <td class="col-xs-2">{{ $apartment->n_bathrooms }}</td>
                            <td class="col-xs-2">{{ $apartment->address }}
                                {{ $apartment->city }}</td>
                                <td class="mex">
                                    <a href="{{route('message.index', $apartment->id)}}"><input class="btn btn-primary" value="&#xf086;" type="submit"></a></td>
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
