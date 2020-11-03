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


Route::get('medsos', 'API\CmsHomeController@get_medsos_api');


// Team
Route::post('team', 'API\ApiTeamController@store');
Route::get('team', 'API\ApiTeamController@index');
Route::get('team/{id}', 'API\ApiTeamController@show');
Route::put('team/{id}', 'API\ApiTeamController@update');
Route::delete('team/{id}', 'API\ApiTeamController@destroy');


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});