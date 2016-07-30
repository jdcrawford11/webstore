<?php
 


 
class Product extends Eloquent
{

	public static $rules = ['name' => 'required|min:2',
							 'description' => 'required|min:5',
							 'price' => 'required:numeric',
							 'image' => 'required|image|mimes:png,jpeg,jpg'];

	public static $update_rules = ['name' => 'required|min:2',
								   'description' => 'required|min:5',
							 	   'price' => 'required:numeric',
							       'image' => 'required|image|mimes:png,jpeg,jpg'];
  
}