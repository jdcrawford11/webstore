<?php

class RegistrationController extends \BaseController{

	public function showSignUpView(){

		if(Auth::check()){

			return Redirect::to('/hello');
		}

		return View::make('registration');

	}	


	public function signUp(){

		
		$validation = Validator::make(Input::all(),[
			'first_name' => 'required',
			'last_name' => 'required',
			'email' =>' required|unique:users', 
			'password' => 'required',
			'repassword' => 'required',
			
		]);

		if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');
		$repassword = Input::get('repassword');
	

		//compare passwords

		

			User::create([
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email'	=> $email,
				'password'	=> Hash::make($password),
				
			]);

		


		return Redirect::to('/');


	}

}
