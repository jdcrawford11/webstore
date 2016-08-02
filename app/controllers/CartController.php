<?php

class CartController extends BaseController {

	public function getIndex(){
		var_dump('product was added to cart');
		var_dump('cart index page');

	}

	public function postAddToCart(){
		//var_dump('adding to cart');

		//var_dump(Input::get('product'));
		//var_dump(Input::get('quantity'));

		$product_id = Input::get('product');
		//$quantity = Input::get('quantity');

		$product = Product::find($product_id);
		//$total = $quantity * $product->price;
		$total = $product->price;


		Cart::create([
			'product_id' => $product_id,
			//'quantity' => $quantity,
			'total' => $total,


		]);

		return Redirect::route('cart');

}


}