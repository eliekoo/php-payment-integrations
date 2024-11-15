<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/
use App\Http\Controllers\StripeCheckoutController;
Route::group(['prefix' => 'stripe'], function(){
    Route::get('/',[StripeCheckoutController::class, 'index']);
    Route::post('/checkout',[StripeCheckoutController::class, 'createSession']);
    Route::get('/checkout',[StripeCheckoutController::class, 'getSession']);
    Route::get('/success',[StripeCheckoutController::class, 'success']);
    Route::get('/canceled',[StripeCheckoutController::class, 'fail']);
    Route::post('/stripe/webhook',[StripeCheckoutController::class, 'webhook']);
});

use App\Http\Controllers\PaypalCheckoutController;
Route::group(['prefix' => 'paypal'], function(){
    Route::get('/',[PaypalCheckoutController::class, 'index']);
    Route::post('/checkout',[PaypalCheckoutController::class, 'checkout']);
    Route::post('/paypal/webhook',[PaypalCheckoutController::class, 'webhook']);
});


use App\Http\Controllers\CheckoutController;
// Add routes for success and failure pages (unified)
Route::get('/payment/success', [CheckoutController::class, 'success'])->name('payment.success');
Route::get('/payment/failure', [CheckoutController::class, 'failure'])->name('payment.failure');