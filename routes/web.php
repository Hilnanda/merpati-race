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

// Admin Menu
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

        //team
        Route::get('/list-team', 'ListTeamController@index')->name('list-team');
        Route::post('/team/create', 'ListTeamController@create');
        Route::get('/team/delete/{id}', 'ListTeamController@destroy');
        Route::post('/team/edit', 'ListTeamController@edit');
        Route::get('/team/verifikasi/{id}', 'ListTeamController@verifikasi');

        // Event
        Route::get('/list-event', 'EventController@index')->name('list-event');
        Route::post('/event/create', 'EventController@store');
        Route::post('/event/update/{id}', 'EventController@update');
        Route::get('/event/delete/{id}', 'EventController@destroy');

        // Event Hotspot
        Route::post('/event/add-hotspot', 'EventController@addHotspot');
        Route::post('/event/update-hotspot', 'EventController@updateHotspot');
        Route::get('/event/delete-hotspot/{id}/{id_event}', 'EventController@destroyHotspot');

        // Loft
        Route::get('/list-loft', 'LoftController@index')->name('list-loft');
        Route::post('/loft/create', 'LoftController@store');
        Route::post('/loft/update/{id}', 'LoftController@update');
        Route::get('/loft/delete/{id}', 'LoftController@destroy');

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

        //user 
        Route::get('/user', 'ListUserController@index')->name('list-user');

        // about us
        Route::get('/cms-about-us', 'CmsHomeController@about_us')->name('cms-about-us');
        Route::post('/about-us/create', 'CmsHomeController@about_us_create');
        Route::post('/about-us/edit', 'CmsHomeController@about_us_update')->name('about-us-edit');
        Route::get('/about-us/delete/{id}', 'CmsHomeController@about_us_destroy');

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
                Route::post('/header-create','CmsHomeController@header_create')->name('cms-header-create');

                //delete data
                Route::get('/medsos-delete/{id}','CmsHomeController@medsos_destroy');
                Route::get('/footer-delete/{id}','CmsHomeController@footer_destroy');
                Route::get('/header-delete/{id}','CmsHomeController@header_destroy');

                //edit data
                Route::post('/medsos-edit', 'CmsHomeController@medsos_update')->name('medsos-edit');
                Route::post('/footer-edit', 'CmsHomeController@footer_update')->name('footer-edit');
                Route::post('/header-edit', 'CmsHomeController@header_update')->name('header-edit');
                Route::post('/header_update_title', 'CmsHomeController@header_update_title')->name('header_update_title');

            });
    });

