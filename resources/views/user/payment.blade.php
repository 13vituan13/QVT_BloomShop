<!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment Form</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <h1>Stripe Payment Form</h1>
    <img src="https://stripe.com/img/v3/home/social.png" alt="Stripe" style="width: 150px;">

    <form action="{{ route('payment.submit') }}" method="POST" id="payment-form">

        @csrf
        <label for="card-number">
            Credit or debit card number
        </label>
        <div id="card-number">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <label for="card-expiry">
            Expiration date
        </label>
        <div id="card-expiry">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <label for="card-cvc">
            CVC
        </label>
        <div id="card-cvc">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>

        <button type="submit">Submit Payment</button>
    </form>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '32px',
                color: '#32325d',
            },
        };
        // Create an instance of the card number Element.
        var cardNumberElement = elements.create('cardNumber', {
            style: style,
            showIcon: true,
            placeholder: 'Card Number'
        });
        cardNumberElement.mount('#card-number');


        // Create an instance of the CVC Element.
        var cvcElement = elements.create('cardCvc', {
            style: style
        });
        cvcElement.mount('#card-cvc');

        // Create an instance of the expiration date Element.
        var expDateElement = elements.create('cardExpiry', {
            style: style
        });
        expDateElement.mount('#card-expiry');

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardNumberElement, expDateElement, cvcElement).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

</body>

</html>
