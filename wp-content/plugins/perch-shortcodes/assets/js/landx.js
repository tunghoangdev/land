 jQuery(document).ready(function(){
    jQuery(".screenshots .owl-carousel").each(function(){
          var owl = jQuery(this);
            owl.owlCarousel({
                items: owl.data('item'),
                itemsDesktop: [1000, 3],
                itemsDesktopSmall: [900, 2],
                itemsTablet: [600, 1],
                itemsMobile: false,
                navigation: false,
                slideSpeed: 800,
                paginationSpeed: 400,
                autoPlay: 5000,
                stopOnHover: true
            });
        })
        var owl = jQuery("#feedbacks, .feedbacks");
        owl.owlCarousel({
            items: 3,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: false,
            stopOnHover: true
        });
        jQuery('.screenshots a, .gallery-item a').nivoLightbox({
            effect: 'fadeScale',
        });
   })  