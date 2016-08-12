<?php

class CartController extends BaseController {

	public function getIndex(){
		$user_id = Auth::user()->id;
		$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();

		$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');

		return View::make('cart')
			->with('cart_products', $cart_products)
			->with('cart_total', $cart_total);

	}

	public function postAddToCart(){

		//validation
		$rules = [
			'quantity' => 'required|numeric',
			//check if id exists in the products table
			'product' => 'required|numeric|exists:products,id'
			];



	$validator = Validator::make(Input::all(),$rules);

	if($validator->fails()){
		return Redirect::back()->with('error', 'Product could not be added to your cart');
	
	}


		$user_id = Auth::user()->id;
		
		

		$product_id = Input::get('product');
		$quantity = Input::get('quantity');

		$product = Product::find($product_id);
		$total = $quantity * $product->price;

		//check if product is already in the cart
		$count = Cart::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->count();

		if($count){
			return Redirect::back()->with('error', 'This product already exists in your cart.');
		}


		Cart::create([
			'user_id' => $user_id,
			'product_id' => $product_id,
			'quantity' => $quantity,
			'total' => $total,


		]);

		return Redirect::route('cart');

}

	public function getDelete($id){
		$cart = Cart::find($id)->delete();

		return Redirect::route('cart');
	}


}