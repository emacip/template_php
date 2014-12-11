!function ($) {

    "use strict"; // jshint ;_;

    var resizer = (function () {
        window.footer_widgets();
        postGalleryGrid();
        init_gmaps();
    });

    $(document).ready(function () {
        if (window.addEventListener) {
            window.addEventListener('scroll', scroller, false);
            window.addEventListener('resize', resizer, false);
        } else if (window.attachEvent) {
            window.attachEvent('onscroll', scroller);
            window.attachEvent('onresize', resizer);
        }
        window.footer_widgets();
        postGalleryGrid();
        init_gmaps();
        init_scrollToTop();
        init_niceScroll();
        $('.author-social a').tooltip();
        $('#navbar-toggle').sidr({
            side: inafx_theme.isRTL ? 'left' : 'right',
            onOpen: function () {
                $('#navbar-toggle > span').removeClass('fa-bars');
                $('#navbar-toggle > span').addClass('fa-times');
                $('html').addClass('sidr-open');
            },
            onClose: function () {
                $('html').removeClass('sidr-open');
                $('#navbar-toggle > span').removeClass('fa-times');
                $('#navbar-toggle > span').addClass('fa-bars');
                if (!$.browser.mobile) {
                    if (inafx_theme.niceScroll != 0) {
                        $("html").addClass('sidr-nice');
                    }
                }
            }
        });
        $('#sidr-navbar-toggle-1').click(function () {
            unload_sidr();
        });
        $('#sidr-navbar-toggle-2').click(function () {
            unload_sidr();
        });
        $('#lnk-show-search').click(function () {
            var searchbox = $('#search-box');
            if (searchbox.hasClass('visible')) {
                searchbox.removeClass('visible');
                $('#lnk-hide-search').hide();
                searchbox.animate({ 'top': '0', 'display': 'none' }).fadeOut({
                    duration: 200,
                    easing: 'swing'
                });
            }
            else {
                searchbox.addClass('visible');
                $('#lnk-hide-search').hide();
                var _top = $('#header-wrapper').height();
                if ($('#search-box').hasClass('fixed')) {
                    _top = $('#header-wrapper').height();
                }
                searchbox.animate({ 'top': _top, 'display': 'block' }, function () {
                    $('#lnk-hide-search').show();
                }).fadeIn({
                    duration: 200,
                    easing: 'swing'
                });
            }
        });
        $('#lnk-hide-search').click(function () {
            var searchbox = $('#search-box');
            searchbox.removeClass('visible');
            $('#lnk-hide-search').hide();
            searchbox.animate({ 'top': '0', 'display': 'none' }).fadeOut({
                duration: 200,
                easing: 'swing'
            });
        });
    });

    window.footer_widgets = function () {
        if (window.innerWidth < 600) {
            if ($.isFunction($.fn.masonry)) {
                $('#footer .footer-widgets .widgets-masonry').masonry({
                    itemSelector: '.widget-masonry',
                    columnWidth: function (containerWidth) {
                        return containerWidth;
                    },
                    gutterWidth: 0,
                    isResizable: true,
                    isRTL: $('body').is('.rtl')
                });
            }
        }
        else if (window.innerWidth < 768) {
            if ($.isFunction($.fn.masonry)) {
                $('#footer .footer-widgets .widgets-masonry').masonry({
                    itemSelector: '.widget-masonry',
                    columnWidth: function (containerWidth) {
                        return containerWidth / 2;
                    },
                    gutterWidth: 0,
                    isResizable: true,
                    isRTL: $('body').is('.rtl')
                });
            }
        }
        else if (window.innerWidth < 992) {
            if ($.isFunction($.fn.masonry)) {
                $('#footer .footer-widgets .widgets-masonry').masonry({
                    itemSelector: '.widget-masonry',
                    columnWidth: function (containerWidth) {
                        return containerWidth / 2;
                    },
                    gutterWidth: 0,
                    isResizable: true,
                    isRTL: $('body').is('.rtl')
                });
            }
        }
        else {
            if ($.isFunction($.fn.masonry)) {
                $('#footer .footer-widgets .widgets-masonry').masonry({
                    itemSelector: '.widget-masonry',
                    columnWidth: function (containerWidth) {
                        return containerWidth / 3;
                    },
                    gutterWidth: 0,
                    isResizable: true,
                    isRTL: $('body').is('.rtl')
                });
            }
        }
    }

    function init_niceScroll() {
        if (!$.browser.mobile) {
            if (inafx_theme.niceScroll != 0) {
                $("html").niceScroll({ scrollspeed: 200, horizrailenabled: false });
            }
            $(window).scroll(function () {
                if (inafx_theme.niceScroll != 0) {
                    $("html").getNiceScroll().resize();
                }
            });
        }
    }

    var scroller = (function () {
        if (!$.browser.mobile) {
            if (inafx_theme.stickyHeader != 0) {
                var scrollTop = $(window).scrollTop();
                resizeHeader(scrollTop);
            }
        }
    });

    function resizeHeader(scrollTop) {
        if (scrollTop < 1) {
            if ($('#header').hasClass('header-fixed')) {
                $('#header').removeClass('header-fixed');
                $('#header-wrapper').removeClass('wrapper-fixed');
                $('#search-box').removeClass('fixed');
            }
        } else {
            if (!$('#header').hasClass('header-fixed')) {
                $('#header').addClass('header-fixed');
                $('#header-wrapper').addClass('wrapper-fixed');
                $('#search-box').addClass('fixed');
            }
        }
    }

    function postGalleryGrid() {
        $('.zoom-box .zoom > a.zoom-link').swipebox({
            beforeOpen: function () {
                unload_sidr();
            }
        });
        $('.zoom-box .zoom > a.zoom-photo').swipebox({
            beforeOpen: function () {
                unload_sidr();
            }
        });
    }

    function unload_sidr() { 
        $.sidr('close', 'sidr');
    }

    function init_scrollToTop() {
        $('body').append('<a href="#top" class="scrollup"><span class="fa fa-chevron-up"></span></a>');

        $(window).scroll(function () {
            var scroll = 600;
            if ($(this).scrollTop() > scroll) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });
    }

    function init_gmaps() {
        $('.map-canvas').each(function () {
            var $this = $(this);
            var gmapId = 'gmap_' + $.now() + 1;
            $this.attr('id', gmapId);
            var lat = $this.data('latitude');
            var lng = $this.data('longitude');
            var zoom = $this.data('zoom');
            var shade = $this.data('shade');
            var saturation = $this.data('saturation');
            var icon = $this.data('marker');
            var map_info = $this.parent().find('.map-info').html();

            var myLatlng = new google.maps.LatLng(lat, lng);
            var mapOptions = {
                zoom: zoom,
                center: myLatlng,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                },
                scrollwheel: false,
                disableDefaultUI: true,
                draggable: true
            };

            var styles = [
            {
                stylers: [
                    { hue: shade },
                    { saturation: saturation }
                ]
            }, {
                featureType: "road",
                elementType: "geometry",
                stylers: [
                    { lightness: 100 },
                    { visibility: "on" }
                ]
            }, {
                featureType: "road",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]
            }
        ];

            var marker = new google.maps.Marker({
                position: myLatlng,
                animation: google.maps.Animation.DROP,
                icon: icon
            });

            var contentString = '<div class="map-info-content">' +
                            map_info +
                            '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var map = new google.maps.Map(document.getElementById(gmapId), mapOptions);
            map.setOptions({ styles: styles });

            marker.setMap(map);
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });

            document.getElementById(gmapId).addEventListener("touchstart", thisTouchStart, true);
            document.getElementById(gmapId).addEventListener("touchend", thisTouchEnd, true);
            document.getElementById(gmapId).addEventListener("touchmove", thisTouchMove, true);
        });
    }

    var dragFlag = false;
    var start = 0, end = 0;

    function thisTouchStart(e) {
        dragFlag = true;
        start = e.touches[0].pageY;
    }

    function thisTouchEnd() {
        dragFlag = false;
    }

    function thisTouchMove(e) {
        if (!dragFlag) return;
        end = e.touches[0].pageY;
        window.scrollBy(0, (start - end));
    }

} (window.jQuery);