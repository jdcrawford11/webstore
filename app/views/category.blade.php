@extends('Layouts.main')
@section('title')
  <title>Webstore</title>

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
    <div class="btn-group">
      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px"> Categories <span class="caret"></span>
      </button>
    <ul class="dropdown-menu">
      @foreach($categories as $category)
      <li>
         <a href=""> {{ link_to_route('getCategory', $category->name, $category->id) }}</a>
      </li>
      @endforeach
    </ul>
    </div>
  </div>
</nav>

  

  <!--side column calls the category names from the database using a foreach loop-->
<div class="container-fluid text-center">    
  <div class="categories">
    <div class="col-sm-2 sidenav">

     <?php $cat_name=""; ?>
    
    
   
        

    </div>  
        

   <!--Gets and list the products from the database-->

       <div class="col-sm-8 text-left"> 

        <h2>{{$cat_name}}</h2>
        @foreach($products as $product)
          <div class="product">
          <img src="{{$product->image}}" style="width: 105px; height: 75px;">  
          <a href="#"class="product-name"> <h3>{{$product->name}}</h3></a>
          
          <span class="price">
          $ {{$product->price}}
          </span>
          <form action="/cart/add" method="post">
    <input type="hidden" name="product" value="{{$product->id}}">
    <label for="">Quantity</label>
    <select name="quantity" id="">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>

    </select>
          <button class="btn btn-danger">Add to Cart</button>


    </form>


        @endforeach
      </div>
      </div>
      </div>

  
        
    @stop

