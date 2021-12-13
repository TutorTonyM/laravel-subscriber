<div id="alert-modal">

    <div id="modal-content">
        <div id="modal-header">
            <span id="close">&times;</span>
            <h2 id="modal-title"></h2>
        </div>
        <div id="modal-body">
            <p id="modal-message"></p>
        </div>
    </div>

</div>

<div id="recaptcha-modal" class="modal">

    <div class="modal-content">
        <h1 class="modal-title">You are almost done.<br> We just need to make sure you are not a robot!</h1>
        <div class="text-center">
            <div id="g-recaptcha" class="g-recaptcha"
                 data-sitekey="{{ config('subscriber.google_recaptcha_key') }}"
                 data-callback="submit_form"
                 data-expired-callback="close_modal"></div>
            <span class="ajax-error error-red g-recaptcha-response-error"></span>
        </div>
    </div>

    <script>
        function submit_form() {
            let form = $('#recaptcha-modal-btn').closest('form');
            let recaptchaField = $('#recaptcha-response-field');
            let recaptchaToken = $('#g-recaptcha-response').val();
            let modal = $('#recaptcha-modal');

            recaptchaField.val(recaptchaToken);
            form.submit();
            modal.hide();
            grecaptcha.reset()
        }
        function close_modal() {
            let modal = $('#recaptcha-modal');
            modal.hide();
            grecaptcha.reset()
        }
    </script>

</div>