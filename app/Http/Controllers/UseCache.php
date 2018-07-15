<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use CustomHelper;
use Debug;

class UseCache extends Controller
{
    //
	
	public function getCategories()
	{
		Debug::dump('trace','Entering Get Categories Function');
		if(Cache::has('category_subcategory'))
		{
			$categories_sub_categories = Cache::get('category_subcategory');
			$categories = $categories_sub_categories['categories'];
			Debug::dump('db',$categories);
			Debug::dump('app','Cache Hit');
			
		}
		else
		{
			Debug::dump('app','Cache Not found. Rebuilding the cache');
			CustomHelper::build_cache();
			Debug::dump('app','Rebuilding the cache successful');
			Debug::dump('core','Cache Should be rebuild every 24 hours.');
		}
		
		Debug::dump('trace','Exiting Get Categories Function');
		
	}
	
	public function getSubCategories()
	{
		
		
	}
}
