<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
	
	public function __construct()
	{	
		//echo "In Product Category Constructor<br/>";
	}
	
	public function products()
	{	
		return $this->hasMany('App\Product');
		
	}
}