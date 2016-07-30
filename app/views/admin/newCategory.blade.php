@extends('Layouts.master')

@section('title')
	<title>Add New Category</title>
@stop


@section('content')
	
	<h3> Add New Category: </h3>

	{{ link_to_route('NewCategory', 'Add New Category') }} 


	<hr>

	{{ Form::open(array('route' => 'storeCategory')) }}

	<p> {{ Form::label('category_name', 'Category Name:') }}</p>
	<p> {{ Form::text('name') }}</p>
	<p> {{ $errors->first('name') }}</p>

	<p> {{ Form::submit('Add') }}</p>


	{{ Form::close() }}

	
@stop