<?php

use App\Events\getProductFromPOS;
use App\Events\OrderCreatedWebHock;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthTokenControoler;
use App\Http\Controllers\GEtTables;
use App\Http\Controllers\hock2;
use App\Http\Controllers\pointOfSaleController;
use App\Http\Controllers\RefreshController;

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
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/webhock', [AuthTokenControoler::class, 'getTokenWithCode']);
Route::get('/webhock2', [hock2::class, 'hock2']);
Route::post('/webhock2', [hock2::class, 'hock2']);

Route::get('point-of-sale', [pointOfSaleController::class, 'index']);
Route::get('get-products', [pointOfSaleController::class, 'Products']);
Route::get('pay-product',  [pointOfSaleController::class, 'Pay']);
Route::get('get-products-tables', [GEtTables::class, 'products']);
Route::get('get-pos-products-tables', [GEtTables::class, 'PosProducts']);

Route::get('product-print', [GEtTables::class, 'Productprint']);

Route::get('product-code', [GEtTables::class, 'ProductCode']);

Route::post('product-code', [GEtTables::class, 'ProductCodeStore'])->name('product.code.store');
Route::get('test', function () {
    event(new OrderCreatedWebHock('728723488'));
});
Route::get('test2', function () {
    event(new getProductFromPOS('213'));
});

Route::get('refresh-product' , [RefreshController::class , 'Product']);
Route::get('refresh-pos-product' , [RefreshController::class , 'PosProduct']);
