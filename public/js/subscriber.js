$(document).ready(function(){
    let form = $('#subscriber-form');
    let modal = $('#alert-modal');

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

    if (modal.length > 0){
        let closeButton = modal.find('#close');

        closeButton.click(function(){
            modal.css('display', 'none');
        });
    }

    function showAlert(type, title, message){
        let titleElement = modal.find('#modal-title');
        let messageElement = modal.find('#modal-message');

        modal.addClass(type);
        titleElement.html(title);
        messageElement.html(message);

        modal.css('display', 'block');
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
