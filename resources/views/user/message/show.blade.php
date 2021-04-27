@extends('layouts.app')
@section('title' ,'message')

@section('content')

    <div id="message">

        <div class="container">
            <div class="evidence">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Messaggio ricevuto da: {{ $message->email }}</h5>
                        <h6 class="card-title">il {{ $message->date }}</h6>
                        <p class="card-text">{{ $message->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/message.js') }}"></script>

@endsection




{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
