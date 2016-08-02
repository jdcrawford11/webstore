<!DOCTYPE html>
<html lang="en">
<head>
  <title>Webstore</title>
<!--
  <link rel="stylesheet" href="css/style.css">-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


 
</head>
<body>



<!--<nav class="navbar navbar-default navbar-fixed-top"role="navigation">-->
  <div class="container">
  <nav class="navbar navbar-inverse">

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

    <!--start of search form -->
      <form class ="navbar-form navbar-left" role="search">
        <div class="form-group">
        <input type="text" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-default">
          Search
          </button>
          </form>
          <!--end of search form-->

      <ul class="nav navbar-nav navbar-right">
      
                        <li><a href="/login">Login</a></li>
                        <li><a href="/registration">Signup</a></li>
                    
                        <li><a href="/order">My Orders <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/order">Cart <span class="fa fa-shopping-cart"></span></a></li>
                        <li><a href="/logout">Logout</a></li>
                    
      </ul>
    </div>
  </div>
</nav>

  

  
    <div class="col-md-3">
    <h2>Categories</h2>
    

    
 <!--
     @foreach($categories as $category)

     {{ link_to_route('category', $category->name, $category->id) }}
     @endforeach -->

        <!--
     
        <li><a href="#sec0">Section 0</a></li>
        <li><a href="#sec1">Section 1</a></li>
        <li><a href="#sec2">Section 2</a></li> -->

     
      <p><a href="#">PCs</a></p>
      <p><a href="#">Laptops</a></p>
      <p><a href="#">Tablets</a></p>
      <p><a href="#">Smartphones</a></p> 
      
    </div>


    <div class="col-md-9">
        <h2 id="products">Featured Products</h2>
        <p>
          Add Products Here
        
      
    
       
        <div class="row">
          <div class="col-md-4"><img src="img/products/1469692214-lenovo_thinkpad.jpg" width="250" height="250" class="img-responsive"></div>
          <div class="col-md-4"><img src="img/products/1470167022-Samsung_Galaxy Tablet.jpg"  width="150" height="150" class="img-responsive"></div>
          <div class="col-md-4"><img src="img/products/1470167332-GalaxyS7_Edge.png"  width="250" height="250" class="img-responsive"></div>
        </div>
        
        <hr>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>

