(function($) {
    $(function() {

        // Variables
        var spinner = new Spinner({
            lines: 11, // The number of lines to draw
            length: 5, // The length of each line
            width: 3, // The line thickness
            radius: 6, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#FFF', // #rgb or #rrggbb or array of colors
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: '50%', // Top position relative to parent
            left: '50%' // Left position relative to parent
        });

        $('.email-form').click(function() {
            var $this = $(this);

            // init bootstrap validator
            $this.bootstrapValidator({
                live: 'disabled',
                excluded: [':hidden'],
                submitButtons: 'input[type="submit"]',
                trigger: 'keyup',
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required.'
                            },
                            emailAddress: {
                                message: 'Please enter a valid email address.'
                            }
                        }
                    }
                },
                submitHandler: function(validator, $form, submitButton) {
                    $input = $this.find('input[type=email]');
                    // disable input
                    $input.attr('disabled', 'disabled');

                    // display loading spinner
                    displaySpinner(true);

                    // post email address to web service
                    $.post("/wp-admin/admin-ajax.php", {
                            action: 'ic_add_email_to_list',
                            email: $form.find("input[name='email']").val(),
                            listId: $form.data('listid')
                        },
                        function(data) {
                            if (data.success == true) {
                                $form.addClass('success');
                                _gaq.push(['_trackEvent', 'Email Form', 'subscribe']);
                            } else {
                                switch (data.errorCode) {
                                    case 12000:
                                    case 12002:
                                        $form.data('bootstrapValidator').updateStatus('email', 'INVALID', 'emailAddress');
                                        displaySpinner(false);
                                        break;
                                    default:
                                        $form.addClass('error');
                                }
                            }
                        }
                    ).fail(function() {
                        $form.addClass('error');
                    }).done(function() {
                        // disable input
                        $input.removeAttr('disabled');
                    });
                }
            });

            function displaySpinner(show) {
                var $submitBtnWrap = $this.find('.submit-btn-wrap'),
                    $submitBtn = $submitBtnWrap.find('input[type="submit"]');

                if (typeof(show) === 'undefined') show = true;

                if (show) {
                    $submitBtn.attr('disabled', 'disabled').val('');
                    spinner.spin($submitBtnWrap.get(0));
                } else {
                    $submitBtn.removeAttr('disabled').val('Submit');
                    spinner.stop();
                }
            }
        });

    });
})(jQuery);