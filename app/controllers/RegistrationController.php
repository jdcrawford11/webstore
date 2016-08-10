<?php

class RegistrationController extends \BaseController{

	/*
	 * ShowSignUpView:
	 * This function renders the sign up view which consists of
	 * a sign form.
	 */
	public function showSignUpView(){

		if(Auth::check()){
			return Redirect::to('/');
		}

		return View::make('signup');

	}	

	/* 
	 * signUp(): Sign up form on the sign up view POSTS
	 * to this function. 
	 * This function creates a new user and redirects them to login. 
	 */
	public function signUp(){

		$validation = Validator::make(Input::all(),[
			'first_name' => 'required',
			'last_name' => 'required',
			'email' =>' required|unique:users', 
			'password' => 'required',
			'repassword' => 'required'
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
		


		try{

			User::create([
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email'	=> $email,
				'password'	=> Hash::make($password)
			]);

		}catch(Exception $e){

			//Errors Log 
			 Session::flash('error_message', 'Oops! Something is wrong!');
			return Redirect::back()->withInput();
		}


		Session::flash('success_message', 'Success!');
		return Redirect::to('/');

	}

	
}
