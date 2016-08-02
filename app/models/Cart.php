<?php
	class Cart extends Eloquent{

		protected $fillable = ['product_id', 'quantity', 'total'];

		public function Products(){
			return $this->belongsTo('Product', 'product_id');
		}

		
	}