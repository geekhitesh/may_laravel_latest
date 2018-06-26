<?php

namespace App\Http\Middleware;

use Closure;

use Log;

class My
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$api_token = $request->input('api_token');
		
		echo "Before Processing!!";
		
		$input = $request->all();
		Log::info('##########################Request Started##########################');
		Log::info('-------------Input Request---------------');
		Log::info($input);
		
		if($api_token != 'xXxX')
		{
			return response('Unauthorized Access',401);
		}
		
		Log::info('------------Response---------------');
		$response = $next($request);
		
		Log::info($response);
		Log::info('##########################Request Finished##########################');
        return $response;
		
		
    }
}
