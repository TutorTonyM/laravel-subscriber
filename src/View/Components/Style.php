<?php

namespace TutorTonyM\Subscriber\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Style extends Component
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
        $path = File::exists(resource_path('views\components\vendor\TutorTonyM\subscriber\style.blade.php'))
            ? 'components.vendor.TutorTonyM.subscriber.style'
            : 'ttm-subscriber::style';

        return view($path);
    }
}