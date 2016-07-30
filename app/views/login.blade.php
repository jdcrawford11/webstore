	<h3> Login </h3>

	<hr>

		{{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST'])}}

		{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required']) }}
		
		{{ Form::password("password" , [ 'placeholder' => 'Password', 'required'])}}

		{{ Form:: submit('Login') }}
	{{Form::close()}}