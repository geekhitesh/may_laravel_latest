<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
	
	public function products()
	{
		return $this->belongsToMany('App\Product','products_packages');		
	}
}
