@extends('Layouts.master')

@section('title')
	<title>Edit Category</title>
@stop


@section('content')
	
	<h3> Edit Category {{ $category->name }} </h3>

	{{ link_to_route('NewCategory', 'Add New Category') }} 


	<hr>

	{{ Form::model($category, array('route' => array('updateCategory', $category->id), 'method' => 'post')) }}

	

	<p> {{ Form::label('category_name') }}</p>
	<p> {{ Form::text('name') }}</p>
	<p> {{ $errors->first('name') }}</p>

	<p> {{ Form::submit('Update') }}</p>


	{{ Form::close() }}

	
@stop