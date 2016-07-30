<?php

class MainController extends BaseController {

	public function hello()
	{
		$product = Product::all();
		return view('main.index',['product' => $product]);
	}



} 
