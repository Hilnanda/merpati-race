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

Route::get('/', 'HomeController@index')->name('home');


Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth','admin'])
    ->group(function () {
        Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        Route::get('/list-club', 'ClubController@index')->name('list-club');
        Route::get('/cms-header', 'CmsHomeController@index')->name('cms-header-dashboard');

        // kelompok untuk cms
        // http admin/cms/...
        Route::prefix('cms')
            ->group(function () {
                // show page
                Route::get('/cms-header', 'CmsHomeController@header')->name('cms-header-dashboard');
                Route::get('/cms-content', 'CmsHomeController@content')->name('cms-content-dashboard');
                Route::get('/cms-footer', 'CmsHomeController@footer')->name('cms-footer-dashboard');

                // create data
                Route::post('/medsos-create','CmsHomeController@medsos_create')->name('cms-medsos-create');
            });
    });
