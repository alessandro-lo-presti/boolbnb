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
              <img src="https://lh3.googleusercontent.com/proxy/kECnQtbWpFi54L-4bQS41LcpDPQQhHldx2lvpJ0S3x6-FOqV8T8bdKHNtNJAh9Pnk88P-NdZR7A5yADxLFw3RlOIuQKcoGi4knzWb1YyTUSi2ik2o22T" alt="">
            </div>
          @else
            <h2>Errore nessun messaggio è stato inviato</h2>
            <div class="message-img">
              <img src="https://www.freeiconspng.com/uploads/error-icon-4.png" alt="">
            </div>
          @endif
        </div>

      </div>

    </div>





  </div>

</div>
@endsection
