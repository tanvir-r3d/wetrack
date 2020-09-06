<?php

namespace App\Providers;

use App\Search\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Observers\SettingsObserver;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Setting::observe(SettingsObserver::class);
        Admin::bootSearchable();
        View::composer(["layouts.app_css", "layouts.app_sidebar", "mail.sendMail"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });
    }
}
