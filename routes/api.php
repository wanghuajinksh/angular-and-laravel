<?php

use Illuminate\Http\Request;

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
Route::post('uploadImage', 'UploadController@uploadImage')->name('uploadImage');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function() {
    Route::post('dashboard/getUserLists', 'DashboardController@getUserLists');
    Route::post('dashboard/getUserProfile', 'DashboardController@getUserProfile');
    Route::get('dashboard/getPosition', 'DashboardController@getPosition');
});
