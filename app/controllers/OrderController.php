<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$user_id = Auth::user()->id;
		$orders = Order::with('orderItems')->where('user_id', '=', $user_id)->get();

		return View::make('orders')->with('orders', $orders);
	}



	public function getCheckout()
	{
		$user_id = Auth::user()->id;
		$address = Input::get('address');

		$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();
		$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');

		return View::make('checkout')->with('cart_total', $cart_total);

	}


	public function getConfirmPage()
	{
		$user_id = Auth::user()->id;

		$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();

		$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');

		

	return View::make('confirm')
			->with('cart_products', $cart_products)
			->with('cart_total', $cart_total);


	} 



public function confirm()
{

	
	

	$user_id = Auth::user()->id;
	//$address = Input::get('address');
	$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();
	$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');
	


	try { 

		$stripe = Stripe::make();

		$charge = $stripe->charges()->create([
			'customer' => 'cus_8tWI8XMgpP4WVD',
			'currency' => 'USD',
			'amount' => $cart_total,
		]);

		$order = Order::create([
			'user_id' => $user_id,
			//'address' => $address,
			'total' => $cart_total


			]); 


			foreach($cart_products as $cart_products){

				$order->orderItems()->attach($cart_products->product_id, [
					'quantity' => $cart_products->quantity,
					'price' => $cart_products->products->price,
					'total' => $cart_products->products->price * $cart_products->quantity


					]);
			}
			//Cart::where('user_id', '=', $user_id)
			//$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();
			//$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');

			//return Redirect::to('summary');
				$user_id = Auth::user()->id;

			$cart_products = Cart::with('Products')->where('user_id', '=', $user_id)->get();

		$cart_total = Cart::with('Products')->where('user_id', '=', $user_id)->sum('total');
			return View::make('summary')
			->with('cart_products', $cart_products)
			->with('cart_total', $cart_total);


		


		
		} catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
  $body = $e->getJsonBody();
  $err  = $body['error'];

 

} catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
	// Get the error message returned by Stripe
    $message = $e->getMessage();


    // Get the status code
    $code = $e->getCode();

} catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
	// Get the error message returned by Stripe
    $message = $e->getMessage();


    // Get the status code
    $code = $e->getCode();

} catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
	// Get the error message returned by Stripe
    $message = $e->getMessage();


    // Get the status code
    $code = $e->getCode();

} catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
	// Get the error message returned by Stripe
    $message = $e->getMessage();


    // Get the status code
    $code = $e->getCode();

    
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
	// Get the error message returned by Stripe
    $message = $e->getMessage();

    // Get the error type returned by Stripe
    // Get the status code
    $code = $e->getCode();
    $error = $e->getMessage();

}
finally { 
			Cart::where('user_id', '=', $user_id)->delete();

			}



}


}
