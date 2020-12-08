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

// Access for admins
Route::group(['namespace' => 'API\\Admin', 'prefix' => 'admin/v1'], function () {

	Route::get('medsos', 'CmsHomeController@get_medsos_api');
	// Team
	Route::post('team', 'ApiTeamController@store');
	Route::get('team', 'ApiTeamController@index');
	Route::get('team/{id}', 'ApiTeamController@show');
	Route::put('team/{id}', 'ApiTeamController@update');
	Route::delete('team/{id}', 'ApiTeamController@destroy');

	//club
	Route::get('club/insert', 'ApiClubController@store');
	Route::get('club', 'ApiClubController@index');
	Route::get('club/{id}', 'ApiClubController@show');
	Route::put('club/{id}', 'ApiClubController@update');
	Route::delete('club/{id}', 'ApiClubController@destroy');

	//club_members
	Route::post('club_members', 'ApiClubMembersController@store');
	Route::get('club_members', 'ApiClubMembersController@index');
	Route::get('club_members/{id}', 'ApiClubMembersController@show');
	Route::put('club_members/{id}', 'ApiClubMembersController@update');
	Route::delete('club_members/{id}', 'ApiClubMembersController@destroy');

	//pigeon
	Route::post('pigeon', 'ApiPigeonController@store');
	Route::get('pigeon', 'ApiPigeonController@index');
	Route::get('pigeon/{id}', 'ApiPigeonController@show');
	Route::put('pigeon/{id}', 'ApiPigeonController@update');
	Route::delete('pigeon/{id}', 'ApiPigeonController@destroy');

	//user
	Route::post('user', 'ApiUsersController@store');
	Route::get('user', 'ApiUsersController@index');
	Route::get('user/{id}', 'ApiUsersController@show');
	Route::put('user/{id}', 'ApiUsersController@update');
	Route::delete('user/{id}', 'ApiUsersController@destroy');

	// Event
	Route::put('event/{id}', 'EventController@updateEventLocation');

});

// Access for subscribed users
Route::group(['namespace' => 'API\\Subscribed', 'prefix' => 'subscribed/v1'], function () {

	// Loft
	Route::get('event-inkorf/{id}', 'LoftController@index');
	Route::post('event-inkorf/{id}/{uid}', 'LoftController@inkorfAdd');

});

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
