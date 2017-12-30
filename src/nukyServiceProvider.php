<?php

namespace abr4xas\nuky;

use Illuminate\Support\ServiceProvider;
use Creativeorange\Gravatar\Facades\Gravatar;
use Creativeorange\Gravatar\GravatarServiceProvider;

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

            __DIR__.'/assets/css/theme.min.css'                   => public_path($path.'/css/theme.min.css'),
            __DIR__.'/assets/js/theme.min.js'                     => public_path($path.'/js/theme.min.js'),
            // views
            __DIR__ . '/resources/views'                        => resource_path('views'),
            // Gravatar
            base_path().'/vendor/creativeorange/gravatar/config/gravatar.php' => config_path('gravatar.php'),

            __DIR__ . '/Http/Controllers'  => app_path('Http/Controllers'),
            // routes
            __DIR__ . '/routes/web.php'    => base_path('routes/web.php'),            
            // lang
            __DIR__.'/resources/lang'      => resource_path('lang/vendor/nuky'),


        ], 'nuky');

        // Load views        
        $this->loadViewsFrom(resource_path('views/'), 'nuky');
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
