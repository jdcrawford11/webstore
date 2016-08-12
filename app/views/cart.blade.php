<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<!--start of navigation bar -->
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Electronic Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">


    <!--start of search form -->
      <div class ="nav navbar-nav navbar-left">
        <div id="search-form"> {{Form::open(array('route' => 'search', 'method'=>'GET'))}}
                               {{Form::text('query',null,array('placeholder'=>'Search for products...'))}}
                               {{Form::submit('search')}}
                               {{Form::close()}} 
      
        </div>
       
        
          </div>
          </ul>
          <!--end of search form-->

        <!--navbar view changes based on whether the user is logged in-->


      <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                        <li><a href="/signup">Signup</a></li>
                        @else
                        <li><a href="/orders">My Orders <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/cart">Cart <span class="fa fa-shopping-cart"></span></a></li>
                        <li><a href="/logout">Logout</a></li>
                    
      </ul>
      @endif
    </div>
  </div>
</nav> <!--end of navigation bar-->


</head>
<body>
	<div class="container">
		<h1>Your Cart</h1>

		<table Class="table">
			<tr>
				<td>Name</td>
				<td>Quantity</td>
				<td>Price</td>
				<td>Total</td>
				<td>Delete</td>
			</tr>

			@foreach($cart_products as $cart_item)
			<tr>
				<td>{{$cart_item->Products->name}}</td>
				<td>{{$cart_item->quantity}}</td>
				<td>{{$cart_item->Products->price}}</td>
				<td>{{$cart_item->total}}</td>
				<td>
				<!--
					<a href="#" class="btn btn-danger">Delete</a>  -->
					<a href="
					{{URL::route('delete_product_from_cart', [$cart_item->id] )}}" class="btn btn-danger">Delete</a>

				</td>
			</tr>


			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td>{{$cart_total}}</td>
				<td></td>

			</tr>
		</table>

		
				<!--
				<button class="btn btn-info">Place Order</button>
				-->
				<a href="{{route('checkout')}}" type="button" class="btn btn-info">Checkout</a>
			
	</div>

</body>
</html>