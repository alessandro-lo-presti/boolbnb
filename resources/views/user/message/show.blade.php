@extends('layouts.app')

@section('content')

    <div id="message">

        <div class="container">
            <div class="evidence">
                <div class="card" style="width: 28rem;">
                    <div class="card-header">
                        <h5><strong>Messaggio ricevuto da:</strong> {{ $message->email }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">il {{ $message->date }}</h6>
                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">Messaggio ricevuto da: {{ $message->email }}</h5> --}}
                        {{-- <h6 class="card-subtitle mb-2 text-muted">il {{ $message->date }}</h6> --}}
                        <p class="card-text">{{ $message->body }}</p>
                        <a href="{{ route('message.index', $apartment->id) }}" class="card-link">Torna ai miei appartamenti</a>
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
