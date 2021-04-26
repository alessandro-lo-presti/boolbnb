@extends('layouts.app')

@section('content')
    @include('partials.header')
    <div id="message">

        <div class= "container">
            <div class="row">
                <table class="table bordo_tabella">
                    <thead>
                        <tr>
                            <th scope="col">Contatto</th>
                            <th scope="col">Ricevuto il</th>
                            <th scope="col" colspan="2" class="text-center">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->date }}</td>
                            <td class="read text-center">
                                <button class ="btn btn-success">
                                    <a href="{{ url('user/message/' . $apartment->id . '/' . $message->id) }}">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </a>
                                </button>
                            </td>
                            <td class="del text-center">
                                <form action="{{ url('user/message/' . $apartment->id . '/' . $message->id) }}" method='post'>
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

    </div>

    <script src="{{ asset('js/message.js') }}"></script>

@endsection



{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
