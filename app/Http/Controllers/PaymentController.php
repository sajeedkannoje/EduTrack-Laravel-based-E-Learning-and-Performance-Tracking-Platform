<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.donationn.donation');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        request()->validate([
            'donate_amount' => 'required|numeric|gt:0',
        ]);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        try {
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('successTransaction'),
                    'cancel_url' => route('cancelTransaction'),
                ],
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $request->donate_amount,
                        ],
                    ],
                ],
            ]);
            // dd($response);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('createTransaction')
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->route('createTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('donation')->with('exception', 'Somthing went wrong!');
        }

    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        //  dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            try {
                $payment = new Payment;
                $purchase_units = $response['purchase_units'][0];
                $address = $purchase_units['shipping']['address'];
                $amount = $purchase_units['payments']['captures'][0]['seller_receivable_breakdown'];

                $payment->full_name = $purchase_units['shipping']['name']['full_name'];
                $payment->address = '"'.$address['address_line_1'].','.$address['admin_area_2'].','.$address['admin_area_1'].','.$address['postal_code'].','.$address['country_code'].'"';
                $payment->email = $response['payer']['email_address'];
                $payment->payer_id = $response['payer']['payer_id'];
                $payment->total_amount = $purchase_units['payments']['captures'][0]['amount']['value'];
                $payment->paypal_fee = $amount['paypal_fee']['value'];
                $payment->net_amount = $amount['net_amount']['value'];
                $payment->currency = $purchase_units['payments']['captures'][0]['amount']['currency_code'];
                $payment->transaction_date = $purchase_units['payments']['captures'][0]['create_time'];
                $payment->transaction_id = $purchase_units['payments']['captures'][0]['id'];
                $payment->user_id = Auth::ID();
                $payment->save();
                // $transaction_id =$purchase_units['payments']['captures'][0]['id'];

                return redirect()->route('success')->with('transaction_id', $purchase_units['payments']['captures'][0]['id']);
                // return view('content.donationn.payment.success',compact('transaction_id'));
            } catch (\Throwable $th) {
                return redirect()->route('success');
            }
        } else {
            return redirect()
                ->route('cancel')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('cancel')
            ->with('error', $response['message'] ?? 'Something went wrong.');
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
