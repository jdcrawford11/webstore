<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$categories = Category::all();
	//$products = Product::all();
	return View::make('hello')->withCategories($categories);
});

//Authentication Controller
Route::get('/login', 'AuthenticationController@showLoginView');
Route::post('/login', 'AuthenticationController@loginUser');

Route::get('/logout', 'AuthenticationController@logout');

//Route::get('/users', 'AuthenticationController@showUsers');


//Registration Controller
Route::get('/registration', 'RegistrationController@showSignUpView');
Route::post('/registration', 'RegistrationController@signUp');

Route::group(array('prefix' => 'admin'), function(){
//Route::group(array('prefix' => 'admin', 'before' => 'auth'), function(){

Route::get('/', array('uses' => 'AdminController@welcome', 'as' => 'AdminIndex'));

//Routes for Categories

Route::get('/newCategory', array('uses' => 'AdminController@newCategory', 'as' => 'NewCategory'));

Route::get('/editCategory/{id}', array('uses' => 'AdminController@editCategory', 'as' => 'editCategory'));


Route::post('/storeCategory', array('uses' => 'AdminController@storeCategory', 'as' => 'storeCategory'));

Route::post('/updateCategory/{id}', array('uses' => 'AdminController@updateCategory', 'as' => 'updateCategory'));
});

Route::get('/deleteCategory/{id}', array('uses' => 'AdminController@deleteCategory', 'as' => 'deleteCategory')); 

//Routes for Products

Route::get('/newProduct', array('uses' => 'AdminController@newProduct', 'as' => 'NewProduct'));

Route::get('/editProduct/{id}', array('uses' => 'AdminController@editProduct', 'as' => 'editProduct'));


Route::post('/storeProduct', array('uses' => 'AdminController@storeProduct', 'as' => 'storeProduct'));

Route::post('/updateProduct/{id}', array('uses' => 'AdminController@updateProduct', 'as' => 'updateCategory'));

Route::get('/deleteProduct/{id}', array('uses' => 'AdminController@deleteProduct', 'as' => 'deleteProduct')); 



/*Route::get('/',function()
{
	return redirect()->route('order');
}); */

//Route::get('order', ['as' => 'order', 'uses' => 'PagesController@getOrder']);
//Route::post('order', ['as' => 'order-post', 'uses' => 'PagesController@postOrder']);

Route::get('/order','PagesController@getOrder');
Route::post('/order','PagesController@postOrder');



/*	return Redirect::to('order/success');*/

	//Route::post('order',function() {
		//return Redirect::to('success');
	//});


Route::post('/success','PagesController@postOrder');