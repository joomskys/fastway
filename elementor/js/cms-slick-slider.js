( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var CMSSlickSliderHandler = function( $scope, $ ) {
        var breakpoints = elementorFrontend.config.breakpoints;
        var carousel = $scope.find(".cms-slick-slider");
        if(carousel.length == 0){
            return false;
        }
        var data = carousel.data();
        var gutter = data.gutter;
        var slickOptions = {
            fade: true === data.fade,
            slidesToShow: data.slidestoshow,
            autoplay: true === data.autoplay,
            autoplaySpeed: data.autoplayspeed,
            infinite: true === data.infinite,
            pauseOnHover: true === data.pauseonhover,
            speed: data.speed,
            arrows: true === data.arrows,
            dots: true === data.dots,
            rtl: 'rtl' === data.dir,
            prevArrow : '<div class="cms-slick-prev"><span class="cms-slick-prev-icon"></span></div>',
            nextArrow : '<div class="cms-slick-next"><span class="cms-slick-next-icon"></span></div>',
            dotsClass: 'cms-slick-dots',
            slidesToShow: data.slidestoshow,
            slidesToScroll: data.slidestoscroll,
            responsive: [
                {
                    breakpoint: breakpoints.lg,
                    settings: {
                        slidesToShow: data.slidestoshowtablet,
                        slidesToScroll: data.slidestoscrolltablet,
                        arrows: data.arrowstablet,
                        dots: data.dotstablet
                    }
                },
                {
                    breakpoint: breakpoints.md,
                    settings: {
                        slidesToShow: data.slidestoshowmobile,
                        slidesToScroll: data.slidestoscrollmobile,
                        arrows: data.arrowsmobile,
                        dots: data.dotsmobile
                    }
                }
            ],
            adaptiveHeight: true
        };
        carousel.slick(slickOptions);
        carousel.find('.slick-slide').css({
            'padding-left':gutter,
            'padding-right':gutter
        });
        carousel.find('.cms-slick-prev').css({
            'left':gutter
        });
        carousel.find('.cms-slick-next').css({
            'right':gutter
        });
        carousel.on('breakpoint', function(event,slick){
            $('.slick-slide').css({
                'padding-left':gutter,
                'padding-right':gutter
            });
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_image_carousel.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_testimonial.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_teams_list.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_clients_list.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_service.default', CMSSlickSliderHandler );
    } );
} )( jQuery );