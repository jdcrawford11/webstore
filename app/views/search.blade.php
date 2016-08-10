@extends('Layouts.main')
@section('title')
  <title>Seach</title>

  @stop
@section('content')

<h2>Search Results</h2>

    <h4>Products</h4>
    @unless(count($products)==0)
      @foreach($products as $product)
        {{$product->name}}<br>
        {{$product->description}}<br>
      @endforeach
    @endif
        
    @stop

