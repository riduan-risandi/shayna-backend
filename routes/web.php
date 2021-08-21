<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'DashboardController@index');
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Auth::routes();
Auth::routes(['register' => true]); //mematikan tombol register
  
Route::get('/products/{id}/gallery', 'App\Http\Controllers\ProductController@gallery')
        ->name('products.gallery');
        
Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::get('/products/index', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store']);
// Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/edit/{products}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::patch('/products/update/{products}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{products}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('ProductDelete'); 

//Product Gallery
Route::resource('product-galleries', '\App\Http\Controllers\ProductGalleryController');

//Trancastion
Route::get('/transactions/{id}/set-status', 'App\Http\Controllers\TransactionController@setStatus')
        ->name('transactions.status');
Route::resource('transactions', '\App\Http\Controllers\TransactionController');

// Pelanggan 
Route::get('/customers', 'App\Http\Controllers\CustomerController@index');
Route::get('/customers/index', [App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/customers/create', 'App\Http\Controllers\CustomerController@create');
Route::post('/customers/store', 'App\Http\Controllers\CustomerController@store'); 
Route::post('/customers/store', 'App\Http\Controllers\CustomerController@store'); 
Route::get('/customers/edit/{customers}', 'App\Http\Controllers\CustomerController@edit');  

// ItemCategory
Route::get('/item_categories', 'App\Http\Controllers\ItemCategoryController@index');
Route::get('/item_categories/index', [App\Http\Controllers\ItemCategoryController::class, 'index']);
Route::get('/item_categories/create', 'App\Http\Controllers\ItemCategoryController@create');
Route::post('/item_categories/store', [App\Http\Controllers\ItemCategoryController::class, 'store']);
Route::delete('/item_categories/{item_categories}', [App\Http\Controllers\ItemCategoryController::class, 'destroy']); 
Route::get('/item_categories/edit/{item_categories}', [App\Http\Controllers\ItemCategoryController::class, 'edit']);
Route::patch('/item_categories/update/{item_categories}', [App\Http\Controllers\ItemCategoryController::class, 'update']);

 