@props([
'label',
'input',
'button',
])

<form id="subscriber-form" method="POST" action="{{ route('subscriber.store') }}" {{ $attributes }}>

        @csrf

        @if(isset($label))
            <label for="subscribe_email" {{ $label->attributes }}>{{ $label == '' ? $labelText : $label }}</label>
        @else
            <label for="subscribe_email">{{ $labelText }}</label>
        @endif

        @if(isset($input))
            <input {{ $input->attributes }}
                       id="subscriber_email"
                       type="email"
                       name="subscriber_email"
                       value="{{ old('subscriber_email') }}"
                       placeholder="{{ $input == '' ? $inputText : $input }}">
        @else
            <input id="subscriber_email"
                       type="email"
                       name="subscriber_email"
                       value="{{ old('subscriber_email') }}"
                       placeholder="{{ $inputText }}">
        @endif

        @if(config('ttm-subscriber.google_recaptcha'))
            @if(isset($button))
                <button id="submit-subscription-with-recaptcha-button" type="submit" {{ $button->attributes }}>{{ $button == '' ? $buttonText : $button }}</button>
            @else
                <button id="submit-subscription-with-recaptcha-button" type="submit">{{ $buttonText }}</button>
            @endif
            <input id="recaptcha-response-field" type="hidden" name="g_recaptcha_response">
            <span id="subscriber_recaptcha_error" class="subscriber-validation-error-message"></span>
        @else
            @if(isset($button))
                <button id="submit-subscription-button" type="submit" {{ $button->attributes }}>{{ $button == '' ? $buttonText : $button }}</button>
            @else
                <button id="submit-subscription-button" type="submit">{{ $buttonText }}</button>
            @endif
        @endif

        @if(isset($error))
            <span id="subscriber_email_error" {{ $error->attributes->class(["subscriber-validation-error-message"]) }}></span>
        @else
            <span id="subscriber_email_error" class="subscriber-validation-error-message"></span>
        @endif

</form>
