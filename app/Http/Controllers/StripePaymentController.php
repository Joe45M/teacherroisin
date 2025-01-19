<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{

    public $stripeResponse;

    public function process(Request $request)
    {

        $this->stripeResponse = $request;

        $type = $this->stripeResponse['type'] ?? false;


        if ($type === 'checkout.session.completed') {


            ds($this->stripeResponse);

            $user = User::where('email', $this->stripeResponse['data']['object']['customer_details']['email'])->first()->id;
            $token = new Token();

            $token->token = 10;
            $token->type = 'in';
            $token->user_id = $user;
            $token->note = 'Account top-up';
            $token->save();


            $transaction = new Transaction();
            $transaction->amount = $this->stripeResponse['data']['object']['amount_total'];
            $transaction->currency = $this->stripeResponse['data']['object']['currency'];
            $transaction->stripe_id = $this->stripeResponse['data']['object']['id'];
            $transaction->user_id = $user;
            $transaction->tokens_id = $token->id;
            $transaction->receipt_url = 'reciept';
            $transaction->save();
        }
    }
}
