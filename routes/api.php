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

//club
Route::post('club', 'API\ApiClubController@store');
Route::get('club', 'API\ApiClubController@index');
Route::get('club/{id}', 'API\ApiClubController@show');
Route::put('club/{id}', 'API\ApiClubController@update');
Route::delete('club/{id}', 'API\ApiClubController@destroy');

//club_members
Route::post('club_members', 'API\ApiClubMembersController@store');
Route::get('club_members', 'API\ApiClubMembersController@index');
Route::get('club_members/{id}', 'API\ApiClubMembersController@show');
Route::put('club_members/{id}', 'API\ApiClubMembersController@update');
Route::delete('club_members/{id}', 'API\ApiClubMembersController@destroy');

//pigeon
Route::post('pigeon', 'API\ApiPigeonController@store');
Route::get('pigeon', 'API\ApiPigeonController@index');
Route::get('pigeon/{id}', 'API\ApiPigeonController@show');
Route::put('pigeon/{id}', 'API\ApiPigeonController@update');
Route::delete('pigeon/{id}', 'API\ApiPigeonController@destroy');

//user
Route::post('user', 'API\ApiUsersController@store');
Route::get('user', 'API\ApiUsersController@index');
Route::get('user/{id}', 'API\ApiUsersController@show');
Route::put('user/{id}', 'API\ApiUsersController@update');
Route::delete('user/{id}', 'API\ApiUsersController@destroy');


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
