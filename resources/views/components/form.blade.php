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

        @if(config('subscriber.recaptcha'))
            <input id="recaptcha-response-field" type="hidden" name="g-recaptcha-response">
        @endif

        @if(isset($button))
                <button type="submit" {{ $button->attributes }}>{{ $button == '' ? $buttonText : $button }}</button>
        @else
                <button type="submit">{{ $buttonText }}</button>
        @endif

        @if(isset($error))
            <span class="color-danger email-error validation-error-message"></span>
        @else
            <span id="subscriber_email_error" class="color-danger email-error validation-error-message"></span>
        @endif

</form>
