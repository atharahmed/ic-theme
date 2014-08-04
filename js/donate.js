(function($) {
    $(function() {
        $('#donation-input').autoNumeric('init');

        /* Fancybox
         *********************************/
        $('.fancybox.story').fancybox({
            width: 800,
            height: 'auto',
            maxWidth: 800,
            autoSize: false,
            scrolling: 'no',
            padding: 0,
            margin: [120, 20, 20, 20]
        });

        $('.fancybox.check').fancybox({
            width: 400,
            height: 'auto',
            autoSize: false,
            scrolling: 'no',
            margin: [120, 20, 20, 20]
        });

    });
})(jQuery);