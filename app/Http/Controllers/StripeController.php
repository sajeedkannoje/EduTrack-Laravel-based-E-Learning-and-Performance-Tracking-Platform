<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Stripe;
use Stripe;

class StripeController extends Controller
{
    //
    public function index()
    {
        // dd( Stripe\Stripe::setApiKey(env('STRIPE_SECRET')));
        // dd('ss',env('STRIPE_SECRET'));

        return view('content.donationn.donation');
    }

    public function process(Request $request)
    {
        // dd(env('MAIL_MAILER'));

        $request->validate([
            'amount' => 'numeric',
        ]);

        $amount = $request->amount * 100;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // $YOUR_DOMAIN ="http://127.0.0.1:8000/";
        $YOUR_DOMAIN = env('APP_URL');
        // dd($YOUR_DOMAIN);
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Donate to '.env('APP_NAME'),
                        'images' => [asset('images/logo/site_logo.png')],
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN.'public/save-payment?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $YOUR_DOMAIN.'public/cancel',
        ]);

        return Redirect($checkout_session->url);
    }

    public function savePaymentRecord(Request $request)
    {
        //   dd();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if (! empty($request->session_id)) {
            $session_id = $request->session_id;
            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
                // dd($checkout_session->customer_details['email']);
                if ($checkout_session->status == 'complete') {
                    $payment = new Payment;
                    $payment->user_id = Auth::ID();
                    $payment->email = $checkout_session->customer_details['email'];
                    $payment->payment_id = $session_id;
                    $payment->phone = $checkout_session->customer_details['phone'];
                    $amount_subtotal = $checkout_session->amount_subtotal / 100;
                    $payment->amount_subtotal = $amount_subtotal;
                    $amount_total = $checkout_session->amount_total / 100;
                    $payment->amount_total = $amount_total;
                    $payment->currency = $checkout_session->currency;
                    $payment->save();
                    if ($payment) {
                        return redirect()->route('stripe-success');
                    }
                }
            } catch (Exception $e) {
                $error = $e->getMessage();

                return redirect()->route('donation');
            }
        }
    }

    public function success()
    {
        return view('content.donationn.payment.success');
    }

    public function cancel()
    {
        return view('content.donationn.payment.cancel');
    }
}
