<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class Matrix3DProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        App::bind('matrix3d',function(){
            return new \App\Classes\Matrix3D;
        });
    }
}
