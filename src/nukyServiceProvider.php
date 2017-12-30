<?php

namespace abr4xas\nuky;

use Illuminate\Support\ServiceProvider;
use Creativeorange\Gravatar\Facades\Gravatar;

class nukyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $path = '/nuky';

        $this->publishes([

            __DIR__.'/assets/css/theme.min.css'                     => public_path($path.'/css/theme.min.css'),
            __DIR__.'/assets/js/theme.min.js'                     => public_path($path.'/js/theme.min.js'),
            // Gravatar
            base_path().'/vendor/creativeorange/gravatar/config/gravatar.php' => config_path('gravatar.php'),

        ], 'nuky');

        // Load views        
        $this->loadViewsFrom(resource_path('views/'), 'leadmin');
        // Load translation files
        $this->loadTranslationsFrom(resource_path('lang/vendor/nuky'), 'nuky');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGravatarServiceProvider();
    }

    /**
    * Register Gravatar Service Provider.
    */
    protected function registerGravatarServiceProvider()
    {
       $this->app->register(GravatarServiceProvider::class);
       if (!class_exists('Gravatar')) {
           class_alias(Gravatar::class, 'Gravatar');
       }
    }    
}
