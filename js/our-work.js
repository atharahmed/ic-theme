(function($) {
    $(function() {

        /* Global vars
         *******************************************/
        var $window = $(window);

        /* Fancybox
         *******************************************/
        $('.fancybox.story').fancybox({
            width: 800,
            height: 'auto',
            maxWidth: 800,
            autoSize: false,
            scrolling: 'no',
            padding: 0,
            margin: [120, 20, 20, 20]
        });

        /* Program categories animation
         *******************************************/
        var isAnimating;
        $('.filter-bar .btn').on('click', function() {
            if (!isAnimating) {
                // set animation flag
                isAnimating = true;

                // grab vars
                var $self = $(this),
                    filter = $self.attr('id'),
                    $programSection = $('#inner-programs'),
                    $programDescription = $('.program-description'),
                    $programs = $('.program'),
                    $headers = $programDescription.find('.header'),
                    $oldHeader = $headers.filter(':visible'),
                    $newHeader = $headers.filter('.' + filter),
                    programDescriptionHeight = $programDescription.outerHeight(),
                    oldHeaderHeight = $oldHeader.outerHeight();

                // update filter button selection
                if ($('.selected').get(0) != $self.get(0)) {
                    $('.selected').removeClass('selected');
                }
                $self.addClass('selected');

                // animate programs section
                $programSection.slideUp(window.settings.defaultAnimationDuration, function() {
                    var $filteredPrograms = filter != 'all' ? $programs.filter('.' + filter) : $programs,
                        $unfilteredPrograms = $programs.not($filteredPrograms);

                    // update program visibility
                    $filteredPrograms.css('display', '');
                    $unfilteredPrograms.css('display', 'none');

                    // slide down programs section
                    $programSection.slideDown(window.settings.defaultAnimationDuration);
                });

                // lock program description height
                $programDescription.css('height', programDescriptionHeight);

                // animate headers
                $oldHeader.animate({
                    opacity: 0
                }, window.settings.defaultAnimationDuration, function() {
                    // remove old header from display
                    $(this).css({
                        display: 'none'
                    });

                    // add new header to display for measurement
                    $newHeader.css({
                        opacity: 0,
                        display: 'block'
                    });

                    // calculate height difference between new and old header
                    var heightDifference = $newHeader.height() - oldHeaderHeight;

                    // animate new header
                    $newHeader.css({
                        position: ''
                    })
                        .animate({
                            opacity: 1
                        }, window.settings.defaultAnimationDuration, function() {
                            isAnimating = false;
                        });

                    // animate program description
                    $programDescription.animate({
                        height: programDescriptionHeight + heightDifference
                    }, window.settings.defaultAnimationDuration, function() {
                        $programDescription.css('height', '');
                    });
                });
            }
        });


        /* Area Graph of LRA attacks
         ********************************/
        var margin = {
                top: 20,
                right: 10,
                bottom: 80,
                left: 60
            },
            currentState,
            isSmall,
            isExtraSmall,
            isSuperSmall;
        $chartArea = $('#bar-chart');

        var dataset = [{
            name: '1999',
            value: 2700
        }, {
            name: '2008',
            value: 800
        }, {
            name: '2010',
            value: 400
        }, {
            name: '2013',
            value: 220
        }];

        xvalues = [];
        yvalues = [];
        $.each(dataset, function(i, v) {
            xvalues.push(v.name);
            yvalues.push(v.value);
        });

        dataset.forEach(function(d) {
            d.name = d.name;
            d.value = +d.value;
        });

        // Redraw graph based on window size
        $(window).on('resize.ic-our-work', function() {
            // update media query flags
            isSmall = Modernizr.mq(window.settings.mediaQuerySmall);
            isExtraSmall = Modernizr.mq(window.settings.mediaQueryExtraSmall) && !Modernizr.mq(window.settings.mediaQuerySuperSmall);
            isSuperSmall = Modernizr.mq(window.settings.mediaQuerySuperSmall);

            // Make picture column the same height as the one besides it
            var columnHeight = $('#last-row').innerHeight(),
                $imageArea = $('#image-zone'),
                $program = $('.program'),
                programWidth = $program.width();

            if (!isExtraSmall) {
                $imageArea.css({
                    'height': columnHeight
                });
            } else {
                $imageArea.css({
                    'height': 'auto'
                });
            }

            if (!isSmall && !isExtraSmall) {
                $program.css({
                    'height': programWidth
                });
            } else {
                $program.css({
                    'height': 'auto'
                });
            }

            // Draw Area Chart
            if (isSuperSmall && currentState != 'mobileSuperSmall') {
                currentState = 'mobileSuperSmall';

                width = 290 - margin.left - margin.right;
                height = 250 - margin.top - margin.bottom;
                $('#bar-chart').html('');
                removeGraphPath();
                drawAreaChart();

            } else if (!isSuperSmall && currentState != 'desktop') {
                currentState = 'desktop';

                width = 400 - margin.left - margin.right;
                height = 300 - margin.top - margin.bottom;
                $('#bar-chart').html('');
                removeGraphPath();
                drawAreaChart();
            }

        }).trigger('resize.ic-our-work');


        function removeGraphPath() {
            $('.bar').remove();
            $chartArea.removeClass('grow-graph');
        }

        // Grow graph when it reaches your viewport
        $window.on('scroll.ic-our-work', function() {
            var scrollTop = $window.scrollTop(),
                triggerPoint = $chartArea.offset().top,
                windowHeight = $window.height();

            if (scrollTop > (triggerPoint - (windowHeight / 2) - 50) && !$chartArea.hasClass('grow-graph')) {
                $chartArea.addClass('grow-graph');
                drawChartPath();
            } else if (scrollTop <= (triggerPoint - windowHeight)) {
                removeGraphPath();
            }
        }).trigger('scroll.ic-our-work');


        function drawAreaChart() {

            svg = d3.select("#bar-chart").append("svg")
                .attr('class', 'chart')
                .attr('width', width + margin.left + margin.right)
                .attr('height', height + margin.top + margin.bottom)
                .append('g')
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            x = d3.scale.ordinal()
                .rangeRoundBands([0, width], .2);

            y = d3.scale.linear()
                .range([height, 0])
                .domain([0, 3200]);

            x.domain(dataset.map(function(d) {
                return d.name;
            }))
            y.domain([0, d3.max(dataset, function(d) {
                return d.value + 200;
            })]);

            pointers = svg.append("defs").append("marker")
                .attr("id", "circ")
                .attr("markerWidth", 12)
                .attr("markerHeight", 12)
                .attr("refX", 1.3)
                .attr("refY", 1.3)
                .append("circle")
                .attr("cx", 1.3)
                .attr("cy", 1.3)
                .attr("r", 1.3);

            yAxis = d3.svg.axis()
                .scale(y)
                .tickSize(0)
                .ticks(6)

            .tickPadding(10)
                .outerTickSize(0)
                .orient("left");

            xAxis = d3.svg.axis()
                .scale(x)
                .tickSize(0)
                .outerTickSize(0)
                .orient('bottom');

            vbar = svg.selectAll('g')
                .data(dataset);

            var axis = svg.append("g")
                .attr("class", "y axis")
                .call(yAxis)
                .append("text")
                .attr("transform", "rotate(-90)")
                .attr("y", 3)
                .attr("x", -height)
                .attr("dy", "-2.2em");

            // Draw horizontal lines on y-axis
            svg.append("g")
                .attr("class", "grid")
                .call(make_y_axis()
                    .tickSize(-width, 0, 0)
                    .tickFormat("")
            )

            function make_y_axis() {
                return d3.svg.axis()
                    .scale(y)
                    .orient("left")
                    .ticks(6)
            }

            vbar.enter().append('g')
                .attr('class', 'barchart');

            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis)
                .selectAll('.tick text')
                .attr("dy", 13)
                .attr("x", -27)
                .attr("stroke", "#a1a1a1")
                .attr("transform", "rotate(-60)");

            svg.select('.x.axis').append("path")
                .attr("class", "domainsecondary")
                .attr("fill", "#a1a1a1")
                .attr("stroke-width", 2)
                .attr("transform", "translate(0,0)")
                .attr("d", "M0,0V0H" + width + "V0")
                .attr("marker-end", "url(#circ)");

            svg.selectAll('.y.axis .domain')
                .attr("marker-start", "url(#circ)");
        }

        function drawChartPath() {

            rect = vbar.append("rect")
                .attr("class", "bar")
                .attr("fill", '#07cca4')
                .attr("width", x.rangeBand())
                .attr('height', 0)
                .attr("x", function(d, i) {
                    return x(d.name);
                })
                .attr("y", function(d) {
                    return height;
                })
                .transition().duration(500).ease('in-out').delay(function(d, i) {
                    return i * 300;
                })
                .attr("y", function(d, i) {
                    return y(d.value);
                })
                .attr("height", function(d, i) {
                    return height - y(d.value);
                });

            anchor = svg.append('g')
                .attr('class', 'labels');

            // x-axis label
            label = anchor.append("text")
                .attr("class", "x label")
                .attr("text-anchor", "middle")
                .attr("x", width / 2)
                .attr("y", height + margin.bottom - 2)
                .text("Estimated # of total LRA combatants");

            if (isSuperSmall) {
                anchor.append("circle")
                    .attr('class', 'colors')
                    .attr("fill", '#07cca4')
                    .attr('cx', -20)
                    .attr('cy', height + margin.bottom - 8)
                    .attr('r', 8);
            } else {
                anchor.append("circle")
                    .attr('class', 'colors')
                    .attr("fill", '#07cca4')
                    .attr('cx', width / 4 - 50)
                    .attr('cy', height + margin.bottom - 8)
                    .attr('r', 8);
            }
        }

    });
})(jQuery);