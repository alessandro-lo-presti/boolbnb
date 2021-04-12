@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">

    <table class="table table-bordered">

      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">User ID</th>
          <th scope="col">N_rooms</th>
          <th scope="col">N_beds</th>
          <th scope="col">N_bathrooms</th>
          <th scope="col">Mq</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Longitude</th>
          <th scope="col">Latitude</th>
          <th scope="col">Visibility</th>
          {{-- <th scope="col">Visualization</th> --}}
        </tr>
      </thead>

      <tbody>
        <tr>
          <td scope="row"><img src="{{asset('storage/'.$apartment->image)}}" alt="{{ $apartment->title }}"></td>
          <th>{{ $apartment->id }}</th>
          <td>{{ $apartment->title }}</td>
          <td>{{ $apartment->user_id }}</td>
          <td>{{ $apartment->n_rooms }}</td>
          <td>{{ $apartment->n_beds }}</td>
          <td>{{ $apartment->n_bathrooms }}</td>
          <td>{{ $apartment->mqs }}</td>
          <td>{{ $apartment->address }}</td>
          <td>{{ $apartment->city }}</td>
          <td>{{ $apartment->longitude }}</td>
          <td>{{ $apartment->latitude }}</td>
          <td>{{ $apartment->visibility }}</td>
          {{-- <td>{{ $apartment->visualization }}</td> --}}
      </tbody>

    </table>

  </div>

</div>
@endsection
