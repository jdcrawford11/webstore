@extends('Layouts.master')

@section('title')
	<title>Edit Product</title>
@stop


@section('content')
	
	<h3> Edit Product: {{ $product->name }} </h3>



	<hr>

	{{ Form::model($product, array('route' => array('storeProduct', $product->id), 'files' => 'true')) }}

	<p> {{ Form::label('name', 'Product Name:') }}</p>
	<p> {{ Form::text('name') }}</p>
	<p> {{ $errors->first('name') }}</p>

	<p> {{ Form::label('description', 'Product Descpription:') }}</p>
	<p> {{ Form::textarea('description') }}</p>
	<p> {{ $errors->first('description') }}</p>

	<p> {{ Form::label('price', 'Price:') }}</p>
	<p> {{ Form::text('price') }}</p>
	<p> {{ $errors->first('price') }}</p>

	<p> {{ Form::label('category', 'Product Category:') }}</p>
	<p> {{ Form::select('category', $categories, $product->category_id) }}</p>
	<p> {{ $errors->first('category') }}</p>

	<p> {{ Form::label('image', 'Product Image:') }}</p>
	<p> {{ Form::file('image') }}  Current Image : {{ HTML::image('img/products/'.$product->image,$product->name,array('width' => 125)) }}</p>
	<p> {{ $errors->first('image') }}</p>




	<p> {{ Form::submit('Add') }}</p>


	{{ Form::close() }}

	
@stop