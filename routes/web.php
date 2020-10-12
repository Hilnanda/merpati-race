<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')->name('home');


Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        Route::get('/list-club', 'ClubController@index')->name('list-club');
    });