<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- Load paypal.js on your website. -->
    <script src="{{ asset('js/paypal/script.js') }}" defer></script>
    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.min.js"></script>
    <!-- includes jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <style>
      .button {
        cursor: pointer;
        font-weight: 500;
        left: 3px;
        line-height: inherit;
        position: relative;
        text-decoration: none;
        text-align: center;
        border-style: solid;
        border-width: 1px;
        border-radius: 3px;
        -webkit-appearance: none;
        -moz-appearance: none;
        display: inline-block;
      }
  
      .button--small {
        padding: 10px 20px;
        font-size: 0.875rem;
      }
  
      .button--green {
        outline: none;
        background-color: #64d18a;
        border-color: #64d18a;
        color: white;
        transition: all 200ms ease;
      }
  
      .button--green:hover {
        background-color: #8bdda8;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="sr-root">
      <div class="sr-main">
        <section class="container">
          <div>
            <h1>Single photo</h1>
            <h4>Purchase a Pasha original photo</h4>
            <h4>MYR 99.90</h4>
            <div class="pasha-image">
              <img
                src="https://picsum.photos/280/320?random=4"
                width="140"
                height="160"
              />
            </div>
          </div>
          

          <form id="payment-form" method="POST" action="/paypal/checkout">
            @csrf
            <!-- Element where the Drop-in UI will be rendered -->
            <div id="dropin-wrapper">
              <div id="checkout-message"></div>
              <div id="dropin-container"></div>
              <input type="hidden" id="payment-nonce" name="payment_nonce">
              <input type="hidden" id="amount" name="amount">
              <button id="submit-button" class="button button--small button--green">Purchase</button>
            </div>
          </form>

        </section>
        <div id="error-message"></div>
      </div>
    </div>
  </body>
</html>
