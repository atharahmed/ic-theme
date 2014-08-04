(function($) {
    $(function() {
        /* Start A Club Buttons
         *******************************************/
        var $startClubButton = $('.btn.start-a-club');

        $startClubButton.on('click', function() {
            $.scrollTo('#section-sign-up', window.settings.defaultAnimationDuration);
            _gaq.push(['_trackEvent', 'Get Involved buttons', 'click', 'Start a club']);
        });

        /* Add event analytics
         *******************************************/
        $('#email-us').on('click', function() {
            _gaq.push(['_trackEvent', 'Get Involved buttons', 'click', 'Start a club - email us']);
        });

        /* Resources navigation
         *******************************************/
        var $filterButtons = $('#section-resources .filters .btn-filter'),
            $content = $('#section-resources .content'),
            $contentSections = $('#section-resources .content-section');

        $filterButtons.on('click', function() {
            var $self = $(this),
                $oldTarget = $contentSections.filter(':visible'),
                $newTarget = $contentSections.filter('.' + $(this).data('target'));

            $self.addClass('selected');
            $filterButtons.not($self).removeClass('selected');

            $content.slideUp(window.settings.defaultAnimationDuration, function() {
                $oldTarget.hide(0);
                $newTarget.show(0);
                $content.slideDown(window.settings.defaultAnimationDuration);
            });
        });


        /* Tips
         *******************************************/
        var toggleAnimating = false;
        $('.tip').on('click', function() {
            if (!toggleAnimating) {
                toggleAnimating = true;

                var toggledContent = $(this).find('.toggle-content'),
                    openContent = $('.toggle-content.open');

                if (toggledContent.css('display') == 'none') {
                    openContent.slideUp(window.settings.defaultAnimationDuration);
                    openContent.removeClass('open');
                }

                toggledContent.slideToggle(window.settings.defaultAnimationDuration, function() {
                    toggleAnimating = false;
                }).toggleClass('open');
            }
        });
    });
})(jQuery);