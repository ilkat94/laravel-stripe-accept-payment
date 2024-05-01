<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class StripeController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function getConfig(): JsonResponse
    {
        return response()->json([
            'publishableKey' => env('STRIPE_KEY'),
        ]);
    }

    public function createPaymentIntent(): JsonResponse
    {
        try {
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => 1999,
                'currency' => 'EUR',
                'payment_method_types' => ['card'],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (ApiErrorException $e) {
            return response()->json([
                'error' => ['message' => $e->getMessage()]
            ], 400);
        }
    }

    public function getAllTransactions(): JsonResponse
    {
        try {
            $charges = $this->stripe->charges->all();

            return response()->json($charges->data);
        } catch (ApiErrorException $e) {
            return response()->json([
                'error' => ['message' => $e->getMessage()]
            ], 500);
        }
    }
}
