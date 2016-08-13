@extends('Layouts.main')
@section('title')
<title>Login</title>
@stop

@section('style')
  <link rel="stylesheet" type="text/css" href="/css/login.css">
@stop

@section('content')

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Electronic Store</a>
      <ul class="nav navbar-nav navbar-right">
                        <li><a href="/login">Login</a></li>
                        <li><a href="/signup">Signup</a></li>
      </ul>
</div>
</nav>


<div class="container">	
		<!--col 1 -->
		<div class="col-md-3">
		</div>

		<!--col 2 -->
		<div class="col-md-6 myform">

			@if(Session::has('error_message'))

				<div class="alert alert-danger" role="alert">
				  {{Session::get('error_message')}}
				</div>

			@endif

			<h1 class="text-center">Login</h1>

			{{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}

			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					{{ Form::email('email', null, [ 'placeholder' => 'Email', 
					'class' => 'form-control', 'required']) }}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					{{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required'])}}
				</div>	
			</div>	
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				{{ Form:: submit('Login', [ 'class' => 'btn btn-primary btn-block']) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 text-center">
				<p class="text-center">Don't have an account? <a href="/signup" class="btn btn-link">Sign up</a></p>
				</div>
			</div>
			{{Form::close()}}
		</div>

		<!--col 3 -->
		<div class="col-md-3">
		</div>
</div>

@stop


















