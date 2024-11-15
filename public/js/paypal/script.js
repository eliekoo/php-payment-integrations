var button = document.querySelector('#submit-button');
var clientToken = "{{ $clientToken }}";

braintree.dropin.create({
  authorization: 'sandbox_9qff2bng_73zbxzt3nnh85mb4',
  container: '#dropin-container',
  authorizationToken: clientToken
}, function (error, instance) {
  if (error) {
      console.error(error);
      return;
  }

  // On form submission, tokenize the payment information
  document.querySelector('#payment-form').addEventListener('submit', function (event) {
      event.preventDefault();

      // Request the payment nonce from Drop-in UI
      instance.requestPaymentMethod(function (err, payload) {
          if (err) {
              console.error(err);
              return;
          }else{
            $('#submit-button').remove();
          }

          // Add the nonce to the form as a hidden input
          document.querySelector('#payment-nonce').value = payload.nonce;

          // Submit the form to the server for processing
          document.querySelector('#payment-form').submit();
      });
  });
});