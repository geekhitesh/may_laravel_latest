<?php

namespace App\Http\Controllers;

use App\Repositories\CustomHelper;
use Illuminate\Http\Request;

class TestController extends Controller
{
	
	public function myTest()
	{

		$string ="i am here!!";
		
		return CustomHelper::__toUpper($string);
		
		
	}

}
