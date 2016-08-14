<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/checkout.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript" src="https://js.stripe.com/v2/" data-shippingAddress="true"></script>

<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_lmWAzFz0y5tRwCaUbN0QjU3X');
</script>
<script type="text/javascript" src="/js/checkout.js"></script>

<nav class="navbar navbar-inverse" style="margin-bottom:7px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="" href="/">Electronic Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav" style="margin-top:20px">
      <!--<form class="navbar-form navbar-left">-->
      <!--
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
        <!--start of search form -->

        <div id="search-form"> {{Form::open(array('route' => 'search', 'method'=>'GET'))}}
                               {{Form::text('query',null,array('placeholder'=>'Search for products...'))}}
                               {{Form::submit('search')}}
                               {{Form::close()}}

        </div>

      </ul>
          <!--end of search form-->



      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                        <li><a href="/signup">Signup</a></li>
                        @else
                        <li><a href="/orders">My Orders <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/cart">Cart <span class="fa fa-shopping-cart"></span></a></li>
                        <li><a href="/logout">Logout</a></li>>

      </ul>
      @endif
    </div>
  
  </div>
</nav>


<div class="cart-total">
    <h1><p class="text-center text-primary">Checkout<i class="fa fa-shopping-cart fa-lg"></i></p>  </h1>
<!--
        <div class="col-sm-2">
  <div class="panel panel-primary">
      <div class="text-center panel-heading"><i class="fa fa-money fa-lg" aria-hidden="true"></i> Total Amount Due</div>
      <div class="panel-body"><p class="text-center text-primary">${{$cart_total}}</p> </div>
    </div>
    </div>
     
    </div> -->



 

</head>
<body>


    <form id="paymentform" action="/checkout/confirm" method="post">

    <div class='form-row'>
              <div class='col-md-5 form-group'>
                <label class='control-label'>Address Line 1</label>
                <input class='form-control' id="address_line1" data-stripe="address_line1" size='20' type='text'>
              </div>
            </div>

            <div class='form-row'>
              <div class='col-md-5 form-group'>
                <label class='control-label'>Address Line 2</label>
                <input class='form-control' id="address_line2" data-stripe="address_line2" size='20' type='text'>
              </div>
            </div>

            <div class='form-row'>
              <div class='col-md-3 form-group'>
                <label class='control-label'>City</label>
                <input class='form-control' id="address_city" data-stripe="address_city" size='20' type='text'>
              </div>
            </div>

  <div class='form-row'>
              <div class='col-md-2 form-group'>
                <label class='control-label'>State</label>
                <input class='form-control' id="address_state" data-stripe="address_state" size='20' type='text'>
              </div>
            </div>

<div class='form-row'>
              <div class='col-md-3 form-group'>
                <label class='control-label'> Zip Code </label>
                <input class='form-control' id="address_zip" data-stripe="address_zip" size='20' type='text'>
              </div>
            </div>

<div class='form-row'>
              <div class='col-md-11 form-group required'>
                <label class='control-label'>Name On Card</label>
                <input class='form-control' size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-11 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-2 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
              </div>
              <div class='col-xs-2 form-group expiration required'>
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
              </div>
              <div class='col-xs-2 form-group expiration required'>
                <label class='control-label'> </label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-4'>
                 <p class="bg-info"> Total:
                  <span class='amount'>${{$cart_total}}</span></p>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-4 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Pay <i class="fa fa-cc-stripe fa-lg" aria-hidden="true"></i>
 </button>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  Information you entered is incorrect, please try again.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>


  
</body>
</html>
