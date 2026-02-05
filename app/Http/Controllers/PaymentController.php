<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PaymentController extends Controller
{
    public function donate(Cause $cause)
    {
        // dd($cause->title_trans);
        return view('front.donate', [
            'case' => $cause
        ]);
    }
    public function donate_process(Request $request)
    {
        // dd($request->all());
        $payment = Payment::create([
            'cause_id' => $request->case_id,
            'user_id' => $request->anonymous ? null : Auth::id(),
            'amount' => $request->custom_amount ? $request->custom_amount : $request->fixed_amount,
            'payment_gateway' => $request->payment_gateway,
        ]);
        return match ($request->payment_gateway) {
            'stripe' => $this->payWithStripe($payment),
            'paypal' => $this->payWithPaypal($payment),
        };
    }
    public function donate_success(Request $request)
    {
        $sessionId = $request->get('session_id');
        if (!$sessionId) {
            abort(404, 'Session ID is required');
        }
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = StripeSession::retrieve($sessionId);
        if ($session->payment_status != 'paid') {
            abort(400, 'Payment not completed');
        }
        $paymentId = $session->metadata->payment_id ?? null;
        if (!$paymentId) {
            abort(404, 'Payment ID not found in session metadata');
        }
        $payment = Payment::findOrFail($paymentId);
        if ($payment->status != 'completed') {
            $payment->update([
                'status' => 'completed',
                'transaction_number' => $session->payment_intent,
                ]);
        }
        return view('front.payment.success', [
            'payment' => $payment,
        ]);
    }
    private function payWithStripe(Payment $payment)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $payment->amount * 100,
                        'product_data' => [
                            'name' => 'Payment #' . $payment->id,
                        ],
                    ],
                    'quantity' => 1,
                ]
            ],
            'metadata' => [
                'payment_id' => $payment->id,
            ],
            'success_url' => route('front.donate.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('front.donate.cancel'),
        ]);
        return redirect($session->url);
    }
    private function payWithPaypal(Payment $payment)
    {
        $client = app('paypal.client');

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',

            'purchase_units' => [[
                'reference_id' =>  $payment->id,
                'amount' => [
                    'value' => $payment->amount,
                    'currency_code' => 'USD'
                ],
            ]],
            'application_context' => [
                'cancel_url' => route('front.donate.cancel'),
                'return_url' => route('front.donate.success'),
            ]
        ];
        $response = $client->execute($request);

        try {
            foreach ($response->result->links as $link) {
                if ($link->rel === 'approve') {
                    return redirect($link->href);
                }
            }
            abort(500, 'No approval link found in PayPal response');
        } catch (Exception $e) {
            return redirect()->route('front.donate')->with('error', 'Error processing PayPal payment: ' . $e->getMessage());
        }
    }
}