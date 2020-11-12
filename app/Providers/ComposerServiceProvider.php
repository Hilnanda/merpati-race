<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\view;
use App\CMSMedsos;
use App\CMSFooter;
use App\CMSHeader;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       

        View::composer('*', function ($view) {
            $view->with('data_medsos', CMSMedsos::all());
            $view->with('data_footer', CMSFooter::all());
            $view->with('data_header', CMSHeader::all());
            $view->with('nama_website', CMSHeader::select('name_website')->distinct()->get());
        });
    }
}
