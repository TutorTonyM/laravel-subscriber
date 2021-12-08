<?php

namespace TutorTonyM\Subscriber;

use Illuminate\Support\ServiceProvider;
use TutorTonyM\Subscriber\Components\SubscribeForm;

class TtmSubscriberServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewComponentsAs('subscriber', [
            SubscribeForm::class,
        ]);
    }
}