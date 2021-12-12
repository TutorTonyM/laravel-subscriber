<?php

namespace TutorTonyM\Subscriber\Rules;

use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-z]+[\w\-.]{2,}@([\w\-]{2,}\.)+[\w\-]{2,4}$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The EMAIL must be in a valid format.';
    }
}