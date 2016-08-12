<?php
	class Order extends Eloquent{

		protected $fillable = ['user_id', 'address', 'total'];


		//Cart relationship to products
		public function orderItems(){
			return $this->belongsToMany('Product', 'order_tables')->withPivot('quantity', 'price', 'total');
		}

		
	}