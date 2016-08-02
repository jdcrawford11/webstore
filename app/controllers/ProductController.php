<?php

class ProductController extends BaseController{



	public function getIndex(){

		$products = Product::all();
		return View::make('products')->with('products',$products);
	} 

	/*public function getIndex() {
		$categories = array();

		foreach(Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return View::make('products')->with('products', Product::all())->with('categories', $categories);
			}*/




}