// User Subscribed Menu
Route::middleware('is_subscribed')->group(function () {
    // Clubs
    Route::get('/club', 'ClubController@index')->name('club');    
    Route::get('/club/{id}/detail_belum_ikut','ClubController@detail_belum_ikut')->name('club_detail_belum_detail');
    Route::get('/club/{id}/detail_ikut','ClubController@detail_ikut')->name('club_detail_ikut');
    Route::get('/club/{id}/detail_saya','ClubController@detail_saya')->name('club_detail_ikut');
    Route::post('/club/join','ClubController@join_club')->name('join_club');
    Route::post('/club/join-operator','ClubController@join_operator');
    Route::get('/club/{id}/permintaan_gabung','ClubController@manager')->name('manager');
    Route::get('/club/acc/{id}','ClubController@acc_club')->name('acc_club');
    Route::get('/club/acc/{id}/delete','ClubController@del_club')->name('del_club');
    Route::get('/club/delete-operator/{id}', 'ClubController@destroy_operator');
    Route::get('/club/join_loft_club/{id}/{id_club}', 'ClubController@join_loft_club');
    Route::post('/club/add_lomba/{id}','EventClubController@store');
    Route::get('/club/desc_loft/{id_loft}/{id_club}', 'ClubController@desc_loft');

    
    // Event Hotspot club   
    Route::post('/club/event/add-hotspot', 'EventClubController@addHotspot');
    Route::post('/club/event/update-hotspot', 'EventClubController@updateHotspot');
    Route::get('/club/event/delete-hotspot/{id}/{id_event}', 'EventClubController@destroyHotspot');

      // Event list club
    //   Route::get('/list-event', 'EventController@index')->name('list-event');
    //   Route::post('/event/create', 'EventController@store');
      Route::get('/club/lihat_data/{id}','EventClubController@index');
      Route::post('/club/event/update/{id}', 'EventClubController@update');
      Route::get('/club/event/delete/{id}', 'EventClubController@destroy');
      Route::get('/club/event-club/{id_event}', 'EventClubController@desc_event');
      Route::get('/club/list-participant/{id_club}', 'EventClubController@list_participant');

    // Events
    Route::get('/events/index', 'EventController@menuPage')->name('events_menu');
    Route::get('/events', 'EventController@index')->name('events');
    Route::get('/events-club', 'EventController@eventClub')->name('event_clubs');
    Route::get('/events/{id}/{hotspot}/details', 'EventController@showDetails')->name('events_details');
    Route::get('/events/{id}/{hotspot}/basket', 'EventController@showBasketedList')->name('events_basketed');
    Route::get('/events/{id}/{hotspot}/live-result', 'EventController@showLiveResults')->name('events_live_result');
    Route::post('/events/{id}/join_event', 'EventController@joinEvent')->name('join_event');

    // Result
    Route::get('/results', 'EventResultController@index')->name('results_menu');

    //team
    Route::get('/team', 'TeamController@index')->name('teams');
    Route::post('/team/create', 'TeamController@team_create');
    Route::post('/team/join-team', 'TeamController@join_team');
    Route::get('/team/details/{id}','TeamController@details_ikut');
    Route::get('/team/details-teamku/{id}','TeamController@details_saya');
    Route::get('/team/details-not-register/{id}','TeamController@details_not_register');
    Route::post('/team/join-team-details', 'TeamController@join_team_not_register');
    
    //pigeons
    Route::get('/pigeons','PigeonsController@index');
    Route::get('/pigeons/burungku','PigeonsController@burungku');
    Route::get('/pigeons/topburung','PigeonsController@topburung');
    Route::post('/pigeons/create','PigeonsController@store');
    Route::post('/pigeons/edit','PigeonsController@update');
    Route::get('/pigeons/delete/{id}','PigeonsController@destroy');
    Route::get('/pigeons/detail/{id}','PigeonsController@detail');

    // update Nama Loft
    Route::Post('/pigeons/update/name_loft/{id}','PigeonsController@update_name_loft');
    // Training Pigeon
    Route::get('/pigeon/training_pigeon/{id_user}','PigeonsController@id_training_pigeon');
    // detail 
    Route::get('/pigeon/detail/{id_user}/{id}','PigeonsController@pigeon_detail');


    // One Loft Race
    Route::get('/one_loft_race','LoftController@index');
    Route::get('/loft/{id}/details', 'LoftController@showLoftDetails')->name('loft_loft_details');
    Route::get('/loft/{id}/details/join-list', 'LoftController@showJoinList')->name('loft_loft_details_join_list');
    Route::get('/loft/events/{id}/{hotspot}/details', 'LoftController@showEventDetails')->name('loft_events_details');
    Route::get('/loft/events/{id}/{hotspot}/basket', 'LoftController@showBasketedList')->name('loft_events_basketed');
    Route::get('/loft/events/{id}/{hotspot}/live-result', 'LoftController@showLiveResults')->name('loft_events_live_result');
    Route::post('/loft/events/{id}/join_event', 'LoftController@joinEvent')->name('join_loft_event');
    Route::post('/loft/events', 'LoftController@createEvent')->name('create_loft_event');

    Route::get('/loft/acc/{id}', 'LoftController@acc_join');
    Route::get('/loft/acc/{id}/delete', 'LoftController@delete_join');


    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

