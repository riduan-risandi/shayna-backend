<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Customers\ApiController;
use App\Http\Controllers\API\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
// Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });





// Route::get('products','API\ProductController@all');
Route::get('/products', 'App\Http\Controllers\API\ProductController@all');
Route::post('/checkout', 'App\Http\Controllers\API\CheckoutController@checkout');
Route::get('/transactions/{id}', 'App\Http\Controllers\API\TransactionController@get');
// Route::get('/customers/{id}', 'App\Http\Controllers\API\CustomerController@login');
// Route::get('/customers/{id}', 'App\Http\Controllers\API\CustomerController@get');
// Route::post('/register', 'App\Http\Controllers\API\RegisterController@register');
// Route::post('/customers', 'App\Http\Controllers\API\\CustomerController@get');



// Route::post('/register', 'App\Http\Controllers\API\Customers\RegisterController@register');
// Route::post('/login', 'App\Http\Controllers\API\Customers\LoginController@get');
  
Route::post('register', [CustomerController::class, 'register']);
Route::post('login', [CustomerController::class, 'authenticate']);
Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [CustomerController::class, 'logout']);
    Route::get('get_customer', [CustomerController::class, 'get_customer']);
    // Route::get('products', [ProductController::class, 'index']);
    // Route::get('products/{id}', [ProductController::class, 'show']);
    // Route::post('create', [ProductController::class, 'store']);
    // Route::put('update/{product}',  [ProductController::class, 'update']);
    // Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});