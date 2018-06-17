<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;

class Product extends Model
{
    //
	
	
	public function productCategory()
	{
		return $this->belongsTo('App\ProductCategory');		
	}
	
	
	public function packages()
	{
		return $this->belongsToMany('App\Package','products_packages');	
	}
}
