@extends('layouts.app')

@section('content')

    @include('partials.header')
    <div id="message">
        
        <div class= "container">
            <p>{{ $message->body }}</p>
            <p>{{ $message->email }}</p>
            <p>{{ $message->date }}</p>
        </div>
        @include('partials.footer')
        
    </div>
    
    <script src="{{ asset('js/message.js') }}"></script>

@endsection




{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
