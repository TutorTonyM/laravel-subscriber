<?php

namespace TutorTonyM\Subscriber;

use Illuminate\Support\ServiceProvider;
use TutorTonyM\Subscriber\View\Components\AlertModal;
use TutorTonyM\Subscriber\View\Components\Modals;
use TutorTonyM\Subscriber\View\Components\ReCaptcha;
use TutorTonyM\Subscriber\View\Components\ReCaptchaModal;
use TutorTonyM\Subscriber\View\Components\ReCaptchaPush;
use TutorTonyM\Subscriber\View\Components\ReCaptchaStack;
use TutorTonyM\Subscriber\View\Components\Resources;
use TutorTonyM\Subscriber\View\Components\ScriptPush;
use TutorTonyM\Subscriber\View\Components\ScriptStack;
use TutorTonyM\Subscriber\View\Components\Style;
use TutorTonyM\Subscriber\View\Components\Form;
use TutorTonyM\Subscriber\View\Components\Script;
use TutorTonyM\Subscriber\View\Components\StylePush;
use TutorTonyM\Subscriber\View\Components\StyleStack;

class TtmSubscriberServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ttm-subscriber.php',
            'ttm-subscriber'
        );
    }

    public function boot()
    {
        $this->loadViewComponentsAs('ttm-subscriber', [
            AlertModal::class,
            Form::class,
            Modals::class,
            ReCaptcha::class,
            ReCaptchaModal::class,
            ReCaptchaPush::class,
            ReCaptchaStack::class,
            Script::class,
            ScriptPush::class,
            ScriptStack::class,
            Style::class,
            StylePush::class,
            StyleStack::class,
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

        $this->publishes([
            __DIR__.'/../config/ttm-subscriber.php' => config_path('ttm-subscriber.php')
        ], 'config');

        $this->register();
    }
}