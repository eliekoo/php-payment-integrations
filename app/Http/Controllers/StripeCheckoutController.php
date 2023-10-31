<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeCheckoutController extends Controller
{
	public function createSession()
	{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      echo 'Invalid request';
      exit;
    }

    // For sample support and debugging. Not required for production:
    \Stripe\Stripe::setAppInfo(
      "stripe-samples/checkout-one-time-payments",
      "0.0.2",
      "https://github.com/stripe-samples/checkout-one-time-payments"
    );

    \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

    $domain_url = $_ENV['DOMAIN'];
    $quantity = $_POST['quantity'];

    // Create new Checkout Session for the order
    // Other optional params include:
    // [billing_address_collection] - to display billing address details on the page
    // [customer] - if you have an existing Stripe Customer ID
    // [customer_email] - lets you prefill the email input in the form
    // [automatic_tax] - to automatically calculate sales tax, VAT and GST in the checkout page
    // For full details see https://stripe.com/docs/api/checkout/sessions/create
    // ?session_id={CHECKOUT_SESSION_ID} means the redirect will have the session ID set as a query param
    $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => $domain_url . '/stripe/success?session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => $domain_url . '/stripe/canceled',
      'mode' => 'payment',
      // 'automatic_tax' => ['enabled' => true],
      'line_items' => [[
        'price' => 'price_1O7A7BKbfH6VRXe0eqR6O9YX',
        'quantity' => $quantity,
      ]]
    ]);

    if(isset($checkout_session->url)){
      return redirect($checkout_session->url);
    }
    else{
      return redirect($domain_url."/stripe");
    }
	}

  public function index(){
    return view('stripe/index');
  }

  public function success(){
    return view('stripe/success');
  }

	public function getSession()
  {

    // For sample support and debugging. Not required for production:
    \Stripe\Stripe::setAppInfo(
      "stripe-samples/checkout-one-time-payments",
      "0.0.1",
      "https://github.com/stripe-samples/checkout-one-time-payments"
    );

    \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

    if (json_last_error() !== JSON_ERROR_NONE) {
      http_response_code(400);
      echo json_encode([ 'error' => 'Invalid request.' ]);
      exit;
    }

    // Fetch the Checkout Session to display the JSON result on the success page
    $id = $_GET['sessionId'];
    $checkout_session = \Stripe\Checkout\Session::retrieve($id);

    echo json_encode($checkout_session);
  }

  public function fail(){
    return view('stripe/canceled');
  }

  public function webhook(){
    $event = null;

    try {
      // Make sure the event is coming from Stripe by checking the signature header
      $event = \Stripe\Webhook::constructEvent($input, $_SERVER['HTTP_STRIPE_SIGNATURE'], $config['stripe_webhook_secret']);
    }
    catch (Exception $e) {
      http_response_code(403);
      echo json_encode([ 'error' => $e->getMessage() ]);
      exit;
    }

    $details = '';

    $type = $event['type'];
    $object = $event['data']['object'];

    if($type == 'checkout.session.completed') {
      error_log('🔔  Checkout Session was completed!');
    } else {
      error_log('🔔  Other webhook received! ' . $type);
    }

    $output = [
      'status' => 'success'
    ];

    echo json_encode($output, JSON_PRETTY_PRINT);
  }

}
