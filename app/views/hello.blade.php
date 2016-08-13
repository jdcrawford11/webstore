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

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="img/products/laptop.jpg" alt="Lenovo Thinkpad" width="250" height="250">
        <div class="carousel-caption">
          <h3>Some HP laptop</h3>
          <p>Laptops are handy</p>
        </div>
      </div>

      <div class="item">
        <img src="img/products/tablet.jpg" alt="Samsung Galaxy Tablet" width="250" height="250">
        <div class="carousel-caption">
          <h3>Some Tablet</h3>
          <p>Insert Advertisement here</p>
        </div>
      </div>
    
      <div class="item">
        <img src="img/products/smartphone.jpg" alt="Galaxy S7 Edge" width="250" height="250">
        <div class="carousel-caption">
          <h3>Some Smartphone</h3>
          <p>Nice Phone</p>
        </div>
      </div>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="container-fluid">
  <div class="categories text-left">

      <h1 class="col-sm-8" style="margin-top:10px">Featured Products</h1>


      <div class="col-sm-12" style="border-bottom: 1px black solid; padding-top:7px">
      <div class="row">
          <div class="col-md-3"><img src="img/products/1469692214-lenovo_thinkpad.jpg" width="250" height="250" class="img-responsive">
          </div>
          <div class="col-md-3 text-center"><img src="img/products/1470167022-Samsung_Galaxy Tablet.jpg"  width="150" height="150" class="img-responsive">
          </div>
          <div class="col-md-3 text-center"><img src="img/products/1470167332-GalaxyS7_Edge.png"  width="250" height="250" class="img-responsive">
          </div>
          <div class="col-md-3 text-center"><img src="img/products/1470167332-GalaxyS7_Edge.png"  width="250" height="250" class="img-responsive">
          </div>
      </div>

      <div class="row" style="margin-bottom:20px">
          <div class="col-md-3">
              <p>Lenovo Thinkpad</p>
              <p>$4.99</p>
          </div>
          <div class="col-md-3">
              <p>Samsung Galaxy Tablet</p>
              <p>$3.99</p>
          </div>
          <div class="col-md-3">
              <p>Galaxy S7_Edge</p>
              <p>$5.99</p>
          </div>
          <div class="col-md-3">
              <p>Galaxy S7_Edge</p>
              <p>$5.99</p>
          </div>
      </div>

      </div>

  </div>


</div>

<div class="bs-docs footer" style="background-color:#2a2730;display:block;height:69px">
  <div class="container" style="padding-left:15px;padding-top:28px;">
    <div class="bs-docs-footer-links" style="color:white">
      <p style="display:inline;margin-right:30px"><a href="https://github.com/jdc747/webstore">Github</a></p>
      <p style="display:inline;margin-right:30px">Facebook</p>
      <p style="display:inline;margin-right:30px">Twitter</p>
  </div>
</div>




@stop