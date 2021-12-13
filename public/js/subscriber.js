$(document).ready(function(){
    let form = $('#subscriber-form');
    let alertModal = $('#alert-modal');
    let modals = $('.subscriber-modal');

    if (modals.length > 0){
        modals.each(function(){
            let closeButton = $(this).find('.modal-close');

            closeButton.click(function(){
                alertModal.css('display', 'none');
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
        let errorContainer = form.find('#subscriber_email_error');

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize()
        }).done(function (data) {
            errorContainer.empty();
            if (data.success) {
                alertSuccess(data);
                form[0].reset();
            }
            else {
                alertFail(data);
            }
        }).fail(function (error) {
            if (error.status === 422){
                let errorMessage = error.responseJSON.errors.subscriber_email;
                errorContainer.empty();
                errorContainer.html(errorMessage);
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
