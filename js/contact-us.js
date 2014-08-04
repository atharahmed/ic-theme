(function($) {
    $(function() {

        /* Filter buttons
         *******************************************/
        $('.btn-filter').click(function(e) {
            var hash = this.hash;

            $.scrollTo(hash, window.settings.defaultAnimationDuration, {
                offset: -50
            });

            return false;
        });

        // Variables
        var $inputGroup = $('#email-group'),
            $emailInput = $inputGroup.find('input[type="email"]'),
            spinner = new Spinner({
                lines: 11, // The number of lines to draw
                length: 5, // The length of each line
                width: 3, // The line thickness
                radius: 6, // The radius of the inner circle
                corners: 1, // Corner roundness (0..1)
                rotate: 0, // The rotation offset
                direction: 1, // 1: clockwise, -1: counterclockwise
                color: '#FFF', // #rgb or #rrggbb or array of colors
                speed: 1, // Rounds per second
                trail: 60, // Afterglow percentage
                shadow: false, // Whether to render a shadow
                hwaccel: false, // Whether to use hardware acceleration
                className: 'spinner', // The CSS class to assign to the spinner
                zIndex: 2e9, // The z-index (defaults to 2000000000)
                top: '50%', // Top position relative to parent
                left: '50%' // Left position relative to parent
            });

        // init bootstrap validator
        $('#email-submit-form').bootstrapValidator({
            live: 'disabled',
            excluded: [':hidden'],
            submitButtons: 'input[type="submit"]',
            trigger: 'keyup',
            fields: {
                "interaction[name]": {
                    validators: {
                        notEmpty: {
                            message: 'Your full name is required'
                        }
                    }
                },
                "interaction[email]": {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required.'
                        },
                        emailAddress: {
                            message: 'Please enter a valid email address.'
                        }
                    }
                },
                "email[body]": {
                    validators: {
                        notEmpty: {
                            message: 'A message is required'
                        }
                    }
                },
                "email[subject]": {
                    validators: {
                        notEmpty: {
                            message: 'i.e. "Merchandise question" or "donation question"'
                        }
                    }
                },
                "ticket[labels_new]": {
                    validators: {
                        notEmpty: {
                            message: 'What is your message about?'
                        }
                    }
                }
            }
        });

        function displaySpinner(show) {
            var $submitBtnWrap = $('#submit-btn-wrap'),
                $submitBtn = $submitBtnWrap.find('input[type="submit"]');

            if (typeof(show) === 'undefined') show = true;

            if (show) {
                $submitBtn.attr('disabled', 'disabled').val('');
                spinner.spin($submitBtnWrap.get(0));
            } else {
                $submitBtn.removeAttr('disabled').val('Submit');
                spinner.stop();
            }
        }

    });
})(jQuery);

