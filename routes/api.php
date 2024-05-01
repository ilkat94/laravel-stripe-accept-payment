<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StripeController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'getAuthenticatedUser']);

    Route::get('payment-config', [StripeController::class, 'getConfig']);
    Route::post('create-payment-intent', [StripeController::class, 'createPaymentIntent']);
    Route::get('transactions', [StripeController::class, 'getAllTransactions']);
});
