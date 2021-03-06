$(function() {
    // Get the form.
    var form = $('#mainForm');
    // Get the messages div.
    var formMessages = $('#form-messages');

    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();
        // Serialize the form data.
        var formData = $(form).serialize();
        console.log(formData)

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('details success');

            // Set the message text.
            $(formMessages).text(response);

            // Clear the form.
            $('#firstName').val('');
            $('#lastName').val('');
            $('#email').val('');
            $('#comments').val('');
        })
        .fail(function(data) {      
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
        });
       
     });
 });