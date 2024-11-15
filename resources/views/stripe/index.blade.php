<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/stripe/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/stripe/global.css') }}" />
    <!-- Load Stripe.js on your website. -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/stripe/script.js') }}" defer></script>
  </head>
  <body>
    <div class="sr-root">
      <div class="sr-main">
        <section class="container">
          <div>
            <h1>Single photo</h1>
            <h4>Purchase a Pasha original photo</h4>
            <h4>MYR 99.90 each</h4>
            <div class="pasha-image">
              <img
                src="https://picsum.photos/280/320?random=4"
                width="140"
                height="160"
              />
            </div>
          </div>
          <form action="/stripe/checkout" method="POST">
            @csrf
            <div class="quantity-setter">
              <button class="increment-btn" id="subtract" type="button" disabled>
                -
              </button>
              <input type="number" id="quantity-input" name="quantity" min="1" value="1" />
              <button class="increment-btn" id="add" type="button">+</button>
            </div>
            <p>Number of copies</p>
            
            <button id="submit" type="submit">Pay</button>
          </form>
        </section>
        <div id="error-message"></div>
      </div>
    </div>
  </body>
</html>
