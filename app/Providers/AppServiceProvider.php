<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user_id = \Auth::id();
//      RIP DIT WERKT NIET OMDAT DEZE CONTROLLER EERDER WORDT AANGEROEPEN

        $likesCount = 3;
        View::share('likesCount', $likesCount);
    }
}
