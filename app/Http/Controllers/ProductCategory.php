<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategory extends Controller
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
		$products = array();
		$products[0] = 'Shoes';
		$products[1] = 'Jeans';
		$products[2] = 'T-Shirt';
		$products[3] = 'Lowers';
		return view('product_listing')->with(compact('products'));	
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
