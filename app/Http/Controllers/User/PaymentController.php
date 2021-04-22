<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
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

        //transaction
        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $data['payment_method_nonce'],
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if($result) {
          $end = Carbon::now()->addDay();
          $apartment->sponsors()->attach($data['sponsor'], ['end'=> $end ]);
        }

        dd($result);

        return 0;
    }
}
