@extends('Layouts.main')
@section('title')
  <title>Webstore</title>
@stop

@section('style')
  <script src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/hello.css">
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
      <form class="navbar-form navbar-left">

      <!--
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
        <!--start of search form -->
        <div id="search-formx"> {{Form::open(array('route' => 'search', 'method'=>'GET'))}}
                               {{Form::text('query',null,array('placeholder'=>'Search for products...'))}}
                               {{Form::submit('search')}}
                               {{Form::close()}}

        </div>

          <!--end of search form-->



      </form>
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

<div class="container-fluid">
  <div class="categories text-left">

    <div class="col-md-2" style="height:378px; border-right:1px black solid">
    <h3>Search functions</h3>

    </div>


      <h1 class="col-sm-8" style="margin-top:10px">Featured Products</h1>


      <div class="col-sm-8" style="border-bottom: 1px black solid; padding-top:7px">
      <div class="row">
          <div class="col-md-4"><img src="img/products/1469692214-lenovo_thinkpad.jpg" width="250" height="250" class="img-responsive">
          </div>
          <div class="col-md-4 text-center"><img src="img/products/1470167022-Samsung_Galaxy Tablet.jpg"  width="150" height="150" class="img-responsive">
          </div>
          <div class="col-md-4 text-center"><img src="img/products/1470167332-GalaxyS7_Edge.png"  width="250" height="250" class="img-responsive">
          </div>
      </div>

      <div class="row">
          <div class="col-md-4">
              <p>Lenovo Thinkpad</p>
              <p>$4.99</p>
          </div>
          <div class="col-md-4">
              <p>Samsung Galaxy Tablet</p>
              <p>$3.99</p>
          </div>
          <div class="col-md-4">
              <p>Galaxy S7_Edge</p>
              <p>$5.99</p>
          </div>
      </div>

      </div>

  </div>


</div>



@stop