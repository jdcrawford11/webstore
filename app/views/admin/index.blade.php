@extends('Layouts.master')

@section('title')
		Admin Panel 
@stop


@section('content')
	<h3> Admin Panel </h3>

	
	<hr>
<h2> Categories </h2>	
	@foreach($categories as $category) 


	{{ link_to_route('editCategory', $category->name, $category->id) }} || {{ link_to_route('deleteCategory', 'delete', $category->id ) }} <br>

	@endforeach

	<h2> Products </h2>	
	@foreach($products as $product) 


	{{ link_to_route('editProduct', $product->name, $product->id) }} || {{ link_to_route('deleteProduct', 'delete', $product->id ) }} <br>

	@endforeach


@stop