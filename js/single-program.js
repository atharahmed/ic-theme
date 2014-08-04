(function($) {
    $(function() {

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

    });
})(jQuery);