<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\ProductSubCategory;
use Cache;

class CacheController extends Controller
{
	private $cache;
	
    public function __construct()
	{
		$this->cache = array();
		
	}
	
	public function build()
	{
		$product_categories = ProductCategory::all();
		$product_sub_categories = ProductSubCategory::all();
		$this->cache['categories'] = $product_categories;
		$this->cache['sub_categories'] = $product_sub_categories;
		
		Cache::forever('category_subcategory',$this->cache);
		echo "Cache Built Successfully";
	}
	
	public function destroy()
	{
		cache::forget('category_subcategory');
	}
}
