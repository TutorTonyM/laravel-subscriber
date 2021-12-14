<div id="subscriber-recaptcha-modal" class="subscriber-modal info">

    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-close">&times;</span>
            <h2 class="modal-title">{{ config('ttm-subscriber.recaptcha-modal-title') }}</h2>
        </div>
        <div class="modal-body">
            <p class="modal-message">{{ config('ttm-subscriber.recaptcha-modal-message') }}</p>
            <div id="g-recaptcha" class="g-recaptcha"
                 data-sitekey="{{ config('ttm-subscriber.google_recaptcha_site_key') }}"
                 data-callback="submit_form"
                 data-expired-callback="close_modal"></div>
            <span class="ajax-error error-red g-recaptcha-response-error"></span>
        </div>
    </div>

    <script>
        function submit_form() {
            $('#recaptcha-response-field').val($('#g-recaptcha-response').val());
            $('#submit-subscription-with-recaptcha-button').closest('form').submit();
            $('#subscriber-recaptcha-modal').hide();
            grecaptcha.reset();
        }
        function close_modal() {
            $('#subscriber-recaptcha-modal').hide();
            grecaptcha.reset();
        }
    </script>

</div>