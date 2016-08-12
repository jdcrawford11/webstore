document.getElementById("paymentform").addEventListener('submit', function(e) {
    e.preventDefault();
   // var address = document.getElementById('address').value;
    var cardNumber = document.getElementById('card-number').value;
    var cvc = document.getElementById('cvc').value;
    var month = document.getElementById('month').value;
    var year = document.getElementById('year').value;

    var stripeData = {
        number: cardNumber,
        cvc: cvc,
        exp_month: month,
        exp_year: year
    };
        
    console.log(stripeData);

    Stripe.createToken(stripeData, stripeResponseHandler);
});

function stripeResponseHandler(status, response) {
    if (response.error) {
        reportError(response.error.message);
    } else {
        var f = document.getElementById("paymentform");
        var token = response["id"];

        var child = document.createElement('input');
        child.type = 'hidden';
        child.name = 'stripeToken';
        child.value = token;
        var form = document.getElementById("paymentform");
        form.appendChild(child);
        form.submit();
        console.log("success");
    }
}

function reportError(msg) {
    document.getElementById('payment-errors').textContent = msg;
}    
