<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_lmWAzFz0y5tRwCaUbN0QjU3X');
</script>
<script type="text/javascript" src="/js/checkout.js"></script>



 

</head>
<body>

               

<div class="payment-container">




    <div class="cart-total">
        <p>Total Amount Due: ${{$cart_total}}</p>
    </div>
<!--
    <label>Address</label>
                </td>
                <td>
                    <input id="address" type="text" required> -->

     
   

    <div>
        <p>Enter payment information below</p>
    </div>



    @if (Session::has('stripeError'))
    <div class="stripe-error">{{ Session::get('stripeError') }}</div>
    @endif

   
    <form id="paymentform" action="" method="post">
        <table>

        <tr>
                <td>
                    <label>Cardholder Name</label>
                </td>
                <td>
                    <input id="card-name" type="text" autocomplete="off" required>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Card Number</label>
                </td>
                <td>
                    <input id="card-number" type="text" size="20" autocomplete="off" required>
                </td>
                <td>
                    <span>Enter the number without spaces or hyphens.</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>CVC</label>
                </td>
                <td>
                    <input id="cvc" type="text" size="4" autocomplete="off" required>
                </td>
                <td>
                </td>
            <tr>
                <td>
                    <label>Expiration (MM/YY)</label>
                </td>
                <td>
                    <input id="month" type="text" size="2" autocomplete="off" required>
                    <span> / </span>
                    <input id="year" type="text" size="2" autocomplete="off" required>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="payment-errors"></div>
                </td>
                <td>
                    <input type="submit" class="btn" id="submitBtn" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</div>







</body>
</html>

