<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function search()
	{
		$categories = Category::where('name', 'LIKE', '%'.Input::get('query').'%')->get();
		$products = Product::where('name','LIKE', '%'.Input::get('query').'%')->orWhere('description', 'LIKE', '%'.Input::get('query').'%')->get();
		return View::make('search', compact('categories'))->withProducts($products);


	}

	public function getCategory($id)
	{
		$categories = Category::all();
		$products = Product::where('category_id', "=", $id)->get();

		return View::make('category', compact('categories'))->withProducts($products)->withCurrent($id);




	}

}
