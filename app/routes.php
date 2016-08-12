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


// 'before' => 'auth' is a Route filters that is used to allow only authenticated users to access a given route.

Route::get('/', function()
{
	$categories = Category::all();
	$products = Product::all();
	return View::make('hello')->withCategories($categories)->withProducts($products);

	
}); 

Route::get('/search', array('uses' => 'HomeController@search', 'as' => 'search'));

Route::get('category/{id}', array('uses' => 'HomeController@getCategory', 'as' => 'getCategory'));

//Authentication Controller



Route::get('/products', 'ProductController@getIndex');


Route::get('/login', 'AuthenticationController@showLoginView');
Route::post('/login', 'AuthenticationController@loginUser');
Route::get('/logout', 'AuthenticationController@logout');




//Registration Controller
Route::get('/signup', 'RegistrationController@showSignUpView');
Route::post('/signup', 'RegistrationController@signUp');




Route::group(array('prefix' => 'admin'), function(){

Route::get('/', array('uses' => 'AdminController@welcome', 'as' => 'AdminIndex'));

//Routes for Categories (Admin)


Route::get('/newCategory', array('uses' => 'AdminController@newCategory', 'as' => 'NewCategory'));
Route::get('/editCategory/{id}', array('uses' => 'AdminController@editCategory', 'as' => 'editCategory'));


Route::post('/storeCategory', array('uses' => 'AdminController@storeCategory', 'as' => 'storeCategory'));

Route::post('/updateCategory/{id}', array('uses' => 'AdminController@updateCategory', 'as' => 'updateCategory'));
});

Route::get('/deleteCategory/{id}', array('uses' => 'AdminController@deleteCategory', 'as' => 'deleteCategory')); 

//Routes for Products (Admin)

Route::get('/newProduct', array('uses' => 'AdminController@newProduct', 'as' => 'NewProduct'));

Route::get('/editProduct/{id}', array('uses' => 'AdminController@editProduct', 'as' => 'editProduct'));


Route::post('/storeProduct', array('uses' => 'AdminController@storeProduct', 'as' => 'storeProduct'));

Route::post('/updateProduct/{id}', array('uses' => 'AdminController@updateProduct', 'as' => 'updateCategory'));

Route::get('/deleteProduct/{id}', array('uses' => 'AdminController@deleteProduct', 'as' => 'deleteProduct')); 


Route::get('/orders', [
	'before' => 'auth.basic',
	'uses' => 'OrderController@getIndex'
]);


//Shopping Cart (Cart Controller)

Route::post('/cart/add', [
	'before' => 'auth.basic', 
	'uses' => 'CartController@postAddToCart'

	]);

Route::get('/cart', [
	'before' => 'auth.basic',
	'as' => 'cart',
	'uses' => 'CartController@getIndex',

	]);

Route::get('/cart/delete/{id}', [
	'before' => 'auth.basic',
	'as' => 'delete_product_from_cart',
	'uses' => 'CartController@getDelete'

	]);

//Checkout (Order Controller)

Route::get('/checkout', [
	'before' => 'auth',
	'uses' => 'OrderController@getCheckout',
	'as' => 'checkout'

	]);

Route::post('/checkout', [
	'before' => 'auth',
	'uses' => 'OrderController@getConfirmPage'
	]);


Route::get('/checkout/confirm', function() {
	return Redirect::to('/');

});

Route::post('/checkout/confirm', array(
	'before' => 'auth',
	'uses' => 'OrderController@confirm'));

Route::get('/summary', 'OrderController@confirm');



