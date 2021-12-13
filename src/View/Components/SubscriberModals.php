<?php

namespace TutorTonyM\Subscriber\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class SubscriberModals extends Component
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
        $path = File::exists(resource_path('views\components\vendor\TutorTonyM\subscriber\alert-modal.blade.php'))
            ? 'components.vendor.TutorTonyM.subscriber.alert-modal'
            : 'ttm-subscriber::alert-modal';

        return view($path);
    }
}