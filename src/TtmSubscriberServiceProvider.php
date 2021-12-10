<?php

namespace TutorTonyM\Subscriber;

use Illuminate\Support\ServiceProvider;
use TutorTonyM\Subscriber\View\Components\Form;
use TutorTonyM\Subscriber\View\Components\Script;

class TtmSubscriberServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadViewComponentsAs('laravel-subscriber', [
            Form::class,
            Script::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views/components', 'laravel-subscriber');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../public/js/subscriber.js' => public_path('js/vendor/TutorTonyM/subscriber.js'),
        ], 'script');
    }
}