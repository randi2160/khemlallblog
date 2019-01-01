(function (jQuery) {
    "use strict";
    jQuery(document).ready(function(){




        /* nav bar fixed */
        jQuery(window).scroll(function () {



            if (jQuery(window).scrollTop() > 30) {
                jQuery('.main-header').addClass('navbar-fixed-top');
            }

            if (jQuery(window).scrollTop() < 31) {
                jQuery('.main-header').removeClass('navbar-fixed-top');
            }
        });





//Primary Nav in both scene

        var windowWidth = jQuery(window).width();
        var nav = ".main-nav";
        //    for sub menu arrow

        //    for sub menu arrow
        jQuery('.main-nav >li:has("ul")>a').each(function() {
            jQuery(this).addClass('below');
        });
        jQuery('ul:not(.main-nav)>li:has("ul")>a').each(function() {
            jQuery(this).addClass('side');
        });
        if (windowWidth > 991) {

            jQuery('#showbutton').off('click');
            jQuery('.im-hiding').css('display', 'block');
            jQuery(nav).off('mouseenter', 'li');
            jQuery(nav).off('mouseleave', 'li');
            jQuery(nav).off('click', 'li');
            jQuery(nav).off('click', 'a');
            jQuery(nav).on('mouseenter', 'li', function() {
                jQuery(this).children('ul').stop().hide();
                jQuery(this).children('ul').slideDown(400);
            });
            jQuery(nav).on('mouseleave', 'li', function() {
                jQuery(this).children('ul').stop().slideUp(350);
            });
        } else {

            jQuery('#showbutton').off('click');
            jQuery('.im-hiding').css('display', 'none');
            jQuery(nav).off('mouseenter', 'li');
            jQuery(nav).off('mouseleave', 'li');
            jQuery(nav).off('click', 'li');
            jQuery(nav).off('click', 'a');
            jQuery(nav).on('click', 'a', function(e) {
                jQuery(this).next('ul').attr('style=""');
                jQuery(this).next('ul').slideToggle();
                if (jQuery(this).next('ul').length !== 0) {
                    e.preventDefault();
                }
            });
            // for hide menu
            jQuery('#showbutton').on('click', function() {

                jQuery('.im-hiding').slideToggle();
            });
        }
        jQuery(window).resize(function() {
            windowWidth = jQuery(window).width();
            jQuery(nav + ' ul').each(function() {
                jQuery(this).attr('style', '" "');
            });
            if (windowWidth > 991) {
                jQuery('#showbutton').off('click');
                jQuery('.im-hiding').css('display', 'block');
                jQuery(nav).off('mouseenter', 'li');
                jQuery(nav).off('mouseleave', 'li');
                jQuery(nav).off('click', 'li');
                jQuery(nav).off('click', 'a');
                jQuery(nav).on('mouseenter', 'li', function() {
                    jQuery(this).children('ul').stop().hide();
                    jQuery(this).children('ul').slideDown(400);
                });
                jQuery(nav).on('mouseleave', 'li', function() {
                    jQuery(this).children('ul').stop().slideUp(350);
                });
            } else {
                jQuery('#showbutton').off('click');
                jQuery('.im-hiding').css('display', 'none');
                jQuery(nav).off('mouseenter', 'li');
                jQuery(nav).off('mouseleave', 'li');
                jQuery(nav).off('click', 'li');
                jQuery(nav).off('click', 'a');
                jQuery(nav).on('click', 'a', function(e) {
                    jQuery(this).next('ul').attr('style=""');
                    jQuery(this).next('ul').slideToggle();
                    if (jQuery(this).next('ul').length !== 0) {
                        e.preventDefault();
                    }
                });
                // for hide menu
                jQuery('#showbutton').on('click', function() {

                    jQuery('.im-hiding').slideToggle();
                });
            }
        });

        /*
            Slider Crousel
            ============================*/
        jQuery(".all-slide").owlCarousel({
            slideSpeed : 500,
            paginationSpeed : 1000,
            items: 1,
            dots: true,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
            autoHeight:true,
            singleItem:true,
            autoplay: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]


        });

        jQuery(".all-slide").on("translate.owl.carousel", function(){
            jQuery(".slider-text *").removeClass("animated fadeInUp").css("opacity", "0");
            jQuery(".slider-text *").removeClass("animated fadeInDown").css("opacity", "0");
        });

        jQuery(".all-slide").on("translated.owl.carousel", function(){
            jQuery(".slider-text *").addClass("animated fadeInUp").css("opacity", "1");
            jQuery(".slider-text *").addClass("animated fadeInDown").css("opacity", "1");
        });

        /*
             Testimonial Crousel
             ============================*/
        jQuery(".all-testimonial").owlCarousel({

            loop: true,
            slideSpeed:2000,
            pagination:true,
            autoplay: true,
            nav:true,
            dots:true,
            items :1,
            navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [980,2],
            itemsMobile : [479,1]
        });



        jQuery(".client").owlCarousel({
            slideSpeed : 300,
            autoPlay:true,
            paginationSpeed : 400,
            singleItem:true,
            navigation : false,
            pagination : true

        });



        /*
        scrollUp
        ============================*/
        jQuery.scrollUp({
            scrollText: '<i class="fa fa-angle-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade'
        });
        /*
        Counter Js
        ============================*/
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });
        /*
        Magnific Popup
        ============================*/
        jQuery('.gallery-photo').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
        });




    });


})(jQuery);

/*for sticky  side bar */
(function(jQuery) {
    "use strict";
    jQuery(document).ready(function() {
        var top_news = jQuery('#featured-slider');
        top_news.show().owlCarousel({
            items : 1,
            singleItem : true,
            responsive: true,
            navigation : true,
            navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        });

        jQuery('.search-wrapper i').click(function() {
            jQuery('.search-form-wrapper').toggleClass('search-form-active');
        });

        //Sticky header
        var headerHeight = jQuery('.header-nav').height();
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() > headerHeight) {
                jQuery('.header-nav').addClass('fixed-top');
            } else {
                jQuery('.header-nav').removeClass('fixed-top');
            }
        });

    });
})(jQuery);

