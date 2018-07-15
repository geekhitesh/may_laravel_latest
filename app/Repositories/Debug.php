<?php

namespace App\Repositories;

class Debug {
	
	private static $indent_level = 1;


	public static function all($value)
	{
		$debug = env('debug');
		$level = env('debug_level');
		if($debug==true && $level == 'all')
		{
			Debug::app($value);
			Debug::database($value);
			Debug::core($value);
		}	
	}

	public static function trace($value)
	{
		$debug = env('debug');
		$level = env('debug_level');
		$spaces = "";
		if($debug==true && $level == 'trace')
		{
			if(strpos($value,'Entering') === false)
			{
				Self::$indent_level--;

			}
			else
			{
				Self::$indent_level++;
			}
			
			for($i=0;$i < Self::$indent_level;$i++)
			{
				$spaces.='---------';
			}
			echo "<br/>$spaces -> $value";
		}			
		
	}
	
	public static function database($value)
	{
		$debug = env('debug');
		$level = env('debug_level');
		if($debug==true && $level == 'db')
		{
			echo "$value<br/>";
		}	
		
	}
	
	public static function application($value)
	{
		$debug = env('debug');
		$level = env('debug_level');
		if($debug==true && $level == 'app')
		{
			echo "$value<br/>";
		}			
		
	}
	
	public static function core($value)
	{
		$debug = env('debug');
		$level = env('debug_level');
		if($debug==true && $level == 'core')
		{
			echo "$value<br/>";
		}			
		
	}
	
	public static function dump($level,$value)
	{
		switch($level)
		{
			case 'all':
				Debug::all($value);
				break;
			case 'db':
				Debug::database($value);
				break;
			case 'core':
				Debug::core($value);
				break;
			case 'app':
				Debug::application($value);
				break;
			case 'trace':
				Debug::trace($value);
				break;				
		}
		
	}


}