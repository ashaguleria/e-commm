

// Create a Stripe client.
var stripe = Stripe('pk_test_51KvwMySHCUQWcSVbWa9aJiEX6DZDBqwlB0nH78FpdlnKTqRwXkWrcSQ0IYzVFjLsZ7k14bZWXVZqEwvBkMsDlKSo00fSk098Ug');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.

var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
// Create an instance of the card Element.
var CardNumber = elements.create('cardNumber', { style: style, showIcon: true, placeholder: '0000 0000 0000 0000' });
var CardExpiry = elements.create('cardExpiry', { style: style, placeholder: 'MM/YY' });
var CardCVV = elements.create('cardCvc', { style: style, placeholder: 'CVV' });

// Add an instance of the card Element into the `card-element` <div>.
CardNumber.mount('#card_number');
CardExpiry.mount('#card_expiry');
CardCVV.mount('#card_cvv');
// Handle real-time validation errors from the card Element.
CardNumber.addEventListener('change', function (event) {
    displayError(event, "card_errors");
});

CardExpiry.addEventListener('change', function (event) {
    displayError(event, "card_errors");
});

CardCVV.addEventListener('change', function (event) {
    displayError(event, "card_errors");
});


// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function (event) {
    event.preventDefault();

    stripe.createToken(CardNumber).then(function (result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            console.log(result.token);
            stripeTokenHandler(result.token);
            return false;
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