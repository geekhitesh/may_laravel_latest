<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ProductCategory;

class ProductCategoryController extends Controller
{
    //

	public function detail($product_name)
	{
		$user['name'] = 'Hitesh Ahuja' ;
		$user['id'] = 30490;
		$user['city'] = 'Noida';
		return view('product_detail')->with(compact('user'));	
	}	
	
	public function all()
	{
		$product_categories = ProductCategory::all();
		//return $product_categories;
		return view('product_categories_listing')->with(compact('product_categories'));	
	}
	
	public function insert()
	{
		return "insert success";
	}
	
	public function delete()
	{
		return "delete success";		
	}
	
	public function update()
	{
		return "update success";	
	}
}
