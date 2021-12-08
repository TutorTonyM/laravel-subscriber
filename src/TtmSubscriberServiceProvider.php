<?php

namespace TutorTonyM\Subscriber;

use Illuminate\Support\ServiceProvider;

class TtmSubscriberServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}