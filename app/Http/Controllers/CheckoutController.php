<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function success()
    {
        // Render the success view
        return view('payment.success');
    }

    public function failure()
    {
        // Render the failure view
        return view('payment.failure');
    }

}