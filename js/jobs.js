(function($) {
    $(function() {

        var loading = false,
            count = 0,
            jobWidth = 320,
            $jobSection = $('#spin-container'),
            $window = $(window);

        /* Spinner
         *******************************************/

        var target = document.getElementById('spin-container');

        var opts = {
            lines: 11, // The number of lines to draw
            length: 5, // The length of each line
            width: 3, // The line thickness
            radius: 6, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            color: '#000', // #rgb or #rrggbb or array of colors
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: '50%', // Top position relative to parent
            left: '50%' // Left position relative to parent
        };

        var spinner = new Spinner(opts).spin(target);

        getJobs('intern');

        $('.filter-bar .btn').on('click', function() {
            var category = this.hash,
                positionType;

            if (!$(this).hasClass('selected')) {
                switch (category) {
                    case '#staff':
                        positionType = 'Full-Time%20Permanent%20Staff';
                        break;
                    case '#intern':
                        positionType = 'intern';
                        break;
                    case '#roadie':
                        positionType = 'roadie';
                        break;
                    default:
                        positionType = 'Full-Time%20Permanent%20Staff';
                        break;
                }

                $(this).addClass('selected');
                $('.selected').not(this).removeClass('selected');

                jqXHR.abort();
                loading = false;

                getJobs(positionType);
            }
        });

        function getJobs(jobs) {

            if (!loading) {
                loading = true;
                $jobSection.addClass('loading');
                $('#positions').html('');

                jqXHR = $.post('/wp-admin/admin-ajax.php', {
                    action: 'ic_jobvite_request',
                    job: jobs,
                    timeout: 5000
                }, function(result) {
                    result = $.parseJSON(result);
                    $('.error-message').remove();
                    if (result.success) {
                        showJobPositions(result.data, function() {
                            loading = false;
                            $jobSection.removeClass('loading');
                        });
                    } else {
                        showError(result.errorMessage, function() {
                            loading = false;
                            $jobSection.removeClass('loading');
                        });
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    error = 'Something went wrong. Check again later.';
                });
            }
        }

        function showJobPositions(content, callback) {
            sizeContainer(content);

            setTimeout(function() {
                $('#positions').append(content);
                callback();
            }, 800);
        }

        function sizeContainer(content) {
            var $filteredJobs = $(content).filter('.jobmeta'),
                jobCount = $filteredJobs.length,
                jobHeight = 165,
                containerWidth = $('#positions').outerWidth(),
                totalWidth = jobWidth * jobCount,
                width = Math.floor(containerWidth / jobWidth),
                numRows = containerWidth > totalWidth ? 1 : Math.ceil(jobCount / width),
                newSectionHeight = jobHeight * numRows,
                currentHeight = null;

            if (count == 0) {
                currentHeight = 0;
                count++;
            } else {
                currentHeight = $('#positions').outerHeight();
            }

            $('#positions')
                .transition({
                    height: currentHeight
                })
                .transition({
                    height: newSectionHeight
                });
        }

        function showError(errorMessage, callback) {
            var currentHeight,
                newSectionHeight = 160;

            if (count == 0) {
                currentHeight = 0;
                count++;
            } else {
                currentHeight = $('#positions').outerHeight();
            }

            $('#positions')
                .transition({
                    height: currentHeight
                })
                .transition({
                    height: newSectionHeight
                });

            setTimeout(function() {
                $('#positions').append('<p class="error-message">' + errorMessage + '</p>');
                $('#job-alerts').click(function() {
                    var scrollTarget = $('#section-email-sign-up');

                    $.scrollTo(scrollTarget, 500);
                    return false;
                });

                callback();
            }, 600);
        }

        $window.on('resize.jobs', function() {
            var $filteredJobs = $('.jobmeta'),
                jobCount = $filteredJobs.length,
                jobHeight = 170,
                containerWidth = $('#positions').outerWidth(),
                totalWidth = jobWidth * jobCount,
                width = Math.floor(containerWidth / jobWidth),
                numRows = containerWidth > totalWidth ? 1 : Math.ceil(jobCount / width),
                newSectionHeight = jobHeight * numRows,
                currentHeight = null;

            $('#positions').css({
                height: newSectionHeight
            });
        });

    });
})(jQuery);