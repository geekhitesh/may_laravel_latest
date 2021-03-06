<?php


use Illuminate\Support\Facades\Redis;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test-redis', function () {
   $visits = Redis::incr('visits');
   return $visits;
});

Route::get('/test-layout', function () {
    return view('layout_extend');
});

Route::get('/test-me','TestController@myTest');
Route::get('/product-category/detail/{product_name}','ProductCategoryController@detail');
Route::get('/product-category/all','ProductCategoryController@all');
Route::get('/product-category/insert','ProductCategoryController@insert');
Route::get('/product-category/update','ProductCategoryController@update');
Route::get('/product-category/delete','ProductCategoryController@delete');

Route::get('/product/get/{id}','ProductController@get');


Route::get('test-pusher', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});


Route::get('/test', function () {

	//return  App\Customer::find(1)->get(); // get customer
	//return  App\Customer::find(1)->addresses; // get customer addresses
	//return  App\Customer::find(1)->orders; // get all orders
	//return  App\Customer::find(1)->cart; // get all items in cart
	
    //return  App\User::find(1)->get(); // get user
    //return  App\User::find(1)->addresses; // addresses
    //return  App\User::find(1)->product_categories; // product categories
    //return  App\User::find(1)->product_sub_categories; // product sub categories


	
	//return App\ProductCategory::all()->where('id','1002'); // get product category
	//return App\ProductCategory::find(1001); // get product category
    // return App\ProductCategory::find(1001)->products; // get products
	// return App\ProductCategory::find(2)->user; // get corresponding user

	//return App\ProductSubCategory::all()->where('id','>','1002');
     
	
	//return App\Product::find(1001);
	
	//return App\Product::find(1001)->productCategory;
	
	//return App\Product::find(1002)->packages;
	
	//return App\Package::find(1001);
	
	return App\Package::find(1001)->products;
	 
    //return App\Product::all(); // get product
	//return App\Product::find(1); // get product
	//return App\Product::find(1)->instances; // get product instances - sold
	//return App\Product::find(1)->cart; // get products in cart
	//return App\Product::find(1)->productCategory; // get product category
	//return App\Product::find(1)->productSubCategory; // get product sub category
	//return App\Product::find(1)->discount; // get product discount
	//return App\Product::find(1)->user; // get user who created the product
	//return App\Product::find(2)->groups; // get all groups this product belongs to.

	//return App\Order::find(1); // get order details by id
	//return App\Order::find(1)->customer; // get customer details by order id
	//return App\Order::find(1)->product_instances; // get all items in order

	//return App\ProductInstance::find(1); // get instance details
	//return App\ProductInstance::find(1)->order; // get order details
	//return App\ProductInstance::find(1)->product; // get product details

	//return App\ProductGroup::find(1); // get package details
	//return App\ProductGroup::find(2)->products; // get products in a package

});



Route::middleware(['my_custom_api'])->group(function () {
	Route::get('/test_mw',function() {
		return App\Package::find(1001);
		
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth'])->group(function () {
	Route::get('/test_auth',function() {
		return App\Package::find(1001);
		
	});
	
});


Route::get('/cache/build','CacheController@build');

Route::get('/cache/destroy','CacheController@destroy');


Route::get('/use-cache/get-categories','UseCache@getCategories');


Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');



/*Route::get('/', function () {
	$queue = Queue::push('LogMessage',array('message'=>'Time: '.time()));
   	return $queue;
});*/
 
 
 
class LogMessage
{
	public function fire($job, $date)
	{	 
		File::append(app_path().'/queue.txt',$date['message'].PHP_EOL);
		$job->delete();
	}
}