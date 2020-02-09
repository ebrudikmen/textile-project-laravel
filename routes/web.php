<?php

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
    factory(\App\Models\Customer::class)->times(1000)->create();

    return view('welcome');
});

Route::get('mail', function () {
    $purchase = \App\Models\Purchase::find(1);
    return new App\Mail\PurchasedEmail($purchase);
});


Route::get('ebru', function () {
    $sale = \App\Models\Sale::find(1);
    return new App\Mail\SoldEmail($sale);
});


Route::get('share-post',function (){
    $start = now();
    for ($i=0;$i<10;$i++){
        sleep(1);
    }

    $end = now();

    return "{$end->diff($start)->s} saniye surdu.";
});

Route::get('share-post-with-queue',function () {
    $start = now();
    for ($i = 0; $i < 10; $i++) {
        \App\Jobs\SendEmail::dispatch();
    }
    $end = now();

    return "{$end->diff($start)->s} saniye surdu.";
});
