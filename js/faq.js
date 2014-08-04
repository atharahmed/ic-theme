(function($) {
    $(function() {

        /* Open questions accordian-style
         *************************************/

        $('.clickable-region').on('click', function() {
            var toggledContent = $(this).siblings('.toggle-content'),
                openContent = $('.toggle-content.open');

            if (toggledContent.css('display') == 'none') {
                openContent.slideUp(500);
                openContent.removeClass('open');
            }

            toggledContent.slideToggle(500);
            toggledContent.toggleClass('open');
        });

    });
})(jQuery);