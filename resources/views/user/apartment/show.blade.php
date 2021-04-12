@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>User ID</th>
        <th>N_rooms</th>
        <th>N_beds</th>
        <th>N_bathrooms</th>
        <th>Mq</th>
        <th>Address</th>
        <th>City</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Image</th>
        <th>Visibility</th>
        <th>Visualization</th>
        <th>Created_at</th>
        <th>Updated_at</th>
      </tr>
    </thead>
    <tbody>
        <tr>
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
            <td><img src="{{asset('storage/'.$apartment->image)}}" alt="{{ $apartment->title }}"></td>
            <td>{{ $apartment->visibility }}</td>
            <td>{{ $apartment->visualization }}</td>
            <td>{{ $apartment->created_at }}</td>
            <td>{{ $apartment->updated_at }}</td>
          </tr>
    </tbody>
  </table>
@endsection
