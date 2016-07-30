<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

 
class Purchases extends Model
{
   protected $fillable = ['user_id', 'product', 'amount', 'stripe_customer_id'];
}