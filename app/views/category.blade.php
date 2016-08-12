@extends('Layouts.main')
@section('title')
  <title>Webstore</title>

  @stop
@section('content')


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
</nav>

  

  <!--side column calls the category names from the database using a foreach loop-->
<div class="container-fluid text-center">    
  <div class="categories">
    <div class="col-sm-2 sidenav">

    <h2>Categories</h2>
     <?php $cat_name=""; ?>
    
    @foreach($categories as $category)
    @if($category->id == $current)
    <p>
     <a href="active"> {{ link_to_route('getCategory', $category->name, $category->id) }}</a></p>
      <?php $cat_name = $category->name; ?>
    @else
    <p>{{ link_to_route('getCategory', $category->name, $category->id) }} </p>

    @endif
    @endforeach
   
        

    </div>
        

   <!--Gets and list the products from the database-->

       <div class="col-sm-8 text-left"> 

        <h2>{{$cat_name}}</h2>
        @foreach($products as $product)
          <div class="product">

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

