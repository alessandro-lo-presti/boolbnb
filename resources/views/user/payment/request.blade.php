<!doctype html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree-Demo</title>
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  </head>

  <body>
    <div class= "container">
        <form id="payment-form" action="{{ route("payment") }}" method="post">
          @csrf
          @method('POST')
          <!-- Putting the empty container you plan to pass to
            braintree.dropin.create inside a form will make layout and flow
            easier to manage -->
          <div id="dropin-container"></div>
          <input type="hidden" id="nonce" name="payment_method_nonce"/>
          <input type="submit" />
          {{-- 4111 1111 1111 1111 --}}
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
  </body>

</html>
