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
            'subscriber_email' => ['required', 'string', 'unique:subscribers,subscriber_email', new Email()]
        ];
    }

    public function messages()
    {
        return [
            'subscriber_email.required' => 'You need to provide an EMAIL to subscribe.',
            'subscriber_email.unique' => 'This EMAIL has already been registered.',
            'subscriber_email.Email' => 'The EMAIL address has has to be in a valid format.',
        ];
    }
}