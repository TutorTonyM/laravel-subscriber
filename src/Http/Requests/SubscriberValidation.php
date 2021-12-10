<?php

namespace TutorTonyM\Subscriber\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TutorTonyM\Subscriber\Rules\Email;

class SubscriberValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subscriber_email' => ['required', 'string', new Email()]
        ];
    }
}