<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function createintent(Request $request){
        \Stripe\Stripe::setApiKey('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');

        $intent = \Stripe\PaymentIntent::create([
          'amount' => 282,
          'currency' => 'XAF',
          //'payment_method_types' => ['bancontact', 'card', 'eps', 'giropay', 'ideal', 'p24', 'sepa_debit', 'sofort'],
          'payment_method_types' => ['card'],
        ]);
        $response = $intent->client_secret;
        return response()->json($response);
    }
}
