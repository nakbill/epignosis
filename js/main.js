jQuery(document).ready(function($) {
    $('#contact-form').submit(function (e) {
        e.preventDefault();
        // Get form data
        var formData = $(this).serialize();

        // Display "Submission in progress" message
        $('#contact-form .js-form-submission').addClass('show');

        // Make the AJAX request
        $.ajax({
            type: 'POST',
            url: obj.ajax_url,
            data: {
                action: 'handle_contact_form',
                formData: formData // Form data
            },
            success: function(response) {
                $('#contact-form .js-form-submission').removeClass('show');
                if (response.success) {
                    $('#contact-form .js-form-success').addClass('show');
                    $('#contact-form')[0].reset();
                } else {
                    $('#contact-form .js-form-error').addClass('show');
                }

                setTimeout(function() {
                    $('#contact-form .js-form-success, #contact-form .js-form-error').removeClass('show');
                }, 1000);
            },
            error: function() {
                $('#contact-form .js-form-submission').removeClass('show');
                $('#contact-form .js-form-error').addClass('show');
                setTimeout(function() {
                    $('#contact-form .js-form-error').removeClass('show');
                }, 1000);
            }
        });
    });

});
