@extends('layouts.app')

@section('content')
    <div id="message">
        <div class= "container">
            <div class="row">
                <table class="table bordo_tabella">
                    <thead>
                        <tr>
                            <th scope="col">Contatto</th>
                            <th scope="col">Ricevuto il</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->date }}</td>
                            <td class="read d-flex align-items-center ">

                                <a class ="form-group btn btn-success mr-2" href="{{ url('user/message/' . $apartment->id . '/' . $message->id) }}">
                                    <i class="fas fa-sign-in-alt"></i>
                                </a>
                                    <form action="{{ url('user/message/' . $apartment->id . '/' . $message->id) }}" method='post'>
                                        @csrf
                                        @method('delete')
                                        <div class="form-group d-flex align-items-center justify-content-center">
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

    </div>

    <script src="{{ asset('js/message.js') }}"></script>

@endsection



{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
