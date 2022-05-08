<?php

use App\Http\Controllers\hock2;
use App\Events\getProductFromPOS;
use App\Events\OrderCreatedWebHock;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\GEtTables;
use App\Http\Controllers\CardProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SallaProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RefreshController;
use App\Http\Controllers\AuthTokenControoler;
use App\Http\Controllers\pointOfSaleController;
use App\Http\Controllers\SallaProducts;
use Salla\OAuth2\Client\Provider\Salla;

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

Route::post('Admin.home', [SearchController::class, 'search'])->name('search');
Route::get('welecome', [GEtTables::class, 'Productscode']);
Route::post('', [GEtTables::class, 'ProductStore'])->name('product.store');

Route::get('home', function () {
    return view('Admin.home');
});

Route::get('dashboard', [Dashboard::class, 'index'])->name('Dashboard');
Route::get('salla-product', [SallaProducts::class, 'index'])->name('SallaProduct');
Route::get('salla-card', [CardProduct::class, 'PosProducts'])->name('Card');
Route::get('related-product' , [SallaProducts::class , 'selectedProduct'])->name('related.Products');
Route::get('delete-related-product/{id}' , [SallaProduct::class , 'DeletedRelatedProduct'])->name('DeletedRelatedProduct');
Route::get('notification', function () {
    return view('Admin.notification');
});

Route::get('subscription', function () {
    return view('Admin.subscription');
});

Route::get('/webhock', [AuthTokenControoler::class, 'getTokenWithCode']);
Route::get('/', [AuthTokenControoler::class, 'getTokenWithCode']);
Route::get('/webhock2', [hock2::class, 'hock2']);
Route::post('/webhock2', [hock2::class, 'hock2']);

Route::get('login', [AuthController::class,  'getLoginFrom']);
Route::post('login', [AuthController::class,  'login'])->name('login');
Route::middleware('auth:client')->group(function () {
    Route::post('product-search', [SearchController::class, 'search'])->name('search');
    Route::get('point-of-sale', [pointOfSaleController::class, 'index']);
    Route::get('get-products', [pointOfSaleController::class, 'Products']);
    Route::get('pay-product',  [pointOfSaleController::class, 'Pay']);
    Route::get('get-products-tables', [GEtTables::class, 'products']);
    Route::get('get-pos-products-tables', [GEtTables::class, 'PosProducts']);
    Route::get('product-print', [GEtTables::class, 'Productprint']);
    //event(new OrderCreatedWebHock($request->data['items'][0]['product']['id']));
    Route::get('GetFirestPFromPos', [GEtTables::class, 'FirestCode']);
    Route::get('getblance', [GEtTables::class, 'getblance']);
    Route::post('GetOneProdectFromPosToSalla', [GEtTables::class, 'GetOneProdectFromPosToSalla'])->name("GetOneProdectFromPosToSalla");
    Route::get('product-code', [GEtTables::class, 'ProductCode']);
    Route::post('product-code', [GEtTables::class, 'ProductCodeStore'])->name('product.code.store');
    Route::get('refresh-product', [RefreshController::class, 'Product'])->name('refresh.product');
    Route::get('refresh-pos-product', [RefreshController::class, 'PosProduct'])->name('refresh.pos.product');
});
