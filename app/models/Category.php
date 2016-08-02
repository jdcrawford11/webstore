<?php 
/**
 * 
 */
 class Category extends Eloquent
 {

 	protected $fillable = [];
 	
 	public static $rules = ['name'=>'required|min:2'];	
 } 