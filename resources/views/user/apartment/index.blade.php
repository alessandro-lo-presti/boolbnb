@extends('layouts.dashboard')

@section('content')
@include('partials.header')
<div class="container">

    {{-- Aggiungi appartamento --}}
    <div>
        <a class="btn btn-success mb-2" href="{{route('apartment.create')}}">Aggiungi</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Address</th>
                <th>City</th>
                <th colspan="3" class="text-center">Options</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($apartments as $apartment)
            <tr>
                <td>
                  {{-- <img src="{{ $apartment->image == null ? asset('storage/covers/placeholder.png') : asset('storage/'.$apartment->image)}}" alt="{{ $apartment->title }}"> --}}
                </td>
                <td>{{ $apartment->title }}</td>
                <td>{{ $apartment->address }}</td>
                <td>{{ $apartment->city }}</td>
                <td>
                    {{-- Mostra appartamento --}}
                    <a class="btn btn-secondary" href="{{route('apartment.show',$apartment->id)}}">Mostra</a>
                </td>
                <td>
                    {{-- Edit appartamento --}}
                    <a class="btn btn-warning" href="{{route('apartment.edit',$apartment->id)}}">Modifica</a>
                </td>
                <td>
                    {{-- Cancella appartamento --}}
                    <form action="{{route('apartment.destroy',$apartment->id)}}" method='post'>
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">Cancella</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@include('partials.footer')
@endsection
