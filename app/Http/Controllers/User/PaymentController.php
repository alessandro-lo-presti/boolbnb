<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function request()
    {
        //gateway
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $data = [
            'token' => $clientToken = $gateway->clientToken()->generate()
        ];

        return view('user.payment.request', $data);
    }

    public function payment(Request $request)
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

        dd($result);

        return 0;
    }
}
