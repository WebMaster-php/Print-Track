// js/stripe.js
document.addEventListener('DOMContentLoaded', function () {
  var stripe = Stripe('pk_test_51JNtFtBks4bqOlMTjSu7vSEzO7sblZ8vBUb0xUt5i6Z7M1LM04FBZqXEUfg5dQsI7IZpbGyWBxLgv9CaIzWQ9Jcc00wCQHxPha');
  var elements = stripe.elements();

  var card = elements.create('card');
  card.mount('#card-element');

  var form = document.querySelector('form');

  form.addEventListener('submit', function (event) {
      event.preventDefault();

      stripe.createToken(card).then(function (result) {
          if (result.error) {
              // Inform the user if there was an error
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
          } else {
              // Send the token to your server
              stripeTokenHandler(result.token);
          }
      });
  });

  function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.querySelector('form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
      stripe.createPaymentMethod({
            type: 'card',
            card: card,
            billing_details: {
                name: document.getElementById('card-holder-name').value
            }
        }).then(function (result) {
            if (result.error) {
                // Handle error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                document.getElementById('payment-method-id').value = result.paymentMethod.id;
            }
        });
      // Submit the form
      form.submit();
  }
});
