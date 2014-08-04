(function($) {
    $(function() {
        var $window = $(window),
            $body = $('body'),
            $sectionTeamMembers = $('#section-team-members'),
            sectionTeamMembersPadding = parseInt($sectionTeamMembers.css('padding-top')),
            $sectionInfo = $('#section-info'),
            $filterButtons = $('#section-filter .btn'),
            $teamMembers = $('.team-member'),
            teamMemberWidth,
            teamMemberHeight,
            teamMemberMargin,
            numPerRow;

        /* Filter Button Click Handler
         *******************************************/
        $filterButtons.on('click', function() {
            if (!$(this).hasClass('selected')) {
                var infoSection = $.data(window, 'info-section');

                // close info section if it's open
                if (infoSection) {
                    hideInfoSection();
                }

                // update selected button
                $(this).addClass('selected');
                $filterButtons.not(this).removeClass('selected');

                var filter = '.' + $(this).attr('href').slice(1);
                filterTeamMembers(filter);
            }

            return false;
        });

        /*  Window resize handler
         *******************************************/
        $window.on('resize.ic-our-team', function() {
            var $visibleTeamMembers = $teamMembers.filter(':visible'),
                infoSection = $.data(this, 'info-section'),
                $teamMemberRows,
                numRows;

            // close info section if it's open
            if (infoSection) {
                hideInfoSection();
            }

            // determine the number of team members per row based on screen size
            if (Modernizr.mq(window.settings.mediaQueryExtraSmall)) {
                numPerRow = 1;
            } else if (Modernizr.mq(window.settings.mediaQuerySmall)) {
                numPerRow = 2;
            } else if (Modernizr.mq(window.settings.mediaQueryMedium)) {
                numPerRow = 3;
            } else if (Modernizr.mq(window.settings.mediaQueryLarge)) {
                numPerRow = 4;
            }

            // measure team member width and height and margin
            teamMemberWidth = $visibleTeamMembers.outerWidth(true);
            teamMemberHeight = $visibleTeamMembers.outerHeight(true);
            teamMemberMargin = parseInt($visibleTeamMembers.css('margin-top'));

            // calculate and update number of rows
            numRows = Math.ceil($visibleTeamMembers.length / numPerRow);
            $teamMemberRows = updateNumRows(numRows);

            // sort visible team members into appropriate rows
            $visibleTeamMembers.each(function(index) {
                var $tm = $(this),
                    index = $visibleTeamMembers.index($tm),
                    $row = $teamMemberRows.eq(Math.floor(index / numPerRow));

                $row.append($tm);
            });
        }).trigger('resize.ic-our-team');

        /* Team Member Click Handler
         *******************************************/
        $sectionTeamMembers.on('click', '.team-member a', function() {
            var $target = $(this).parent().addClass('selected');

            $currentTeamMember && $currentTeamMember.get(0) === $target.get(0) ?
                hideInfoSection() :
                showInfoSection($target);

            return false;
        });

        /* Info Section
         *******************************************/
        var $currentTeamMember,
            infoSectionPos,
            infoSectionPosOffset;

        var InfoSection = function($target) {
            this.$target = $target;
            this.create();
        }

        InfoSection.prototype = {
            close: function() {
                this.$target.transition({
                    marginBottom: teamMemberMargin
                }, function() {
                    $(this).css({
                        marginBottom: ''
                    });
                });
                this.$section.transition({
                    height: 0
                }, function() {
                    $(this).remove();
                });
            },
            create: function() {
                // create section
                this.$section = $('<section class="section-info"> \
                    <div class="container"> \
                        <div class="row"> \
                            <div class="col-md-5 info"> \
                                <p class="member-name"></p> \
                                <p class="job-title"></p> \
                                <p> \
                                    <a href="" class="btn btn-social facebook" target="_blank"></a> \
                                    <a href="" class="btn btn-social twitter" target="_blank"></a> \
                                    <a href="" class="btn btn-social instagram" target="_blank"></a> \
                                </p> \
                            </div> \
                            <div class="col-md-7 bio"> \
                                <div class="content"></div> \
                                <a href="/our-work" class="btn btn-border primary">View Our Work</a> \
                            </div> \
                        </div> \
                    </div> \
                </section>');

                // create elements
                this.$container = this.$section.find('.container');
                this.$memberName = this.$section.find('.member-name');
                this.$jobTitle = this.$section.find('.job-title');
                this.$info = this.$section.find('.info');
                this.$bio = this.$section.find('.bio');
                this.$bioContent = this.$section.find('.bio .content');
                this.$facebook = this.$section.find('.facebook');
                this.$twitter = this.$section.find('.twitter');
                this.$instagram = this.$section.find('.instagram');


                // append to view
                $body.append(this.$section);
            },
            measureAndPosition: function() {
                // move offscreen and measure
                this.$section.css({
                    left: -$window.width(),
                    height: 'auto'
                });

                this.height = this.$section.height();
                this.top = this.$target.offset().top + teamMemberHeight - teamMemberMargin;

                // set height to zero and position in place
                this.$section.css({
                    height: 0,
                    left: 0,
                    top: this.top
                });
            },
            open: function() {
                // update current member, info display and measure/position
                $currentTeamMember = this.$target;
                this.updateInfoDisplay();
                this.measureAndPosition();

                // determine if we need to animate top
                if (infoSectionPosOffset > 0) {
                    this.top = this.top - infoSectionPosOffset;
                }

                // animate
                this.$section.transition({
                    height: this.height,
                    top: this.top
                });
                this.$target.transition({
                    marginBottom: teamMemberMargin + this.height
                });
                $.scrollTo(this.$target, window.settings.defaultAnimationDuration, {
                    offset: -89 - infoSectionPosOffset
                });
                infoSectionPosOffset = -1;
            },
            update: function($target) {
                var $oldTarget = $currentTeamMember,
                    oldHeight = this.$container.height(),
                    heightDifference;

                // update the target
                $currentTeamMember.removeClass('selected');
                this.$target = $target;
                $currentTeamMember = this.$target;

                // transfer margin to new target
                this.$target.css({
                    marginBottom: parseInt($oldTarget.css('marginBottom'))
                });
                $oldTarget.css({
                    marginBottom: teamMemberMargin
                });

                // update the info display
                this.updateInfoDisplay();

                // calculate the height difference and animate
                heightDifference = this.$container.height() - oldHeight;
                this.height = this.height + heightDifference;
                this.$section.transition({
                    height: this.height
                });
                this.$target.transition({
                    marginBottom: teamMemberMargin + this.height
                });
            },
            updateInfoDisplay: function() {
                // update the info
                this.$memberName.text(this.$target.data('member-name'));
                this.$jobTitle.text(this.$target.data('job-title'));
                this.$bioContent.html(this.$target.data('bio'));
                this.$target.data('fb') ? this.$facebook.attr('href', this.$target.data('fb')) : this.$facebook.remove();
                this.$target.data('twitter') ? this.$twitter.attr('href', this.$target.data('twitter')) : this.$twitter.remove();
                this.$target.data('insta') ? this.$instagram.attr('href', this.$target.data('insta')) : this.$instagram.remove();

                // reset column padding
                this.$info.css({
                    paddingTop: ''
                });
                this.$bio.css({
                    paddingTop: ''
                });

                // determine which column is bigger
                if (Modernizr.mq(window.settings.mediaQueryMedium) || Modernizr.mq(window.settings.mediaQueryLarge)) {
                    var $smallSection = this.$info.outerHeight(true) > this.$bio.outerHeight(true) ? this.$bio : this.$info,
                        $largeSection = this.$info.outerHeight(true) > this.$bio.outerHeight(true) ? this.$info : this.$bio,
                        paddingTop = ($largeSection.outerHeight(true) - $smallSection.outerHeight(true)) / 2;

                    // center smaller section vertically
                    $smallSection.css({
                        paddingTop: paddingTop
                    });
                }
            }
        }

        function showInfoSection($target) {
            var infoSection = $.data(this, 'info-section'),
                position = $target.offset().top;

            // handle current info section if there is one
            if (typeof infoSection !== 'undefined') {
                // different row
                if (infoSectionPos !== position) {
                    // if new section is in a lower row, store the height as a offset the top during open animation
                    if (position > infoSection.$section.offset().top) {
                        infoSectionPosOffset = infoSection.height;
                    }
                    hideInfoSection();
                }
                // same row
                else {
                    infoSection.update($target);
                    return;
                }
            }

            infoSectionPos = position;
            infoSection = $.data(this, 'info-section', new InfoSection($target));
            infoSection.open();
        }

        function hideInfoSection() {
            var infoSection = $.data(this, 'info-section');
            $currentTeamMember.removeClass('selected');
            $currentTeamMember = undefined;
            infoSection.close();
            $.removeData(this, 'info-section');
        }

        /* Functions
         *******************************************/

        /*
         * Filter/animate the team members display
         */
        function filterTeamMembers(filter) {
            var infoSection = $.data(this, 'info-section'),
                $visibleTeamMembers = $teamMembers.filter(':visible'),
                $filteredTeamMembers = filter !== '.all' ? $teamMembers.filter(filter) : $teamMembers,
                $unfilteredTeamMembers = $teamMembers.not($filteredTeamMembers),
                $teamMemberRows = $sectionTeamMembers.find('.row'),
                newSectionHeight,
                numRows;

            // animate section
            numRows = Math.ceil($filteredTeamMembers.length / numPerRow);
            newSectionHeight = teamMemberHeight * numRows + sectionTeamMembersPadding * 2;
            $sectionTeamMembers
                .css({
                    height: $sectionTeamMembers.outerHeight()
                }) // explicitly set section height
            .transition({
                height: newSectionHeight
            }, function() {
                $(this.removeAttr('style'));
            });

            // calculate position of visible team members
            $visibleTeamMembers.each(function() {
                var $tm = $(this),
                    currentPosition = $tm.position();

                $tm.css({
                    top: currentPosition.top,
                    left: currentPosition.left
                });
            });

            // switch team members to absolute positioning and move to first row
            $teamMembers.css({
                position: 'absolute'
            }).appendTo($teamMemberRows.first());

            // update number of rows
            $teamMemberRows = updateNumRows(numRows);

            // animate filtered elements
            $filteredTeamMembers.each(function(index) {
                var $tm = $(this),
                    $row = $teamMemberRows.eq(Math.floor(index / numPerRow)),
                    properties = {
                        left: index % numPerRow * teamMemberWidth,
                        top: Math.floor(index / numPerRow) * teamMemberHeight
                    };

                $tm.transition({
                    opacity: 0
                }, function() {
                    $row.append($tm);
                    $tm.css({
                        position: '',
                        left: '',
                        top: ''
                    }).transition({
                        opacity: 1
                    });
                });
            });

            // animate unfiltered elements
            $unfilteredTeamMembers.each(function(index) {
                var $tm = $(this);

                index = $unfilteredTeamMembers.index($tm) + $unfilteredTeamMembers.length;
                $tm.transition({
                    opacity: 0
                }, function() {
                    // remove from display and position at the end of the order
                    $tm.remove().css({
                        left: (index + $filteredTeamMembers.length) % numPerRow * teamMemberWidth,
                        top: Math.floor((index + $filteredTeamMembers.length) / numPerRow) * teamMemberHeight
                    });
                });
            });
        }

        /*
         * Add/remove team member rows
         */
        function updateNumRows(numRows) {
            var $teamMemberRows = $sectionTeamMembers.find('.row');

            if (numRows < $teamMemberRows.length) {
                $teamMemberRows.slice(numRows).remove();
            } else {
                var $newRows = $();
                for (i = 0; i < numRows - $teamMemberRows.length; i++) {
                    var $newRow = $('<div>').addClass('row');
                    $newRows = $newRows.add($newRow);
                }

                $teamMemberRows = $teamMemberRows.add($newRows);
                $sectionTeamMembers.find('.container').append($teamMemberRows);
            }

            return $teamMemberRows;
        }
    });
})(jQuery);