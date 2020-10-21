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

//compro
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about-us', 'HomeController@about_us')->name('about-us');
Route::get('/product-service', 'HomeController@product_service')->name('product-service');
Route::get('/news', 'HomeController@news')->name('home-news');
Route::get('/news/desc/{id}', 'HomeController@news_desc');


Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth','admin'])
    ->middleware('is_admin')->group(function () {
        Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        // Route::get('/index', 'DashboardController@index')->name('admin-dashboard');
        //club
        Route::get('/list-club', 'ClubController@index')->name('list-club');
        Route::post('/club/create', 'ClubController@create');
        Route::post('/club/edit', 'ClubController@edit');
        Route::get('/club/delete/{id}', 'ClubController@destroy');

        // contact
        Route::get('/list-contact', 'ContactController@index')->name('list-contact');
        Route::post('/contact/create', 'ContactController@create');
        Route::post('/contact/edit', 'ContactController@edit')->name('contact-edit');
        Route::get('/contact/delete/{id}', 'ContactController@destroy');

        // product service
        Route::get('/list-product-service', 'ProductController@index')->name('list-ps');

        //content route admin
        Route::get('/cms-header', 'CmsHomeController@index')->name('cms-header-dashboard');

        //news route admin
        Route::get('/news', 'NewsController@index')->name('news-admin');
        Route::get('/news/{id}', 'NewsController@news_edit');
        Route::post('/news/create', 'NewsController@create');
        Route::post('/news/edit', 'NewsController@edit');
        Route::get('/news/delete/{id}', 'NewsController@destroy');

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

//user club
Route::get('/club','ClubController@page_awal');