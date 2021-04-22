<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function request(Apartment $apartment)
    {
        //gateway
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $data = [
            'token' => $clientToken = $gateway->clientToken()->generate(),
            'apartment' => $apartment
        ];

        return view('user.payment.request', $data);
    }

    public function payment(Request $request, Apartment $apartment)
    {
        $data = $request->all();

        //gateway
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $sponsor = Sponsor::find($data['sponsor']);

        //transaction
        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $data['payment_method_nonce'],
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        $status = false;

        if($result) {
          $status = true;
          $end = Carbon::now()->addDay($sponsor->time / 24);
          $apartment->sponsors()->attach($data['sponsor'], ['end'=> $end ]);
        }

        return redirect()->route('payment.check')->with('status', $status);
    }

    public function check()
    {
      return view('user.payment.check');
    }
}
