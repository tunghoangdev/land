(function (jQuery) {
    
    "use strict";

/* =================================
===  MAILCHIMP                 ====
=================================== */        

        jQuery('.mailchimp').each(function(){
            jQuery(this).ajaxChimp({
                url: jQuery(this).data('posturl'),
                language: jQuery(this).data('language'),
                callback: mccallbackFunction
            });
        })

        function mccallbackFunction (resp) {
            var parts = resp.msg.split(' - ', 2);
            if (parts[1] === undefined) {
                var msg = resp.msg;

            } else {
                var i = parseInt(parts[0], 10);
                if (i.toString() === parts[0]) {
                    var index = parts[0];
                    var msg = parts[1];
                  
                } else {
                    var index = -1;
                    var msg = resp.msg;

                }

            }
            if (resp.result === 'success') {
                jQuery('.subscription-success').html('<span class="icon_check_alt2"></span> ' + msg).fadeIn(1000);
                jQuery('.subscription-error').fadeOut(500);
            }else{
                jQuery('.subscription-error').html('<span class="icon_close_alt2"></span> ' + msg).fadeIn(1000);
            }
        }
    
   
         /*jQuery('.mailchimp').ajaxChimp({
            callback: mailchimpCallback,
            url: landx.mailchimp_post_url 
        });


    function mailchimpCallback(resp) {
       
        if (resp.result === 'success') {
            jQuery('.subscription-success').html('<span class="icon_check_alt2"></span>' + resp.msg).fadeIn(1000);
            jQuery('.subscription-error').fadeOut(500);
        }
        else if (resp.result === 'error') {
            jQuery('.subscription-error').html('<span class="icon_close_alt2"></span>' + resp.msg).fadeIn(1000);
        }
    }*/


/* =================================
===  STICKY NAV                 ====
=================================== */
    jQuery('.main-navigation a').on('click', function(){
        jQuery('.main-navigation li').removeClass('current');
    });
    jQuery('a.show-info-qt').on('click', function(e){
        e.preventDefault();
        jQuery('.quatang-acd').slideToggle();
    });
    jQuery('.main-navigation').onePageNav({
        scrollThreshold: 0.2, // Adjust if Navigation highlights too early or too late
        scrollOffset: 75, //Height of Navigation Bar
        filter: ':not(.external)',
        changeHash: true
    }); 

    /* NAVIGATION VISIBLE ON SCROLL */
    mainNav();
    jQuery(window).scroll(function () {
        mainNav();
    });

    function mainNav() {
        var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        if(jQuery('.landx-onepage .sticky-navigation').hasClass('header-on')){
            jQuery('.landx-onepage .sticky-navigation').stop().animate({
                "opacity": '1',
                "top": '0'
            });
        }else{
            if (top > 40) {            
                jQuery('.landx-onepage .sticky-navigation, .landx-multipage .sticky-navigation').stop().animate({
                    "opacity": '1',
                    "top": '0'
                });
            }        
            else{
                jQuery('.landx-onepage .sticky-navigation').stop().animate({
                    "opacity": '0',
                    "top": '-75'
                });
            } 
        }

        
        
    }


/* =================================
===  OWL CROUSEL               ====
=================================== */
    var owl = jQuery("#screenshots");
    owl.owlCarousel({
        items: 3, //3 items above 1000px browser width
        itemsDesktop: [1000, 3], //3 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //1 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        navigation: false, // Show next and prev buttons
        slideSpeed: 800,
        paginationSpeed: 400,
        autoPlay: 5000,
        stopOnHover: true
    });

    var owl = jQuery("#feedbacks");
    owl.owlCarousel({
        items: 3, //3 items above 1000px browser width
        itemsDesktop: [1000, 2], //2 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //1 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        navigation: false, // Show next and prev buttons
        stopOnHover: true
    });


/* =================================
===  Nivo Lightbox              ====
=================================== */
    jQuery('#screenshots a, .gallery-item a').nivoLightbox({
        effect: 'fadeScale',
    });



/* =================================
===  EXPAND COLLAPSE            ====
=================================== */
    if(jQuery('.expand-form').length > 0){
        jQuery('.expand-form').simpleexpand({
            'defaultTarget': '.expanded-contact-form'
        });
    }
    

/* =================================
===  DOWNLOAD BUTTON CLICK SCROLL ==
=================================== */
    jQuery('.cta-section').localScroll({
        duration: 1000
    });
    jQuery('.cta-section').each(function(){
            jQuery(this).parallax({imageSrc: jQuery(this).data('image-src'), speed: 0.0});
        })
   // jQuery('#home.image').parallax();

    jQuery('.eqheight').equalHeights()

/* =================================
===  RESPONSIVE VIDEO             ==
=================================== */
    jQuery(".video-container").fitVids();


/* =================================
===  SMOOTH SCROLL             ====
=================================== */
    var scrollAnimationTime = 1200,
        scrollAnimation = 'easeInOutExpo';
    jQuery('a.scrollto').bind('click.smoothscroll', function (event) {
        event.preventDefault();
        var target = this.hash;
        jQuery('html, body').stop().animate({
            'scrollTop': jQuery(target).offset().top
        }, scrollAnimationTime, scrollAnimation, function () {
            window.location.hash = target;
        });
    });


/* =================================
===  Bootstrap Internet Explorer 10 in Windows 8 and Windows Phone 8 FIX
=================================== */
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
        document.createTextNode('@-ms-viewport{width:auto!important}'))
        document.querySelector('head').appendChild(msViewportStyle)
    }
})(jQuery);




jQuery(window).resize(function () {

    "use strict";

    var ww = jQuery(window).width();
    
    /* COLLAPSE NAVIGATION ON MOBILE AFTER CLICKING ON LINK */
    
    if (ww < 480) {
        jQuery('.main-navigation a').on('click', function () {
            jQuery(".navbar-toggle").click();
        });
    }
});
// jQuery(window).load(function() {
//     "use strict";
//         // will first fade out the loading animation
//     jQuery(".status").fadeOut();
//         // will fade out the whole DIV that covers the website.
//     jQuery(".preloader").delay(1000).fadeOut("slow");
// })
