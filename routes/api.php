<?php /** @noinspection PhpUndefinedClassInspection */


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

use Illuminate\Support\Facades\Route;

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

