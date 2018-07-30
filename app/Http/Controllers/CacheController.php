<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\ProductSubCategory;
use Cache;
use Mail;
use Log;

use App\Events\CacheBuild;

class CacheController extends Controller
{
	private $cache;
	
    public function __construct()
	{
		$this->cache = array();
		
	}
	
	public function build()
	{
		Log::info('Cache Build Started');
		$product_categories = ProductCategory::all();
		$product_sub_categories = ProductSubCategory::all();
		$this->cache['categories'] = $product_categories;
		$this->cache['sub_categories'] = $product_sub_categories;
		
		Cache::forever('category_subcategory',$this->cache);
		echo "Cache Built Successfully";

		$details['name'] = 'Hitesh Ahuja';
		$details['objects'] = 'categories and subcategories';

		/*Mail::send('cache_email', ['details' => $details], function($message){
         		$message->to('geek.hitesh@gmail.com')->subject('Cache Build Process Finished Successfully');
         		$message->from('abhinavsbbgi@gmail.com');
      		}); 

		Mail::send('cache_email', ['details' => $details], function($message){
         		$message->to('geek.hitesh@gmail.com')->subject('Cache Build Process Finished Successfully');
         		$message->from('abhinavsbbgi@gmail.com');
      		}); 

		Mail::send('cache_email', ['details' => $details], function($message){
         		$message->to('geek.hitesh@gmail.com')->subject('Cache Build Process Finished Successfully');
         		$message->from('abhinavsbbgi@gmail.com');
      	}); */

      	event(new CacheBuild($details));

		Log::info('Cache Build Finished');


	}
	
	public function destroy()
	{
		cache::forget('category_subcategory');
	}
}
