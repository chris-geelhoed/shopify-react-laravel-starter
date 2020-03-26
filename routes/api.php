<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stuff', function (Request $request) {
    return [
        1, 2, 3
    ];
});

Route::get('/products', function (Request $request) {
    $shop = Auth::user();
    $request = $shop->api()->request('GET', '/admin/products.json');
    return json_encode($request);
})->middleware(['auth.shopify'])->name('products');
