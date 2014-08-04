(function($) {
    $(function() {

        var $window = $(window);

        // Remove

        $('.watch-video').find('iframe').removeAttr('src');

        /* Start video on button click
         *************************************/

        $('.watch-video-btn').on('click', function() {
            var $videoContainer = $(this).parents('.watch-video'),
                $background = $videoContainer.find('.background-opaque'),
                $video = $videoContainer.find('iframe');

            // Track clicks on play
            _gaq.push(['_trackEvent', 'Videos', 'Play']);

            $background.css({
                'opacity': 1
            });

            $videoContainer.find('.video-container').show(function() {
                $(this).find("iframe").prop("src", function() {
                    return $(this).data("src");
                });

                $video.show()
                    .css({
                        'opacity': 1,
                    });
            });

            $video.load(function() {
                var thisId = this.id,
                    formattedId = $('#' + this.id),
                    iframe = document.getElementById(thisId),
                    player = $f(iframe);

                player.addEvent('ready', function() {
                    player.addEvent('finish', onFinish);
                });

                function onFinish(id) {
                    $background.css({
                        'opacity': 0
                    });
                    formattedId.fadeOut('slow');
                    $(this).find("iframe").prop("src", "");
                }
            });
        });

        /* Center thumbnail image
         *************************************/

        $window.on('resize.videos', function() {
            var $videoThumbnail = $('.video-thumbnail'),
                $imageWidth = $videoThumbnail.width(),
                $windowWidth = $window.width(),
                descriptionWidth = $('.video-description').outerWidth() / 2,
                descriptionHeight = $('.video-description').outerHeight() / 2,
                $description = $('.video-description');

            if (window.settings.mediaQueryExtraSmall) {
                // horizontally center
                $videoThumbnail.offset({
                    left: Math.min(0, ($windowWidth - $imageWidth) / 2)
                });
            } else {
                $videoThumbnail.offset({
                    left: 0
                });
            }

            $description.css({
                'margin-top': -descriptionHeight,
                'top': '50%'
            });
        }).trigger('resize.videos');

    });
})(jQuery);