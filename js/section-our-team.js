(function ($) {
    $(function() {
        var $window = $(window),
            $staffImages = $('#section-our-team .image-wrap'),
            $staffColumn = $('.col-staff'),
            currentStaffIndex = 0,
            imagesLoaded = false,
            scrolledIntoView = false,
            animationStarted = false,
            interval;

        // listen for resize to set the height of the container
        $window.on('resize.ic-our-team', function() {
            $staffColumn.css('height', $staffColumn.width() * 0.2);
        }).trigger('resize.ic-our-team');

        // once loading is complete, set flag and begin animation if scrolled into view
        $window.on('load.ic-our-team', function() {
            imagesLoaded = true;
            if (scrolledIntoView && !animationStarted) {
                startAnimation();
            }

            $window.off('load.ic-our-team');
        });

        // start animation when our team section scrolls into view (if images are loaded)
        $window.on('scroll.ic-our-team', function() {
            var staffColumnOffsetTop = $staffColumn.offset().top,
                windowHeight = $window.height();

            if ($window.scrollTop() + windowHeight >= staffColumnOffsetTop + 100) {
                scrolledIntoView = true;
                if (imagesLoaded && !animationStarted) {
                    $window.off('scroll.ic-our-team');
                    startAnimation();
                }
            }
        }).trigger('scroll.ic-our-team');

        function startAnimation() {
            animationStarted = true;
            updateStaff();
            interval = setInterval(updateStaff, 5000);
        }

        function updateStaff() {
            var $currentStaffImages = $('#section-our-team .image-wrap:visible'),
                $newStaffImages,
                staffDisplayCount = 4,
                scaleDelayMultiplier = 100,
                animateInDelay = 0;

            // grab new staff images and update current staff index
            if (currentStaffIndex + staffDisplayCount < $staffImages.length) {
                $newStaffImages = $staffImages.slice(currentStaffIndex, currentStaffIndex + staffDisplayCount);
                currentStaffIndex = currentStaffIndex +  staffDisplayCount;
            }
            else {
                $newStaffImages = $staffImages.slice(currentStaffIndex);
                $newStaffImages = $newStaffImages.add($staffImages.slice(0, staffDisplayCount - $newStaffImages.length));
                currentStaffIndex = Math.max(1, staffDisplayCount - $newStaffImages.length);
            }

            // animate out current images if there are any
            if ($currentStaffImages.length > 0) {
                animateInDelay = 700;

                $.each($currentStaffImages, function(index, value) {
                   setTimeout( function() {
                       $(value).removeClass('scale-up');
                       $(value).addClass('scale-down');
                   }, 100 + scaleDelayMultiplier * index);
                });

                setTimeout(function () {
                    $currentStaffImages.removeClass('scale-down active first').addClass('inactive');
                }, 200 + scaleDelayMultiplier * staffDisplayCount);
            }

            // animate in new images
            setTimeout(function () {
                $newStaffImages.removeClass('inactive').addClass('active');
                $.each($newStaffImages, function(index, value) {
                    if (index === 0) { $(value).addClass('first'); }
                    setTimeout(function () { $(value).addClass('scale-up'); }, 100 + 100 * index);
                });
            }, animateInDelay);
        }
    });
})(jQuery);