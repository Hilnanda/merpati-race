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
    ->middleware('is_admin')->group(function () {
        Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        // Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        Route::get('/list-club', 'ClubController@index')->name('list-club');
        Route::post('/club/create', 'ClubController@create');
        Route::post('/club/edit', 'ClubController@edit');
        Route::get('/club/delete/{id}', 'ClubController@destroy');
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
                Route::post('/footer-create','CmsHomeController@footer_create')->name('cms-footer-create');

                //delete data
                Route::get('/medsos-delete/{id}','CmsHomeController@medsos_destroy');
                Route::get('/footer-delete/{id}','CmsHomeController@footer_destroy');

                //edit data
                Route::post('/medsos-edit', 'CmsHomeController@medsos_update')->name('medsos-edit');
                Route::post('/footer-edit', 'CmsHomeController@footer_update')->name('footer-edit');

            });
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

