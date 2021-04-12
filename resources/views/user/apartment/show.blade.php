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
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user_id }}</td>
            <td>{{ $post->content }}</td>
            <td><img src="{{asset('storage/'.$post->cover)}}" alt="{{ $post->title }}"></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
          </tr>
    </tbody>
  </table>
@endsection
