
	<h1>Registration Form</h1>
	{{Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST'])}}

		{{Form::text('first_name', null, [
		'placeholder' => 'First Name', 'required'])}}
		<br>
		{{Form::text('last_name', null, [
		'placeholder' => 'First Name', 'required'])}}
		<br>
		{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required']) }}
		<br>
		{{ Form::password('password' , [ 'placeholder' => 'Password', 'required'])}}
		<br>
		{{ Form::password('repassword' , [ 'placeholder' => 'Re Type Password', 'required'])}}	
		<br>
		{{ Form:: submit('Submit') }}

		

	{{Form::close()}}
