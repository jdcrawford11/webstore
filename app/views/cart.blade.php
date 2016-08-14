@extends('Layouts.main')
@section('title')
  <title>Shopping Cart</title>

  @stop
@section('content')


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



	<div class="container">
		<h1><p class="text-center text-primary">Your Cart</p></h1>

		<table Class="table">
			<tr>
				<td><strong>Product</strong></td>
				<td><strong>Quantity</strong></td>
				<td><strong>Price</strong></td>
				<td><strong>Total</strong></td>
				<td></td>
			</tr>

			@foreach($cart_products as $cart_item)
			<tr>
				<td class="col-sm-10 col-md-4"> <a class="thumbnail pull-left"> <img src="{{$cart_item->Products->image}}" style="width: 105px; height: 75px;"> </a>
                               

				{{$cart_item->Products->name}}</td>
				<td >{{$cart_item->quantity}}</td>
				<td>{{$cart_item->Products->price}}</td>
				<td>{{$cart_item->total}}</td>
				<td>
				<!--
					<a href="#" class="btn btn-danger">Delete</a>  -->
					<a href="
					{{URL::route('delete_product_from_cart', [$cart_item->id] )}}" class="btn btn-danger"> <i class="fa fa-trash-o fa-lg"></i> Delete</a>

				</td>
			</tr>


			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><h3>Total</h3></td>
				<td><h3><strong>${{$cart_total}}</strong></h3></td>
				

			</tr>
			<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td>

			<input action ="action" type="button" value="Continue Shopping" onclick="history.go(-1);" class="btn btn-default">
				</a></td>

			<td>
  
			
				<a href="{{route('checkout')}}"> <button type="button" class="btn btn-info">Checkout <span class="fa fa-arrow-circle-o-right"></span></button></a></td>
				</tr>

		</table>

			
	</div>

@stop