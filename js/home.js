(function($) {
    $(function() {
        var $window = $(window),
            muted = false,
            $sectionHomeHeading = $('#section-home-heading');


        if (!Modernizr.touch) {

            /* Video background
             *******************************************/
            $('.video-bg').videobackground({
                videoSource: [
                    ['/wp-content/themes/invisiblechildren2.0/video/home-bg.mp4', 'video/mp4'],
                    ['/wp-content/themes/invisiblechildren2.0/video/home-bg.ogv', 'video/ogg']
                ],
                loop: true,
                resize: false,
                preload: true,
                autoplay: true,
                controls: false,
                loadedCallback: function() {
                    if (!muted) {
                        muted = true;
                        $(this).videobackground('mute');
                    }
                }
            });

            $('.video-bg').prop('muted', true);
        }

        /* Adjust position of programs images
         *******************************************/
        $window.on('resize.home', function() {
            var $images = $('.bg img'),
                offset = parseInt($('.bg').outerWidth() - $images.outerWidth()) / 2,
                left = Math.min(offset, 0);

            $images.css({
                'left': left
            })
        }).trigger('resize.home');
    });
})(jQuery);