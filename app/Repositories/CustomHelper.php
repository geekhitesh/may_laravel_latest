<?php

namespace App\Repositories;
use Cache;
use App\ProductCategory;
use App\ProductSubCategory;
use Debug;

class CustomHelper {	
	
	public static function __toUpper($string)
	{
		
		return strtoupper($string);
	}
	
	public static function build_cache()
	{
		Debug::dump('trace','Entering Build Cache Function');
		$product_categories = ProductCategory::all();
		$product_sub_categories = ProductSubCategory::all();
		$cache['categories'] = $product_categories;
		$cache['sub_categories'] = $product_sub_categories;
		
		Cache::forever('category_subcategory',$cache);
		
		Debug::dump('trace','Exiting Build Cache Function');
		
	}
	
	public static function destroy_cache()
	{
		cache::forget('category_subcategory');
	}	
	
	public static function debug($value)
	{
		if(env('debug') == true)
		{
			echo "<br/><hr/>$value<hr/><br/>";
		}
			
		
		
		
	}

}

?>