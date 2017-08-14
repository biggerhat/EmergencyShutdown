<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.nav', function($view)
        {
            $string = file_get_contents("https://api.twitch.tv/kraken/streams?game=Android%3A%20Netrunner&client_id=utm11rwc9seas2oi0zi8aks3i9ilqu");
            $streams = json_decode($string, true);
            $stream_live = $streams['_total'];
            $view->with('stream_live',$stream_live);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
