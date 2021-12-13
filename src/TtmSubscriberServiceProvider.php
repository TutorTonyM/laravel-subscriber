<?php

namespace TutorTonyM\Subscriber;

use Illuminate\Support\ServiceProvider;
use TutorTonyM\Subscriber\View\Components\AlertModal;
use TutorTonyM\Subscriber\View\Components\ReCaptcha;
use TutorTonyM\Subscriber\View\Components\ReCaptchaModal;
use TutorTonyM\Subscriber\View\Components\Resources;
use TutorTonyM\Subscriber\View\Components\Style;
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
        $this->loadViewComponentsAs('ttm-subscriber', [
            Form::class,
            Script::class,
            AlertModal::class,
            Style::class,
            ReCaptcha::class,
            ReCaptchaModal::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views/components', 'ttm-subscriber');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views/components' => resource_path('views/components/vendor/TutorTonyM/subscriber'),
        ], 'components');

        $this->publishes([
            __DIR__.'/../public/js/subscriber.js' => public_path('js/vendor/TutorTonyM/subscriber/subscriber.js'),
        ], 'script-public');

        $this->publishes([
            __DIR__.'/../public/js/subscriber.js' => resource_path('js/vendor/TutorTonyM/subscriber/subscriber.js'),
        ], 'script-resource');

        $this->publishes([
            __DIR__ . '/../public/css/subscriber.css' => public_path('css/vendor/TutorTonyM/subscriber/subscriber.css'),
        ], 'style-public');

        $this->publishes([
            __DIR__ . '/../resources/scss/subscriber.scss' => resource_path('scss/vendor/TutorTonyM/subscriber/subscriber.scss'),
        ], 'style-resource');

        $this->publishes([
            __DIR__.'/../public/js/subscriber.js' => public_path('js/vendor/TutorTonyM/subscriber/subscriber.js'),
            __DIR__ . '/../public/css/subscriber.css' => public_path('css/vendor/TutorTonyM/subscriber/subscriber.css'),
        ], 'public');
    }
}