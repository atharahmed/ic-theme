(function($) {
    $(function() {

        var $window = $(window),
            $chartArea = $('#financial-pie-chart'),
            videoOffset = $('.watch-video').position().top;


        // Scroll to Kony2012 video
        $('#watch-kony-2012').click(function() {
            $window.scrollTo(videoOffset, 1000, {
                queue: true
            });
        });

        // Pie chart variables
        var textOffset = 35,
            tweenDuration = 350,
            lines, valueLabels, nameLabels,
            pieData = [],
            oldPieData = [],
            filteredPieData = [],
            arrayRange = 100000, //range of potential values for each item
            arraySize,
            reiteration = 0,
            streakerDataAdded,
            currentState,
            isExtraSmall,
            isSuperSmall;

        // Helper function to populate pie slice parameters from array data for pie chart
        var donut = d3.layout.pie().value(function(d) {
            return d.octetTotalCount;
        });

        // Helper function to create colors from an ordinal scale
        var colorPieChart = d3.scale.ordinal().range(['#686868', '#ffffff', '#cfcfcf', '#9f2215', '#ec877d', '#353535']);


        /* Redraw bar and pie charts on window resize
         ***********************************************/
        $window.on('resize.ic-kony-2012', function() {
            // update media query flags
            isExtraSmall = Modernizr.mq(window.settings.mediaQueryExtraSmall) && !Modernizr.mq(window.settings.mediaQuerySuperSmall),
            isSuperSmall = Modernizr.mq(window.settings.mediaQuerySuperSmall);

            var $images = $('.bg img'),
                offset = parseInt($('.bg').outerWidth() - $images.outerWidth()) / 2,
                left = Math.min(offset, 0);

            $images.css({
                'left': left
            });

            if (isExtraSmall && currentState != 'extraSmall') {
                currentState = 'extraSmall';

                pieWidth = 440;
                pieHeight = 400;
                svgHeight = 550;
                textOffset = 25;
                removePieChart();

            } else if (isSuperSmall && currentState != 'superSmall') {
                currentState = 'superSmall';

                pieWidth = 270;
                pieHeight = 300;
                svgHeight = 490;
                textOffset = 10;
                removePieChart();

            } else if (!isExtraSmall && !isSuperSmall && currentState != 'desktop') {
                currentState = 'desktop';

                pieWidth = 500;
                pieHeight = 450;
                svgHeight = 580;
                textOffset = 35;
                removePieChart();
            }

        }).trigger('resize.ic-kony-2012');

        function removePieChart() {
            $('#financial-pie-chart').html('');
            $chartArea.removeClass('grow-graph');
        }

        // Grow graph when it reaches your viewport
        $window.on('scroll.ic-kony-2012', function() {
            var scrollTop = $window.scrollTop(),
                triggerPoint = $chartArea.offset().top,
                windowHeight = $window.height();

            if (scrollTop > (triggerPoint - (windowHeight / 2)) && !$chartArea.hasClass('grow-graph')) {
                $chartArea.addClass('grow-graph');
                redrawPieChart();
            } else if (scrollTop <= (triggerPoint - windowHeight)) {
                removePieChart();
            }
        }).trigger('scroll.ic-kony-2012');


        /* Draw Pie Chart
         *******************************/

        function redrawPieChart() {
            // Adjust inner and outer radii if switching to mobile
            if (isExtraSmall) {
                ir = 0;
                r = 140;
            } else if (isSuperSmall) {
                ir = 0;
                r = 80;
            } else {
                ir = 75;
                r = 160;
            }

            //D3 helper function to draw arcs, populates parameter "d" in path object
            arc = d3.svg.arc()
                .startAngle(function(d) {
                    return d.startAngle;
                })
                .endAngle(function(d) {
                    return d.endAngle;
                })
                .innerRadius(ir)
                .outerRadius(r);

            vis = d3.select("#financial-pie-chart").append("svg:svg")
                .attr("width", pieWidth)
                .attr("height", svgHeight);


            //GROUP FOR ARCS/PATHS
            arc_group = vis.append("svg:g")
                .attr("class", "arc")
                .attr("transform", "translate(" + (pieWidth / 2) + "," + (pieHeight / 2) + ")");

            //GROUP FOR LABELS
            label_group = vis.append("svg:g")
                .attr("class", "label_group")
                .attr("transform", "translate(" + (pieWidth / 2) + "," + (pieHeight / 1.95) + ")");

            //GROUP FOR CENTER TEXT  
            center_group = vis.append("svg:g")
                .attr("class", "center_group")
                .attr("transform", "translate(" + (pieWidth / 2) + "," + (pieHeight / 2) + ")");

            //PLACEHOLDER GRAY CIRCLE
            paths = arc_group.append("svg:circle")
                .attr("fill", "#EFEFEF")
                .attr("r", r);

            //WHITE CIRCLE BEHIND LABELS
            whiteCircle = center_group.append("svg:circle")
                .attr("fill", "#ce4b3d")
                .attr("r", ir);

            if (isSuperSmall) {
                legend = vis.append("svg:g")
                    .attr("class", "legend")
                    .attr("transform", "translate(" + (pieWidth / 6) + "," + (svgHeight - 190) + ")");

            } else {
                legend = vis.append("svg:g")
                    .attr("class", "legend")
                    .attr("transform", "translate(" + (pieWidth / 6) + "," + (svgHeight - 120) + ")");
            }

            if (isExtraSmall || isSuperSmall) {
                totalValue = $('.total');
            } else {

                // "TOTAL" LABEL
                totalLabel = center_group.append("svg:text")
                    .attr("class", "label")
                    .attr("dy", -17)
                    .attr("text-anchor", "middle")
                    .text("WE SPENT");

                //TOTAL TRAFFIC VALUE
                totalValue = center_group.append("svg:text")
                    .attr("class", "total")
                    .attr("dy", 14)
                    .attr("text-anchor", "middle") // text-align: right
                .text("Waiting...");

                //UNITS LABEL
                totalUnits = center_group.append("svg:text")
                    .attr("class", "label")
                    .attr("dy", 33)
                    .attr("text-anchor", "middle") // text-align: right
                .text("in FY 2012");
            }

            loadData();
        }

        function loadData() {
            var dataSet = {
                "Mobilization": 5629706,
                "Recovery": 4277312,
                "General & administrative": 2075983,
                "Protection": 1658079,
                "Media": 1455585,
                "Fundraising": 884361
            };
            update(2012, dataSet);
        }

        // to run each time data is generated
        function update(year, data) {
            // count pieces of data
            var count = 0;
            for (var k in data) {
                if (data.hasOwnProperty(k)) {
                    ++count;
                }
            }

            if (isExtraSmall || isSuperSmall) {
                totalUnits = $('#updateyear');
            }

            totalUnits.text('IN FY ' + year);

            arraySize = count;
            streakerDataAdded = d3.range(arraySize).map(function(a) {
                return fillArray(a, data);
            });

            oldPieData = filteredPieData;
            pieData = donut(streakerDataAdded);

            var totalOctets = 0;
            filteredPieData = pieData.filter(filterData);

            function filterData(element, index, array) {
                element.name = streakerDataAdded[index].program;
                element.value = streakerDataAdded[index].octetTotalCount;
                totalOctets += element.value;
                return (element.value > 0);
            }

            if (filteredPieData.length > 0) {

                //REMOVE PLACEHOLDER CIRCLE
                arc_group.selectAll("circle").remove();

                totalValue.text(function() {
                    var kb = totalOctets / 1000000;
                    return '$' + kb.toFixed(1) + 'M';
                    return bchart.label.abbreviated(totalOctets * 8);
                });

                //DRAW ARC PATHS
                paths = arc_group.selectAll("path").data(filteredPieData);
                paths.enter().append("svg:path")
                    .attr("stroke", "#ce4b3d")
                    .attr("stroke-width", 2.5)
                    .attr("fill", function(d, i) {
                        return colorPieChart(i);
                    })
                    .transition()
                    .duration(tweenDuration)
                    .attrTween("d", pieTween);
                paths
                    .transition()
                    .duration(tweenDuration)
                    .attrTween("d", pieTween);
                paths.exit()
                    .transition()
                    .duration(tweenDuration)
                    .attrTween("d", removePieTween)
                    .remove();

                labels = legend.selectAll("circle.colors").data(filteredPieData);
                labels.enter().append("svg:circle")
                    .attr('class', 'colors')
                    .attr("fill", function(d, i) {
                        return colorPieChart(i);
                    })
                    .attr('cx', 0)
                    .attr('cy', 0)
                    .attr('r', 8)
                    .attr('transform', function(d, i) {
                        if (isSuperSmall) {
                            var y = 35 * i;
                            return "translate(0," + y + ")";
                        } else {
                            if (i > 2) {
                                var y = 35 * (i - 3);
                                return "translate(180," + y + ")";
                            } else {
                                var y = 35 * i;
                                return "translate(0," + y + ")";
                            }
                        }
                    });
                labels.exit().remove();

                textLabels = legend.selectAll("text.units").data(filteredPieData)
                    .text(function(d) {
                        return d.name;
                    });

                textLabels.enter().append("svg:text")
                    .attr('class', 'units')
                    .attr("transform", function(d, i) {
                        y = (35 * i) + 12;
                        return "translate(0," + y + ")";
                    }).text(function(d) {
                        return d.name;
                    });

                textLabels.transition().duration(tweenDuration).attrTween("transform", textTweenOther).call(
                    function(a) {
                        return wraptext(a, 180);
                    });
                textLabels.exit().remove();

                textOffset = 5;

                valueLabels = label_group.selectAll("text.value").data(filteredPieData)
                    .attr("dy", function(d) {
                        if ((d.startAngle + d.endAngle) / 2 > Math.PI / 2 && (d.startAngle + d.endAngle) / 2 < Math.PI * 1.5) {
                            return 3;
                        } else {
                            return -9;
                        }
                    })
                    .attr("text-anchor", function(d) {
                        d.angle = (d.startAngle + d.endAngle - Math.PI) / 2;
                        if ((d.startAngle + d.endAngle) / 2 < Math.PI) {
                            return "beginning";
                        } else {
                            return "end";
                        }
                    })
                    .text(function(d) {
                        var percentage = (d.value / totalOctets) * 100;
                        return percentage.toFixed(1) + "%";
                    });

                valueLabels.enter().append("svg:text")
                    .attr("class", "value")
                    .attr("transform", function(d) {
                        return "translate(" + Math.cos(((d.startAngle + d.endAngle - Math.PI) / 2)) * r + "," + Math.sin((d.startAngle + d.endAngle - Math.PI) / 2) * r + ")";
                    })
                    .attr("dy", function(d) {
                        if ((d.startAngle + d.endAngle) / 2 > Math.PI / 2 && (d.startAngle + d.endAngle) / 2 < Math.PI * 1.5) {
                            return 3;
                        } else {
                            return -9;
                        }
                    })
                    .attr("text-anchor", function(d) {
                        d.angle = (d.startAngle + d.endAngle - Math.PI) / 2;
                        if ((d.startAngle + d.endAngle) / 2 < Math.PI) {
                            return "beginning";
                        } else {
                            return "end";
                        }
                    }).text(function(d) {
                        var percentage = (d.value / totalOctets) * 100;
                        return percentage.toFixed(1) + "%";
                    });

                valueLabels.transition().duration(tweenDuration).attrTween("transform", textTweenPercentage);
                valueLabels.exit().remove();
            }
        }

        /* Pie Chart functions
         **************************/

        // Return pie data
        function fillArray(index, data, array) {
            var dataArray = [];
            var keyArray = [];

            for (var key in data) {
                dataArray.push(data[key]);
                keyArray.push(key);
            }

            return {
                program: keyArray[index],
                octetTotalCount: dataArray[index]
            };
        }

        // wrap label text on mobile
        function wraptext(text, width) {
            text.each(function() {
                var text = d3.select(this),
                    words = text.text().split(/\s+/).reverse(),
                    word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.2, // ems
                    y = text.attr("y"),
                    dy = parseFloat(text.attr("dy")),
                    tspan = text.text(null).append("tspan");

                while (word = words.pop()) {
                    line.push(word);
                    tspan.text(line.join(" "));

                    if (tspan.node().getComputedTextLength() > width && !isSuperSmall) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", lineHeight + "em").text(word);
                    }
                }
            });
        }

        // Interpolate the arcs in data space.
        function pieTween(d, i) {
            var s0 = 0;
            var e0 = 0;

            var i = d3.interpolate({
                startAngle: s0,
                endAngle: e0
            }, {
                startAngle: d.startAngle,
                endAngle: d.endAngle
            });
            return function(t) {
                var b = i(t);
                return arc(b);
            };
        }

        function removePieTween(d, i) {
            s0 = 2 * Math.PI;
            e0 = 2 * Math.PI;
            var i = d3.interpolate({
                startAngle: d.startAngle,
                endAngle: d.endAngle
            }, {
                startAngle: s0,
                endAngle: e0
            });
            return function(t) {
                var b = i(t);
                return arc(b);
            };
        }

        function textTween(d, i) {
            var a = 0;
            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t, additionalOffset) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 40 : 0;

                return "translate(" + Math.cos(val) * (r + textOffset + additionalOffset) + "," + Math.sin(val) * (r + textOffset + additionalOffset) + ")";
            };
        }

        function textTweenPercentage(d, i) {
            var a = 0;
            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t, additionalOffset) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 15 : 0;

                return "translate(" + Math.cos(val) * (r + textOffset + additionalOffset) + "," + Math.sin(val) * (r + textOffset + additionalOffset) + ")";
            };
        }

        function textTweenOther(d, i) {
            var a = 0;
            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 40 : 0;

                if (isSuperSmall) {
                    var y = i * 35 + 5;
                    return "translate(25," + y + ")";
                } else {
                    if (i > 2) {
                        var y = (i - 3) * 35 + 5;
                        return "translate(200," + y + ")";
                    } else {
                        var y = i * 35 + 5;
                        return "translate(25," + y + ")";
                    }
                }
            };
        }

    });
})(jQuery);