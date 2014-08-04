(function($) {
    $(function() {

        /* Variables 
         **************************/
        var $window = $(window),
            $chartArea = $('#financial-pie-chart');

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

        // Margin around bar chart
        var margin = {
            top: 20,
            right: 10,
            bottom: 65,
            left: 10
        };

        // Helper function to populate pie slice parameters from array data for pie chart
        var donut = d3.layout.pie().value(function(d) {
            return d.octetTotalCount;
        });

        // Helper function to create colors from an ordinal scale
        var colorPieChart = d3.scale.ordinal().range(['#2dbc9e', '#749a91', '#a8b5b1', '#99a6a2', '#849c95', '#57a48f']);
        var colorBarChart = d3.scale.ordinal().range(['#07cca4', '#dadada']);


        /* Financial Bar Chart FY data
         ********************************/

        var dataset = [{
            name: 2006,
            value: 3135354
        }, {
            name: 2007,
            value: 7055776
        }, {
            name: 2008,
            value: 7377209
        }, {
            name: 2009,
            value: 7844611
        }, {
            name: 2010,
            value: 8253941
        }, {
            name: 2011,
            value: 13765180
        }, {
            name: 2012,
            value: 26486644
        }, {
            name: 2013,
            value: 4949514
        }];


        /* Redraw bar and pie charts on window resize
         ***********************************************/
        $window.on('resize.ic-financials', function() {
            // update media query flags
            isExtraSmall = Modernizr.mq(window.settings.mediaQueryExtraSmall) && !Modernizr.mq(window.settings.mediaQuerySuperSmall),
            isSuperSmall = Modernizr.mq(window.settings.mediaQuerySuperSmall);

            if (isExtraSmall && currentState != 'extraSmall') {
                currentState = 'extraSmall';

                // Pie Chart
                pieWidth = 480;
                pieHeight = 400;
                svgHeight = 550;
                textOffset = 25;
                removePieChart();

                // Bar Chart
                barChartWidth = 450 - margin.left - margin.right,
                barChartHeight = 350 - margin.top - margin.bottom,
                $('.bar-chart').html('');
                redrawBarChart();

            } else if (isSuperSmall && currentState != 'superSmall') {
                currentState = 'superSmall';

                // Pie Chart
                pieWidth = 270;
                pieHeight = 280;
                svgHeight = 430;
                textOffset = 5;
                removePieChart();

                // Bar Chart
                barChartWidth = 290 - margin.left - margin.right,
                barChartHeight = 300 - margin.top - margin.bottom,
                $('.bar-chart').html('');
                redrawBarChart();
            } else if (!isExtraSmall && !isSuperSmall && currentState != 'desktop') {
                currentState = 'desktop';

                // Pie Chart
                pieWidth = 650;
                pieHeight = svgHeight = 500;
                textOffset = 35;
                removePieChart();

                // Bar Chart
                barChartWidth = 550 - margin.left - margin.right,
                barChartHeight = 370 - margin.top - margin.bottom,
                $('.bar-chart').html('');
                redrawBarChart();
            }

        }).trigger('resize.ic-financials');

        function removePieChart() {
            $('#financial-pie-chart').html('');
            $chartArea.removeClass('grow-graph');
        }

        // Grow pie chart when it reaches your viewport
        $window.on('scroll.ic-financials', function() {
            var scrollTop = $window.scrollTop(),
                triggerPoint = $chartArea.offset().top,
                windowHeight = $window.height();

            if (scrollTop > (triggerPoint - (windowHeight / 2)) && !$chartArea.hasClass('grow-graph')) {
                $chartArea.addClass('grow-graph');
                redrawPieChart();
            } else if (scrollTop <= (triggerPoint - windowHeight) && $chartArea.hasClass('grow-graph')) {
                $chartArea.removeClass('grow-graph');
                $('#financial-pie-chart').html('');
                reiteration = 0;
            }

        }).trigger('scroll.ic-financials');


        /* Draw Financials Bar Chart
         **************************************/

        function redrawBarChart() {
            barWidth = barChartWidth / dataset.length;

            vchart = d3.select('.bar-chart.vertical').append('svg')
                .attr("width", barChartWidth + margin.left + margin.right)
                .attr("height", barChartHeight + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            if (isExtraSmall || isSuperSmall) {
                x = d3.scale.ordinal()
                    .rangeRoundBands([0, barChartWidth], .1);
            } else {
                x = d3.scale.ordinal()
                    .rangeRoundBands([0, barChartWidth], .4);
            }

            y = d3.scale.linear()
                .range([barChartHeight, 0]);

            x.domain(dataset.map(function(d) {
                return d.name;
            }))
            y.domain([0, d3.max(dataset, function(d) {
                return d.value;
            })]);

            xAxis = d3.svg.axis()
                .scale(x)
                .tickSize(0)
                .orient('bottom')
                .ticks(0);

            yAxis = d3.svg.axis()
                .scale(y)
                .tickSize(0)
                .orient('left')
                .ticks(0);

            vbar = vchart.selectAll('g')
                .data(dataset);

            vchart.append("g")
                .attr("class", "y axis")
                .call(yAxis);

            // Draw horizontal lines on y-axis
            vchart.append("g")
                .attr("class", "grid")
                .call(make_y_axis()
                    .tickSize(-barChartWidth, 0, 0)
                    .tickFormat("")
            )

            vbar.enter().append('g');

            // Draw bars according to data
            rect = vbar.append("rect")
                .attr("class", "bar")
                .attr("fill", function(d, i) {
                    return colorBarChart(i);
                })
                .attr("width", x.rangeBand())
                .attr('height', 0)
                .attr("x", function(d) {
                    return x(d.name);
                })
                .attr("y", function(d) {
                    return barChartHeight;
                })
                .transition().duration(500).ease('in-out').delay(function(d, i) {
                    return i * 300;
                })
                .attr("y", function(d) {
                    return y(d.value);
                })
                .attr("height", function(d) {
                    return barChartHeight - y(d.value);
                });

            // Labels on top of bars
            vbar.append('text')
                .attr('class', 'numbers')
                .attr('y', function(d) {
                    return barChartHeight - 15;
                })
                .attr('text-anchor', 'beginning')
                .attr('x', function(d) {
                    return x(d.name) + barWidth / 10;
                })
                .attr('dy', '1em')
                .text(function(d) {
                    var number = d.value / 1000000,
                        rounded = Math.round(number * 10) / 10;
                    return rounded + 'm';
                })
                .transition().duration(500).ease('in-out').delay(function(d, i) {
                    return i * 300;
                })
                .attr('y', function(d) {
                    return y(d.value) - 20;
                });

            // Draw x-axis
            if (isExtraSmall || isSuperSmall) {
                vchart.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + barChartHeight + ")")
                    .call(xAxis)
                    .selectAll('.tick text')
                    .attr("transform", "rotate(-60)")
                    .attr("x", -25)
                    .attr("y", -10)
                    .call(wrap, x.rangeBand());
            } else {
                vchart.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + barChartHeight + ")")
                    .call(xAxis)
                    .selectAll('.tick text')
                    .call(wrap, x.rangeBand());
            }

            // x-axis label
            vchart.append("text")
                .attr("class", "x label")
                .attr("text-anchor", "middle")
                .attr("x", barChartWidth / 2)
                .attr("y", barChartHeight + margin.bottom)
                .text("Fiscal Year");
        }


        /* Bar Chart Functions 
         *************************/

        // coerce value to number
        function type(d) {
            d.value = +d.value;
            return d;
        }

        // Wrap long labels
        function wrap(text, width) {
            text.each(function() {
                var text = d3.select(this),
                    words = text.text().split(/\s+/).reverse(),
                    word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.1, // ems
                    y = text.attr("y"),
                    x = text.attr("x"),
                    dy = parseFloat(text.attr("dy")) + 1,
                    tspan = text.text(null).append("tspan").attr("x", x).attr("y", y).attr("dy", dy + "em");

                while (word = words.pop()) {
                    line.push(word);
                    tspan.text(line.join(" "));

                    if (tspan.node().getComputedTextLength() > width) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text.append("tspan").attr("x", x).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
                    }
                }
            });
        }

        // Draw long y-axis lines on bar chart
        function make_y_axis() {
            return d3.svg.axis()
                .scale(y)
                .orient("left")
                .ticks(8)
        }


        /* Draw Pie Chart
         *******************************/

        function redrawPieChart() {
            // Adjust inner and outer radii if switching to mobile
            if (isExtraSmall) {
                ir = 0;
                r = 140;
            } else if (isSuperSmall) {
                ir = 0;
                r = 90;
            } else {
                ir = 70;
                r = 150;
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

            // CREATE VIS & GROUPS
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
                .attr("fill", "#F4F4F4")
                .attr("r", ir);

            if (isExtraSmall || isSuperSmall) {
                totalValue = $('.total');

                legend = vis.append("svg:g")
                    .attr("class", "legend")
                    .attr("transform", "translate(" + (pieWidth / 3) + "," + (svgHeight - 150) + ")");

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
                    .attr("dy", 11)
                    .attr("text-anchor", "middle") // text-align: right
                .text("Waiting...");

                //UNITS LABEL
                totalUnits = center_group.append("svg:text")
                    .attr("class", "units")
                    .attr("dy", 30)
                    .attr("text-anchor", "middle") // text-align: right
                .text("");
            }

            loadData();
        }

        function loadData() {
            var dataSet = {
                "Programs": 11918008,
                "Management & General": 2926171,
                "Development": 620152
            };
            update(2013, dataSet);
        }

        // Click on different fiscal years
        var $yearButtons = $('.yearlabel .btn');
        $yearButtons.click(function() {
            var id = this.id,
                $self = $(this),
                dataSet;

            if (!$self.hasClass('selected')) {
                // update selected button
                $yearButtons.not(this).removeClass('selected');
                $self.addClass('selected');

                switch (id) {
                    case 'six':
                        dataSet = {
                            "Programs": 2254099,
                            "Management & General": 285934,
                            "Fundraising": 99747
                        };
                        update(2006, dataSet);
                        break;
                    case 'seven':
                        dataSet = {
                            "Programs": 4485184,
                            "Management & General": 646653,
                            "Fundraising": 102635
                        };
                        update(2007, dataSet);
                        break;
                    case 'eight':
                        dataSet = {
                            "Programs": 5956785,
                            "Management & General": 977353,
                            "Fundraising": 131863
                        };
                        update(2008, dataSet);
                        break;
                    case 'nine':
                        dataSet = {
                            "Programs": 7695159,
                            "Management & General": 1007081,
                            "Fundraising": 317150
                        };
                        update(2009, dataSet);
                        break;
                    case 'ten':
                        dataSet = {
                            "Programs": 6771209,
                            "Fundraising": 320702,
                            "Management & General": 972515
                        };
                        update(2010, dataSet);
                        break;
                    case 'eleven':
                        dataSet = {
                            "Programs": 7163384,
                            "Management & General": 1444570,
                            "Fundraising": 286678
                        };
                        update(2011, dataSet);
                        break;
                    case 'twelve':
                        dataSet = {
                            "Programs": 13020682,
                            "Management & General": 2075983,
                            "Fundraising": 884361
                        };
                        update(2012, dataSet);
                        break;
                    case 'thirteen':
                        dataSet = {
                            "Programs": 11918008,
                            "Management & General": 2926171,
                            "Development": 620152
                        };
                        update(2013, dataSet);
                        break;
                }
            }
        });

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

            totalUnits.text('IN ' + year);

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
                // && oldPieData.length > 0

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
                    .attr("stroke", "white")
                    .attr("stroke-width", 1)
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

                if (isExtraSmall || isSuperSmall) {

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
                            var y = 25 * i;
                            return "translate(0," + y + ")";
                        })

                    labels.exit().remove();

                    textLabels = legend.selectAll("text.units").data(filteredPieData)
                        .text(function(d) {
                            return d.name;
                        });

                    textLabels.enter().append("svg:text")
                        .attr('class', 'units')
                        .attr("transform", function(d, i) {
                            y = (25 * i) + 12;
                            return "translate(0," + y + ")";
                        }).text(function(d) {
                            return d.name;
                        });

                    textLabels.transition().duration(tweenDuration).attrTween("transform", textTweenOther);
                    textLabels.exit().remove();

                    textOffset = 10;

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

                } else {

                    //DRAW LABELS WITH PERCENTAGE VALUES
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

                    valueLabels.transition().duration(tweenDuration).attrTween("transform", textTween);
                    valueLabels.exit().remove();


                    //DRAW LABELS WITH ENTITY NAMES
                    nameLabels = label_group.selectAll("text.units").data(filteredPieData)
                        .attr("dy", function(d) {
                            if ((d.startAngle + d.endAngle) / 2 > Math.PI / 2 && (d.startAngle + d.endAngle) / 2 < Math.PI * 1.5) {
                                return 17;
                            } else {
                                return 5;
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
                            return d.name;
                        });

                    var translation = [];
                    nameLabels.enter().append("svg:text")
                        .attr("class", "units")
                        .attr("transform", function(d) {
                            a = (d.startAngle + d.endAngle - Math.PI) / 2;
                            d.cx = Math.cos(a) * (ir + ((r - ir) / 2));
                            d.cy = Math.sin(a) * (ir + ((r - ir) / 2));
                            d.x = Math.cos(a) * r;
                            d.y = Math.sin(a) * r;
                            d.angle = (d.startAngle + d.endAngle - Math.PI) / 2;

                            return "translate(" + Math.cos(((d.startAngle + d.endAngle - Math.PI) / 2)) * r + "," + Math.sin((d.startAngle + d.endAngle - Math.PI) / 2) * r + ")";
                        })
                        .attr("dy", function(d) {
                            if ((d.startAngle + d.endAngle) / 2 > Math.PI / 2 && (d.startAngle + d.endAngle) / 2 < Math.PI * 1.5) {
                                return 17;
                            } else {
                                return 5;
                            }
                        })
                        .attr("text-anchor", function(d) {
                            if ((d.startAngle + d.endAngle) / 2 < Math.PI) {
                                return "beginning";
                            } else {
                                return "end";
                            }
                        }).text(function(d) {
                            return d.name;
                        });

                    if (reiteration == 0) {
                        setTimeout(function() {
                            addLines()
                        }, 300);
                    } else {
                        addLines();
                    }

                    function addLines() {
                        nameLabels
                            .each(function(d) {
                                var additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 40 : 0;

                                a = (d.startAngle + d.endAngle - Math.PI) / 2;
                                d.cx = Math.cos(a) * (ir + ((r - ir) / 2));
                                d.cy = Math.sin(a) * (ir + ((r - ir) / 2));
                                d.x = Math.cos(a) * (r + textOffset + additionalOffset);
                                d.y = Math.sin(a) * (r + textOffset + additionalOffset);

                                var bbox = this.getBBox();

                                d.sy = d.oy = d.y + bbox.height / 2;
                                d.ox = d.x + bbox.width;
                                d.sx = d.x;
                                d.ssx = d.x - bbox.width;
                                d.ssy = d.y + 10;

                                if (d.cy <= d.oy) {
                                    d.ssy += bbox.height / 2 + 3
                                    d.oy = d.sy += bbox.height / 2 + 3;
                                }
                            })
                            .transition().duration(tweenDuration).attrTween("transform", textTween);

                        nameLabels.exit().remove();

                        pointers = label_group.append("defs").append("marker")
                            .attr("id", "circ")
                            .attr("markerWidth", 6)
                            .attr("markerHeight", 6)
                            .attr("refX", 3)
                            .attr("refY", 3)
                            .append("circle")
                            .attr("cx", 3)
                            .attr("cy", 3)
                            .attr("r", 3);

                        pointers = label_group.selectAll("path.pointer")
                            .data(filteredPieData);

                        pointers.enter()
                            .append("path")
                            .attr("class", "pointer")
                            .style("fill", "none")
                            .attr("marker-end", "url(#circ)");

                        pointers
                            .transition()
                            .duration(tweenDuration)
                            .attr("d", function(d) {
                                if (d.cx > d.x) {
                                    return "M" + d.ssx + "," + d.ssy + "L" + (d.sx + 4) + "," + d.ssy + "L" + d.cx + "," + d.cy;
                                } else {
                                    return "M" + d.ox + "," + d.oy + "L" + (d.sx - 4) + "," + d.sy + "L" + d.cx + "," + d.cy;
                                }
                            });
                        pointers.exit().remove();
                    }
                }

                reiteration++;
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

                    if (tspan.node().getComputedTextLength() > width) {
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
            var s0;
            var e0;

            if (oldPieData[i]) {
                s0 = oldPieData[i].startAngle;
                e0 = oldPieData[i].endAngle;
            } else if (!(oldPieData[i]) && oldPieData[i - 1]) {
                s0 = oldPieData[i - 1].endAngle;
                e0 = oldPieData[i - 1].endAngle;
            } else if (!(oldPieData[i - 1]) && oldPieData.length > 0) {
                s0 = oldPieData[oldPieData.length - 1].endAngle;
                e0 = oldPieData[oldPieData.length - 1].endAngle;
            } else {
                s0 = 0;
                e0 = 0;
            }

            if (reiteration == 0 || reiteration == 1) {
                s0 = 0;
                e0 = 0;
            }

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
            var a;
            if (oldPieData[i]) {
                a = (oldPieData[i].startAngle + oldPieData[i].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i]) && oldPieData[i - 1]) {
                a = (oldPieData[i - 1].startAngle + oldPieData[i - 1].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i - 1]) && oldPieData.length > 0) {
                a = (oldPieData[oldPieData.length - 1].startAngle + oldPieData[oldPieData.length - 1].endAngle - Math.PI) / 2;
            } else {
                a = 0;
            }

            if (reiteration == 0 || reiteration == 1) {
                a = 0;
            }

            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t, additionalOffset) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 40 : 0;

                return "translate(" + Math.cos(val) * (r + textOffset + additionalOffset) + "," + Math.sin(val) * (r + textOffset + additionalOffset) + ")";
            };
        }

        function textTweenPercentage(d, i) {
            var a;
            if (oldPieData[i]) {
                a = (oldPieData[i].startAngle + oldPieData[i].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i]) && oldPieData[i - 1]) {
                a = (oldPieData[i - 1].startAngle + oldPieData[i - 1].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i - 1]) && oldPieData.length > 0) {
                a = (oldPieData[oldPieData.length - 1].startAngle + oldPieData[oldPieData.length - 1].endAngle - Math.PI) / 2;
            } else {
                a = 0;
            }

            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t, additionalOffset) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 10 * Math.PI / 180 ? 15 : 0;

                return "translate(" + Math.cos(val) * (r + textOffset + additionalOffset) + "," + Math.sin(val) * (r + textOffset + additionalOffset) + ")";
            };
        }

        function textTweenOther(d, i) {
            var a;
            if (oldPieData[i]) {
                a = (oldPieData[i].startAngle + oldPieData[i].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i]) && oldPieData[i - 1]) {
                a = (oldPieData[i - 1].startAngle + oldPieData[i - 1].endAngle - Math.PI) / 2;
            } else if (!(oldPieData[i - 1]) && oldPieData.length > 0) {
                a = (oldPieData[oldPieData.length - 1].startAngle + oldPieData[oldPieData.length - 1].endAngle - Math.PI) / 2;
            } else {
                a = 0;
            }

            var b = (d.startAngle + d.endAngle - Math.PI) / 2;
            var fn = d3.interpolateNumber(a, b);

            return function(t) {
                var val = fn(t),
                    additionalOffset = d.endAngle - d.startAngle < 15 * Math.PI / 180 ? 40 : 0;
                var y = i * 25 + 5;

                return "translate(30," + y + ")";
            };
        }

    });
})(jQuery);