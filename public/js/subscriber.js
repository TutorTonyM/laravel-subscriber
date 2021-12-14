$(document).ready(function(){
    let form = $('#subscriber-form');
    let alertModal = $('#subscriber-alert-modal');
    let recaptchaModal = $('#subscriber-recaptcha-modal');
    let submitButton = $('#submit-subscription-with-recaptcha-button');
    let modals = $('.subscriber-modal');

    submitButton.click(function(event){
        event.preventDefault();
        if ($('#subscriber_email').val() === ''){
            $('#subscriber_email_error').html('You need to provide an EMAIL to subscribe.');
        }
        else{
            recaptchaModal.css('display', 'block');
        }
    });

    if (modals.length > 0){
        modals.each(function(){
            let modal = $(this).closest('.subscriber-modal');
            let closeButton = $(this).find('.modal-close');

            closeButton.click(function(){
                modal.css('display', 'none');
            });
        });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    form.submit(function (event) {
        event.preventDefault();
        let errorContainers = form.find('.subscriber-validation-error-message');
        let emailErrorContainer = form.find('#subscriber_email_error');
        let recaptchaErrorContainer = form.find('#subscriber_recaptcha_error');

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize()
        }).done(function (data) {
            errorContainers.empty();
            if (data.success) {
                alertSuccess(data);
                form[0].reset();
            }
            else {
                alertFail(data);
            }
        }).fail(function (error) {
            if (error.status === 422){
                let emailErrorMessage = error.responseJSON.errors.subscriber_email;
                let recaptchaErrorMessage = error.responseJSON.errors.g_recaptcha_response;
                errorContainers.empty();
                emailErrorContainer.html(emailErrorMessage);
                recaptchaErrorContainer.html(recaptchaErrorMessage);
            }
            else{
                showAlert(fail, 'Sent Failed Ajax', 'Something went wrong and your message could not be sent. Please try again later.');
            }
        });
    });

    function showAlert(type, title, message){
        let titleElement = alertModal.find('.modal-title');
        let messageElement = alertModal.find('.modal-message');

        alertModal.addClass(type);
        titleElement.html(title);
        messageElement.html(message);

        alertModal.css('display', 'block');
    }

    function alertSuccess(data){
        showAlert('success', data.alert_title, data.alert_message)
    }

    function alertFail(data){
        showAlert('fail', data.alert_title, data.alert_message)
    }

    function alertInfo(data){
        showAlert('info', data.alert_title, data.alert_message)
    }

    function alertWarning(data){
        showAlert('warning', data.alert_title, data.alert_message)
    }
});
