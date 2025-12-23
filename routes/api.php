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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/get_countries', [App\Http\Controllers\API\APIController::class, 'get_countries'])->name('get_countries');
Route::get('/get_country_area', [App\Http\Controllers\API\APIController::class, 'get_country_area'])->name('get_country_area');
Route::get('/get_tour_slider', [App\Http\Controllers\API\APIController::class, 'get_tour_slider'])->name('get_tour_slider');