function deskwidget() {
    DESK = window.DESK || {};
    (function() {
        if (DESK && DESK.Widget) {
            return
        }
        DESK.Widget = function(a) {
            this.init(a)
        };
        ASSISTLY = window.ASSISTLY || {};
        ASSISTLY.Widget = DESK.Widget;
        (function() {
            DESK.Widget.ID_COUNTER = 0;
            DESK.Widget.prototype = function() {
                var d = "/customer/widget/chats/new";
                var f = "/customer/widget/emails/new";
                var g = "<div id='chat-icon' data-icon='d'></div>";
                var e = "<div id='chat-icon' data-icon='d'></div>";
                var b = "<div id='chat-icon' data-icon='d'></div>";
                var a = "<div id='chat-icon' data-icon='d'></div>";
                var c = "/customer/agent_online_check";
                return {
                    init: function(i) {
                        this._widgetNumber = ++ASSISTLY.Widget.ID_COUNTER;
                        this._setWidgetType(i.type);
                        var h = ((i.fields || {}).customer || {}).locale_code;
                        if (h) {
                            if (this._isChatWidget) {
                                d = d.replace(/customer/, "customer/" + h)
                            } else {
                                if (this._isEmailWidget) {
                                    f = f.replace(/customer/, "customer/" + h)
                                }
                            }
                        }
                        this._secure = i.secure || window.location.protocol == "https:";
                        this._site = i.site;
                        this._port = i.port || 80;
                        if (i.port) {
                            this._base_url = (this._secure ? "https://" : "http://") + this._site + (this._secure ? "" : (":" + this._port))
                        } else {
                            this._base_url = (this._secure ? "https://" : "http://") + this._site
                        }
                        this._widgetPopupWidth = i.popupWidth || 640;
                        this._widgetPopupHeight = i.popupHeight || 700;
                        this._siteAgentCount = -1;
                        this._siteAgentRoutingCount = -1;
                        this._widgetDisplayMode = i.displayMode || 0;
                        this._offerAlways = false;
                        this._offerRoutingAgentsAvailable = true;
                        this._offerAgentsOnline = false;
                        this._offerEmailIfChatUnavailable = false;
                        this._widgetID = i.id || "assistly-widget-" + this._widgetNumber;
                        if (!i.id) {
                            document.write('<span class="assistly-widget" id="' + this._widgetID + '"></span>')
                        }
                        this.widgetDOM = document.getElementById(this._widgetID);
                        this.setFeatures(i.features);
                        if (i.fields) {
                            this._ticketFields = i.fields.ticket;
                            this._interactionFields = i.fields.interaction;
                            this._customerFields = i.fields.customer;
                            this._emailFields = i.fields.email;
                            this._chatFields = i.fields.chat
                        } else {
                            this._ticketFields = [];
                            this._interactionFields = [];
                            this._customerFields = [];
                            this._emailFields = [];
                            this._chatFields = []
                        }
                        return this
                    },
                    _setWidgetType: function(h) {
                        this._isEmailWidget = false;
                        this._isChat = true;
                        this._type = h;
                        switch (h) {
                            case "email":
                                this._isEmailWidget = true;
                                break;
                            case "chat":
                                this._isChatWidget = true;
                                break;
                            default:
                                this._isChatWidget = true
                        }
                        return this
                    },
                    setFeatures: function(h) {
                        if (h) {
                            if (!(typeof h.offerAlways === "undefined")) {
                                this._offerAlways = h.offerAlways
                            }
                            if (!(typeof h.offerRoutingAgentsAvailable === "undefined")) {
                                this._offerRoutingAgentsAvailable = h.offerRoutingAgentsAvailable
                            }
                            if (!(typeof h.offerAgentsOnline === "undefined")) {
                                this._offerAgentsOnline = h.offerAgentsOnline
                            }
                            if (!(typeof h.offerEmailIfChatUnavailable === "undefined")) {
                                this._offerEmailIfChatUnavailable = h.offerEmailIfChatUnavailable
                            }
                        }
                        return this
                    },
                    setSiteAgentCount: function(h) {
                        this._siteAgentCount = h.online_agents;
                        this._siteAgentRoutingCount = h.routing_agents;
                        this.render()
                    },
                    _buildBaseButton: function() {
                        var q = "";
                        var j = "";
                        var l = "";
                        var i = false;
                        var h = "";
                        var n = "";
                        var k = "";
                        var p = "";
                        var o = "";
                        var m = "";
                        if (this._ticketFields) {
                            for (param in this._ticketFields) {
                                h += "ticket[" + escape(param) + "]=" + escape(this._ticketFields[param]) + "&"
                            }
                        }
                        if (this._interactionFields) {
                            for (param in this._interactionFields) {
                                n += "interaction[" + escape(param) + "]=" + escape(this._interactionFields[param]) + "&"
                            }
                        }
                        if (this._customerFields) {
                            for (param in this._customerFields) {
                                k += "customer[" + escape(param) + "]=" + escape(this._customerFields[param]) + "&"
                            }
                        }
                        if (this._emailFields) {
                            for (param in this._emailFields) {
                                p += "email[" + escape(param) + "]=" + escape(this._emailFields[param]) + "&"
                            }
                        }
                        if (this._chatFields) {
                            for (param in this._chatFields) {
                                o += "chat[" + escape(param) + "]=" + escape(this._chatFields[param]) + "&"
                            }
                        }
                        m = h + n + p + o + k;
                        if (this._isChatWidget) {
                            j = (this._secure ? b : g);
                            l = d;
                            if (!this._offerAlways) {
                                if (this._offerRoutingAgentsAvailable && (this._siteAgentRoutingCount < 1)) {
                                    i = true
                                }
                                if (this._offerAgentsOnline && (this._siteAgentCount < 1)) {
                                    i = true
                                }
                            }
                            if (!this._offerAlways && !this._offerRoutingAgentsAvailable && !this._offerAgentsOnline) {
                                i = true
                            }
                            if (i && this._offerEmailIfChatUnavailable) {
                                this._isChatWidget = false;
                                this._isEmailWidget = false;
                            }
                        }
                        if (this._isEmailWidget) {
                            j = (this._secure ? a : e);
                            l = f
                        }
                        l += "?" + m;

                        if (!i) {
                            if (this._widgetDisplayMode == 0) {

                                q = "<a href='" + this._base_url + l + "' onclick='window.open(\'" + this._base_url + l + ", 'assistly_chat','resizable=1, status=0, toolbar=0,width=" + this._widgetPopupWidth + ", height=" + this._widgetPopupHeight + ")\" class='btn btn-default primary a-desk-widget a-desk-widget-'" + this._type + "'>Start Online Chat</a><p id='alternative'>OR</p>"
                            }

                            if (this._widgetDisplayMode == 1) {
                                q = "<p id='alternative'>OR</p><a href='" + this._base_url + l + "' class='btn btn-default primary a-desk-widget a-desk-widget-'" + this._type + "'>Start Online Chat</a>"
                            }
                        } else {
                            q = ""
                        }
                        return q
                    },
                    _renderChatWidget: function() {

                        if (this._siteAgentCount < 0) {
                            var h = this;
                            url = this._base_url + c;
                            jQuery.getJSON(url + "?callback=?", function(i) {
                                if (i) {
                                    h.setSiteAgentCount(i)
                                }
                            })
                        } else {
                            this.widgetDOM.innerHTML = this._buildBaseButton()
                        }
                        return this
                    },
                    _renderEmailWidget: function() {
                        this.widgetDOM.innerHTML = this._buildBaseButton();
                        return this
                    },
                    render: function() {
                        if (this._isChatWidget) {
                            this._renderChatWidget()
                        }
                        if (this._widgetDisplayMode == 1) {
                            jQuery("#" + this._widgetID + " a").each(function() {
                                jQuery(this).fancybox({
                                    width: this._widgetPopupWidth,
                                    height: this._widgetPopupHeight,
                                    type: "iframe",
                                    hideOnOverlayClick: false,
                                    centerOnScroll: true
                                })
                            })
                        }
                        return this
                    }
                }
            }()
        })()
    })();
    (function(a) {
        a.autolink = function(c, e) {
            e = e || "_blank";
            c = c || "";
            var b = /\b([\w+.:-]+:\/\/)|mailto:/i,
                d = new RegExp("(\\b(?:([\\w+.:-]+:)//|www.|mailto:)(([\\w.\\-+]+(:\\w+)?@)?[-\\w]+(?:\\.[-\\w]+)*(?::\\d+)?(?:/(?:[~\\w\\+@%=\\(\\)-]|(?:[,.;:#'][^\\s$]))*)*(?:\\?[\\w\\+@%&-=.;:/-\\[\\]]+)?(?:\\#[\\w\\-]*)?)([[^$.*+?=!:|\\/()[]{}]]|<|$|))", "g");
            return c.replace(d, function(h) {
                var f = h,
                    g = e;
                if (!b.test(h)) {
                    f = "http://" + f
                } else {
                    if (/mailto:/i.test(h)) {
                        g = "_self"
                    }
                }
                return a("<a/>", {
                    target: g,
                    href: f
                }).html(h).outerHTML()
            })
        };
        a.fn.highlight = function(d, c) {
            var b = d.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
            return this.each(function() {
                var e = c || '<span class="highlight">$1</span>';
                a(this).html(a(this).html().replace(new RegExp("(" + b + '(?![\\w\\s?&.\\/;#~%"=-]*>))', "ig"), e))
            })
        };
        a.fn.autolink_old = function(b) {
            b = b || "_self";
            return this.each(function() {
                var c = /((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g;
                a(this).html(a(this).html().replace(c, '<a target="' + b + '" href="$1">$1</a> '))
            })
        };
        a.fn.mailto = function() {
            return this.each(function() {
                var b = /(([a-z0-9*._+]){1,}\@(([a-z0-9]+[-]?){1,}[a-z0-9]+\.){1,}([a-z]{2,4}|museum)(?![\w\s?&.\/;#~%"=-]*>))/g;
                a(this).html(a(this).html().replace(b, '<a href="mailto:$1">$1</a>'))
            })
        };
        a.fn.autolink = function(b) {
            return this.each(function() {
                var d = a(this),
                    c = a.autolink(d.html(), b);
                d.html(c)
            })
        }
    })(jQuery);


    // ********************************************************************************
    // This needs to be placed in the document body where you want the widget to render
    // ********************************************************************************

    new DESK.Widget({
        version: 1,
        site: 'invisiblechildren.desk.com',
        port: '80',
        type: 'chat',
        displayMode: 1, //0 for popup, 1 for lightbox
        features: {
            offerAlways: false,
            offerAgentsOnline: false,
            offerRoutingAgentsAvailable: true,
            offerEmailIfChatUnavailable: false
        }
    }).render();
}