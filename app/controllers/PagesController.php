<?php



class PagesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getOrder()
	{
		return View::make('pages.order');
	}
	//public function postOrder(Request $request)
	public function postOrder()
	{
		$stripe = Stripe::make();

		$charge = $stripe->charges()->create([
			'customer' => 'cus_8tWI8XMgpP4WVD',
			'currency' => 'USD',
			'amount' => 20.00,
		]);

		return $charge;
	}


}
