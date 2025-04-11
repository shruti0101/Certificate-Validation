jQuery(document).ready(function($) {
    $('#searchform').on('submit', function(e) {
        e.preventDefault();

        var certificateID = $('#certificate_id').val();
        var studentName = $('#student_name').val();

        $('.validate-btn').text('Validating...').prop('disabled', true);

        $.ajax({
            url: ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'validate_certificate',
                certificate_id: certificateID,
                student_name: studentName
            },
            success: function(response) {
                $('.validate-btn').text('Validate').prop('disabled', false);
                if (response.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    alert(response.data);
                }
            },
            error: function() {
                $('.validate-btn').text('Validate').prop('disabled', false);
                alert('An error occurred. Please try again.');
            }
        });
    });
});
