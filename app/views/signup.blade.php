@extends('Layouts.main')

@section('title')
<title>Registration Page</title>
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
			@if(Session::has('validation_messages'))
				<div class="alert alert-danger" role="alert">
					<h4>Oops! Something is wrong!</h4>
				  	@foreach(Session::get('validation_messages')->all() as $error)
				  		{{$error}}<br>
				  	@endforeach
				</div>
			@endif

			<h1 class="text-center">Registration Form</h1>

			{{Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST', 'class' => 'form-horizontal'])}}
			<div class="form-group">
				<label class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-10">
					{{Form::text('first_name', null, [ 'placeholder' => 'First Name', 'required', 'class' => 'form-control'])}}
				</div>	
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-10">
					{{Form::text('last_name', null, [ 'placeholder' => 'LastName', 'required', 'class' => 'form-control'])}}
				</div>	
			</div>
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
				<label class="col-sm-2 control-label">Re-type Password</label>
				<div class="col-sm-10">
					{{ Form::password("repassword" , [ 'placeholder' => 'Re-type Password', 'class' => 'form-control', 'required'])}}
				</div>	
			</div>	
			
		
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				{{ Form:: submit('Sign Up', [ 'class' => 'btn btn-primary btn-block']) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 text-center">
				<p class="text-center">Already an account? <a href="/login" class="btn btn-link">Login</a></p>	
				
				</div>
			</div>

			{{Form::close()}}
		</div>

		<!--col 3 -->
		<div class="col-md-3">
		</div>	
	</div>

@stop
