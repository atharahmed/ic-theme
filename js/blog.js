(function ($) {
    $(function () {
        var $body = $('body');

        $('.category-select').on('change', function (e) {
            window.location = e.val;
        });

        /* Search bar
         *******************************************/
        var $controlsWrap = $('#section-filter .controls-wrap'),
            $searchWrap = $controlsWrap.find('.search'),
            $searchButton = $searchWrap.find('.btn'),
            $searchInput = $searchWrap.find('input[type=search]');

        $searchButton.on('click', function (e) {
            e.stopPropagation();

            // open search if it's not already open
            if (!searchOpen()) {
                $controlsWrap.addClass('search-open');
                $searchInput.focus();
                return false;
            }
        });

        $body.on('click', function () {
            if (searchOpen()) {
                $controlsWrap.removeClass('search-open');
                $searchInput.blur();
            }
        });

        $searchInput.on('click', function(e) {
            if (searchOpen()) { e.stopPropagation(); }
        });

        function searchOpen() {
            return $controlsWrap.hasClass('search-open');
        }
    });
})(jQuery);