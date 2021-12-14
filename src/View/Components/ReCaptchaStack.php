<?php

namespace TutorTonyM\Subscriber\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class ReCaptchaStack extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path = File::exists(resource_path('views\components\vendor\TutorTonyM\subscriber\re-captcha-stack.blade.php'))
            ? 'components.vendor.TutorTonyM.subscriber.re-captcha-stack'
            : 'ttm-subscriber::re-captcha-stack';

        return view($path);
    }
}