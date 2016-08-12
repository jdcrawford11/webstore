<?php
	class Cart extends Eloquent{

		protected $fillable = ['user_id', 'product_id', 'quantity', 'total'];

		public function Products(){
			return $this->belongsTo('Product', 'product_id');
		}

		
	}