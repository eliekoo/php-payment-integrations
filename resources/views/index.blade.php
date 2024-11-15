<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Payments Quickly, Easily</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f3ef; /* ivory */
            color: #2f4f4f; /* dark green */
        }
        h1 {
            color: #2f4f4f;
        }
        h2 {
            color: #2f4f4f;
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 0.5rem;
            font-weight: 600;
        }
        h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: #ffd700; /* yellow */
            border-radius: 5px;
        }
        .highlight-title {
            background-color: #ffd700; /* yellow */
            padding: 1rem;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.8rem;
        }
        .cta-button {
            background-color: #ffd700;
            color: #2f4f4f;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }
        .cta-button:hover {
            background-color: #e6c200;
        }
        .icon {
            width: 30px;
            height: 30px;
            margin-right: 0.5rem;
        }
        .three-column {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .three-column .col {
            flex: 1 1 calc(33.333% - 1rem);
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .three-column .col {
                flex: 1 1 calc(50% - 1rem);
            }
        }
        @media (max-width: 576px) {
            .three-column .col {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Title Section -->
        <header class="d-flex flex-column flex-md-row align-items-center mb-5">
            <div class="col-md-6">
                <h1 class="highlight-title">Fast & Simple Payment Solutions</h1>
                <p>Offer your customers secure, flexible payment options for a seamless experience.</p>
            </div>
            <div class="col-md-6 text-center">
              <img src="{{ asset('images/payments.jpg') }}" alt="Payment Gateways" class="img-fluid rounded" style="max-width: 75%;">
            </div>
        </header>

        <!-- Payment Methods Section -->
        <section class="mb-5">
            <h2>The Payment Methods You Can Accept</h2>
            <div class="row">
                <!-- Bank Transfer/ATM Transfer -->
                <div class="col-md-4 mb-4">
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('icons/bt_icon.svg') }}" class="icon" alt="Bank Transfer Icon">
                    <h3>Bank Transfer/ATM Transfer</h3>
                  </div>
                    <p>Available worldwide for secure bank-based transactions.</p>
                    <ul>
                        <li><strong>Pros:</strong> Trusted by customers</li>
                        <li><strong>Cons:</strong> May require manual confirmation</li>
                    </ul>
                </div>

                <!-- Debit/Credit Card -->
                <div class="col-md-4 mb-4">
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('icons/cc_icon.svg') }}" class="icon" alt="Debit Card Icon">
                    <h3>Debit/Credit Card</h3>
                  </div>
                    <p>Accepted globally for instant transactions with major cards.</p>
                    <ul>
                        <li><strong>Pros:</strong> Instant processing</li>
                        <li><strong>Cons:</strong> Transaction fees apply</li>
                    </ul>
                </div>

                <!-- E-Wallet -->
                <div class="col-md-4 mb-4">
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('icons/ewallet_icon.svg') }}" class="icon" alt="E-Wallet Icon">
                    <h3>E-Wallet</h3>
                  </div>
                    <p>Convenient for mobile-first customers around the world.</p>
                    <ul>
                        <li><strong>Pros:</strong> Fast, secure</li>
                        <li><strong>Cons:</strong> Limited by regional availability</li>
                    </ul>
                </div>

                <!-- Buy Now, Pay Later -->
                <div class="col-md-4 mb-4">
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('icons/bnpl_icon.svg') }}" class="icon" alt="Buy Now Pay Later Icon">
                    <h3>Buy Now, Pay Later</h3>
                  </div>
                    <p>Allows customers worldwide to pay over time.</p>
                    <ul>
                        <li><strong>Pros:</strong> Increases conversions</li>
                        <li><strong>Cons:</strong> Higher transaction fees may apply</li>
                    </ul>
                </div>

                <!-- Cash -->
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center">
                      <img src="{{ asset('icons/cash_icon.svg') }}" class="icon me-2" alt="Cash Icon">
                      <h3 class="mb-0">Cash</h3>
                    </div>
                    <p>Cash on delivery is available in many regions for localized service.</p>
                    <ul>
                        <li><strong>Pros:</strong> No digital transaction fees</li>
                        <li><strong>Cons:</strong> Limited to in-person sales</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Supported Payment Gateways Section -->
        <section class="mb-5">
            <h2>Supported Payment Gateways</h2>
            <div class="three-column">
                <!-- Stripe -->
                <div class="col">
                    <img src="{{ asset('logos/stripe.png') }}" alt="Stripe Logo" class="mb-3">
                    <a href="/stripe" target="_blank" class="cta-button d-block">Stripe</a>
                    <p>Supports: Debit/Credit Card, Worldwide</p>
                </div>
                
                <!-- PayPal -->
                <div class="col">
                  <img src="{{ asset('logos/paypal.png') }}" alt="PayPal Logo" class="mb-3">
                  <a href="/paypal" target="_blank" class="cta-button d-block">PayPal</a>
                  <p>Supports: Debit/Credit Card, E-Wallet, Worldwide</p>
              </div>
                
                <!-- Billplz -->
                <div class="col">
                    <img src="{{ asset('logos/billplz.png') }}" alt="Billplz Logo" class="mb-3">
                    <a href="/billplz" target="_blank" class="cta-button d-block">Billplz or change to toyyibpay</a>
                    <p>Supports: Bank Transfer, E-Wallet</p>
                </div>
                
                <!-- OPN / Omise -->
                <div class="col">
                  <img src="{{ asset('logos/opn.svg') }}" alt="OPN Omise Logo" class="mb-3" style="width: 300px; height: 100px;">
                  <a href="/opn" target="_blank" class="cta-button d-block">OPN payment (Omise)</a>
                  <p>Supports: Debit/Credit Card, Worldwide</p>
                </div>
                
                <!-- ECPay -->
                <div class="col">
                    <img src="{{ asset('logos/ecpay.png') }}" alt="ECPay Logo" class="mb-3">
                    <a href="/ecpay" target="_blank" class="cta-button d-block">ECPay</a>
                    <p>Supports: Debit/Credit Card, E-Wallet, Worldwide</p>
                </div>
                
                <!-- Hitpay -->
                <div class="col">
                    <img src="{{ asset('logos/hitpay.png') }}" alt="Hitpay Logo" class="mb-3">
                    <a href="/hitpay" target="_blank" class="cta-button d-block">Hitpay</a>
                    <p>Supports: Bank Transfer, E-Wallet</p>
                </div>

                <!-- Additional gateways can be added similarly -->

            </div>
        </section>

        <!-- Why Offer Various Payment Methods -->
        <section class="mb-5">
            <h2>Why You Should Offer Various Payment Methods</h2>
            <ul>
                <li>Enhance customer choice, allowing them to pay with their preferred methods.</li>
                <li>Increase conversions by offering familiar, trusted options.</li>
                <li>Build customer trust by providing reliable payment methods.</li>
            </ul>
        </section>

        <!-- How Payment Solutions Can Help Your Business -->
        <section class="mb-5">
            <h2>How Payment Solutions Can Help Your Business</h2>
            <ul>
                <li>Easily integrate and manage payment processing for a seamless experience.</li>
                <li>Protect your business from fraud with secure, compliant solutions.</li>
                <li>Access transaction data insights to refine sales strategies.</li>
            </ul>
        </section>

        <!-- Disclaimer and Footer -->
        <footer class="text-center mt-5">
            <p><small>All information is for test environment purposes only. Actual results may vary.</small></p>
            <p><small>Powered by Elie © {{ date('Y') }}</small></p>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
