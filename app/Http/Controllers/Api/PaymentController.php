<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ok');
        //
    }

    public function processPaypalTransactionApi(Request $request)
    {
        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'donate_amount' => 'required|numeric|gte:1',
                'success' => 'url|required',
                'cancel' => 'url|required',
            ]);
            if ($validator->fails()) {
                return $response['response'] = $validator->messages();
            }
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('apiPaypalSuccessTransaction', ['page' => $request->success]),
                    'cancel_url' => route('apiPaypalcancelTransaction', ['page' => $request->cancel]),
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
            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {

                        return [
                            'status' => 'success',
                            'link' => $links['href'],
                        ];
                        // return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('apiPaypalcancelTransaction')
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->route('apiPaypalcancelTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (\Throwable $th) {
            return ['error' => 'Something went wrong.'];
        }

    }

    public function successPaypalTransactionApi(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        //  dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            try {
                // $payment = new Payment;
                $purchase_units = $response['purchase_units'][0];
                // $address                   =    $purchase_units['shipping']['address'];
                // $amount                    =    $purchase_units['payments']['captures'][0]['seller_receivable_breakdown'];
                // $payment->full_name        =    $purchase_units['shipping']['name']['full_name'];
                // $payment->address          =   '"'.$address['address_line_1'].','.$address['admin_area_2'].','.$address['admin_area_1'].','.$address['postal_code'].','.$address['country_code'].'"';
                // $payment->email            =    $response['payer']['email_address'];
                // $payment->payer_id         =    $response['payer']['payer_id'];
                // $payment->total_amount     =    $purchase_units['payments']['captures'][0]['amount']['value'];
                // $payment->paypal_fee       =    $amount['paypal_fee']['value'];
                // $payment->net_amount       =    $amount['net_amount']['value'];
                // $payment->currency    =    $purchase_units['payments']['captures'][0]['amount']['currency_code'];
                // $payment->transaction_date =    $purchase_units['payments']['captures'][0]['create_time'];
                // $payment->transaction_id   =    $purchase_units['payments']['captures'][0]['id'];
                // $payment->user_id          =    Auth::ID() ?Auth::ID() :0;
                // $payment ->save();
                // $transaction_id =$purchase_units['payments']['captures'][0]['id'];

                return redirect()->away($request->page.$purchase_units['payments']['captures'][0]['id']);
                // return view('content.donationn.payment.success',compact('transaction_id'));
            } catch (\Throwable $th) {
                return redirect()->away($request->page);
            }
        } else {
            return redirect()->away($request->page);
        }
    }

    public function cancelPaypalTransactionApi(Request $request)
    {
        return redirect()->away($request->page);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
