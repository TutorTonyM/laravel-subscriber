<?php

namespace TutorTonyM\Subscriber\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Form extends Component
{
    public $labelText;
    public $inputText;
    public $buttonText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($labelText = 'Subscribe for Special Offers', $inputText = 'Enter your Email', $buttonText = 'SUBMIT')
    {
        $this->labelText = $labelText;
        $this->inputText = $inputText;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path = File::exists(resource_path('views\components\vendor\TutorTonyM\subscriber\form.blade.php'))
            ? 'components.vendor.TutorTonyM.subscriber.form'
            : 'ttm-subscriber::form';

        return view($path);
    }
}