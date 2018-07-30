<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Events\OrderShipped;
use Log;

class ProductController extends Controller
{
    //
	
	
	public function get($productId)
	{
		$product = Product::findOrFail($productId);
		//var_dump($product);
		//Log::info('Event Generated!! for product');
		
		event(new OrderShipped($product));
	}
}
