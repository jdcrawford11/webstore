@extends('app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary" style="text-align: center;">Order Page</h1>
    </div>
</div>

<body>
<h2>Products Ordered:</h2>
<p> Wireless Keyboard </p>
<p> Total cost: $20.00 </p>

<h3>Checkout<h3>
<form action="{{url('success')}}" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ $_ENV['stripes_publishable_key']  }}"
    data-amount="2000"
    data-name="Webstore"
    data-description="Product Ordered: Wireless Keyboard"
    data-locale="auto">
  </script>
</form>

</body>

@endsection
