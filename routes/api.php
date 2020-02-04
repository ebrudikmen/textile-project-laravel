<?php


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

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Auth Routes...
Route::group(['prefix' => 'auth'], function () {
    Route::post('signUp', 'Auth\SignUpController@signUp')->name('auth.signUp');
    Route::post('signIn', 'Auth\SignInController@signIn')->name('auth.signIn');
    Route::post('signInAsAdmin', 'Auth\SignInController@signInAsAdmin')->name('auth.signInAsAdmin');
    Route::post('refresh', 'Auth\SignInController@refresh')->name('auth.refresh');
});
//Product Routes
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::post('create', 'ProductController@store')->name('product.store');
    Route::get('{product}', 'ProductController@show')->name('product.show');
    Route::put('{product}', 'ProductController@update')->name('product.update');
    Route::delete('{product}', 'ProductController@delete')->name('product.delete');
});
//Customer Routes
Route::group(['prefix' => 'customers'], function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::post('create', 'CustomerController@store')->name('customer.store');
    Route::get('{customer}', 'CustomerController@show')->name('customer.show');
    Route::put('{customer}', 'CustomerController@update')->name('customer.update');
    Route::delete('{customer}', 'CustomerController@delete')->name('customer.delete');
});
//Supplier Routes
Route::group(['prefix' => 'suppliers'], function () {
    Route::get('/', 'SupplierController@index')->name('supplier.index');
    Route::post('create', 'SupplierController@store')->name('supplier.store');
    Route::get('{supplier}', 'SupplierController@show')->name('supplier.show');
    Route::put('{supplier}', 'SupplierController@update')->name('supplier.update');
    Route::delete('{supplier}', 'SupplierController@delete')->name('supplier.delete');
});

//Purchase Routes
Route::group(['prefix' => 'purchases'], function () {
    Route::get('/', 'PurchaseController@index')->name('purchase.index');
    Route::post('create', 'PurchaseController@store')->name('purchase.store');
    Route::get('{purchase}', 'PurchaseController@show')->name('purchase.show');
    Route::put('{purchase}', 'PurchaseController@update')->name('purchase.update');
    Route::delete('{purchase}', 'PurchaseController@delete')->name('purchase.delete');
});

//Sale Routes
Route::group(['prefix' => 'sales'], function () {
    Route::get('/', 'SaleController@index')->name('sale.index');
    Route::post('create', 'SaleController@store')->name('sale.store');
    Route::get('{sale}', 'SaleController@show')->name('sale.show');
    Route::put('{sale}', 'SaleController@update')->name('sale.update');
    Route::delete('{sale}', 'SaleController@delete')->name('sale.delete');
});

