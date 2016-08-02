
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Webstore</title>

  <link rel="stylesheet" href="css/style.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body>

  <div class="container">
<hr>
  <ul>
  @foreach($products as $product)
  <li>
  <h3>{{ $product->name}}</h3>
 <!-- <p>{{ HTML::image('img/products/'.$product->image,$product->name,array('width' => 125)) }}</p> -->
  <p>price: {{$product->price}}</p> 
  <form action="/cart/add" method="post">
  	<input type="hidden" name="product" value="{{$product->id}}">
  	<label for="">Quantity</label>
  	<select name="Quantity id="">
  	<option value = "1">1</option>
  	<option value = "2">2</option>
  	<option value = "3">3</option>
  	<option value = "4">4</option>
  	<option value = "5">5</option>
  	</select>
  	<button class="btn btn-danger">Add to Cart</button>

  	</form>
  	</li>
  	@endforeach
	</ul>
  	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>






















