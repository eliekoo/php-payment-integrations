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