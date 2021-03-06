@extends('layouts.app')

@section('cdn')
  <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
@endsection
@section('title' ,'Sponsorizza Appartamento')

@section('script')
  <script src="{{ asset('js/sponsor.js') }}"></script>
@endsection

@section('content')
  @if($sponsor)
  <div id="sponsor">

      <div class= "container">
        <form id="payment-form" action="{{ route("payment.payment", $apartment->id) }}" method="post">
          @csrf
          @method('POST')

          <h1>Rendi più visibile il tuo appartamento</h1>
          <h4>Acquista una delle nostre sponsorizzazioni</h4>
          <div class="layout-cards">
            <div class="card center-card" style="width: 18rem;" v-for="(sponsor, index) in sponsors" :class="(counter == index) ? sponsor.title : '' " v-on:click="selection(sponsor, index)">
              <div class="card-header">
                <h5 class="card-title">@{{ sponsor.title }}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">@{{ sponsor.duration }} @{{ (sponsor.duration == 1) ? 'giorno' : 'giorni' }}</p>
                <p class="card-text">@{{ sponsor.amount }}€</p>
                {{-- <a href="#" class="btn btn-success">Acquista</a> --}}
                {{-- <input type="checkbox" name="mario" value=""> --}}
              </div>
            </div>
          </div>

          {{-- v-on:mouseenter="enter(index)" v-on:mouseleave="leave(index)" --}}

          <input type="hidden" id="sel" name="sponsor">

          <div id="dropin-container"></div>
          {{-- <input type="number" name="sponsor"> --}}
          <input type="hidden" id="nonce" name="payment_method_nonce"/>
          <div class="d-flex justify-content-center">
            <button id="paga" type="submit" value="Pagamento" v-bind:disabled="counter < 0"/>Pagamento</button>
          </div>
        </form>
      </div>

      <script>
      const form = document.getElementById('payment-form');

      braintree.dropin.create({
        authorization: '{{ $token }}',
        container: '#dropin-container'
      }, (error, dropinInstance) => {
        if (error) console.error(error);

        form.addEventListener('submit', event => {
          event.preventDefault();
          dropinInstance.requestPaymentMethod((error, payload) => {
            if (error) console.error(error);

            // Step four: when the user is ready to complete their
            //   transaction, use the dropinInstance to get a payment
            //   method nonce for the user's selected payment method, then add
            //   it a the hidden field before submitting the complete form to
            //   a server-side integration
            document.getElementById('nonce').value = payload.nonce;
            form.submit();
          });
        });
      });
    </script>

  </div>

  @else
    <div id="sponsorization">

      <div class="container result">

        <div class="row d-flex justify-content-center">

          <div class="card col-8 pt-3 pb-3">

            <div class="card-body d-flex flex-column align-items-center">
              <h2>Sponsorizzazione già attiva</h2>
              <div class="check-img">
                <img src="https://www.freeiconspng.com/uploads/error-icon-4.png" alt="">
              </div>
              <a class="btn btn_back" href="{{ route('home') }}">Avanti</a>
            </div>

          </div>

        </div>


    </div>
  </div>
@endif
@endsection



{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
