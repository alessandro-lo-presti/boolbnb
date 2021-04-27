@extends('layouts.app')

@section('content')
@include('partials.header')
<div id="send">

  <div class="container result">

    <div class="row d-flex justify-content-center">

      <div class="card col-8 pt-3 pb-3">

        <div class="card-body d-flex flex-column align-items-center">
          @if(session('status') == 'ok')
            <h2>Messaggio inviato</h2>
            <div class="message-img">
              <img src="https://icons-for-free.com/iconfiles/png/512/complete+done+green+success+valid+icon-1320183462969251652.png" alt="">
            </div>
          @else
            <h2>Errore nessun messaggio è stato inviato</h2>
            <div class="message-img">
              <img src="https://www.freeiconspng.com/uploads/error-icon-4.png" alt="">
            </div>
          @endif
          <a class="btn btn_back" href="{{ route('index') }}">Avanti</a>
        </div>

      </div>

    </div>

  </div>

</div>
@endsection
