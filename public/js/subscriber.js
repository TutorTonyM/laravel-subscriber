$(document).ready(function(){
    let form = $('#subscriber-form');

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
});