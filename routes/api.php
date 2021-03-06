<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductsController;

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

/**
 ** Basic Routes for a RESTful service:
 **
 ** Route::get($uri, $callback);
 ** Route::post($uri, $callback);
 ** Route::put($uri, $callback);
 ** Route::delete($uri, $callback);
 **
 **/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});


// Route::get('products', function () {
// 	return response(Product::all(), 200);
// });

// Route::get('products/{product}', function ($productId) {
// 	return response(Product::find($productId), 200);
// });


// Route::post('products', function (Request $request) {
// 	$resp = Product::create($request->all());
// 	return $resp;
// });

// Route::put('products/{product}', function (Request $request, $productId) {
// 	$product = Product::findOrFail($productId);
// 	$product->update($request->all());
// 	return $product;
// });

// Route::delete('products/{product}', function ($productId) {
// 	Product::find($productId)->delete();

// 	return 204;
// });

Route::controller(ProductsController::class)->group(function () {
	Route::get('products', 'index');
	Route::get('products/{product}', 'show');
	Route::post('products', 'store');
	Route::put('products/{product}', 'update');
	Route::delete('products/{product}', 'destroy');
});