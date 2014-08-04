(function($) {
    $(function() {
        /* Start Fundraising Buttons
         *******************************************/
        var $startAdvocatingButton = $('.btn.start-advocating');

        $startAdvocatingButton.on('click', function() {
            _gaq.push(['_trackEvent', 'Get Involved buttons', 'click', 'Advocate']);
            $.scrollTo('#section-sign-up', window.settings.defaultAnimationDuration);
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

        /* Fancybox
         *******************************************/
        $('.fancybox.video').fancybox({
            closeEffect: 'none',
            helpers: {
                media: {}
            },
            scrolling: 'no',
            width: 800,
            height: 450,
            maxWidth: 800,
            maxHeight: 450,
            aspectRatio: true,
            autoSize: false
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

        /* Add event analytics
         *******************************************/
        $('#email-us').on('click', function() {
            _gaq.push(['_trackEvent', 'Get Involved buttons', 'click', 'Advocate - email us']);
        });

    });
})(jQuery);