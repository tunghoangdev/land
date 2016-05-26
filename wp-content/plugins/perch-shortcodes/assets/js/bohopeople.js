jQuery(document).ready(function ($) {
	$(".testimonial-carousel").each(function(){
		var autoplay = $(this).data('autoplay');
		$(this).owlCarousel({
		 	items: 1,
		    nav: true,
		    loop: true,
		    dots: false,
		    autoplay: autoplay,
		    autoplayHoverPause: true
		  });
	})
	$(".clients_carousel").each(function(){
		var autoplay = $(this).data('autoplay');
		var item = $(this).data('item');
		$(this).owlCarousel({
		    nav: false,
		    loop: true,
		    dots: false,
		    autoplay: autoplay,
		    autoplayHoverPause: true,
		    margin: 98,
		    autoWidth: false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:item
		        }
		    }
		  });
	})

	$('.products-carousel.products-carousel-default').each(function(){
		var items = $(this).data('items');
		var autoplay = $(this).data('autoplay');
		$(this).owlCarousel({
		 	items: items,
		 	center: true,
		    nav: false,
		    loop: true,
		    dots: true,
		    autoplay: autoplay,
		    autoplayHoverPause: true,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            loop: true,
		        },
		        600:{
		            items:2,
		            loop: true,
		        },
		        1000:{
		            items:items,
		            loop:true
		        }
		    }
		  });
	});

	$('.products-carousel.products-carousel-1').each(function(){
		var items = $(this).data('items');
		var autoplay = $(this).data('autoplay');
		$(this).owlCarousel({
		 	items: items,
		 	center: false,
		 	margin: 30,
		    nav: true,
		    loop: true,
		    dots: true,
		    autoplay: autoplay,
		    autoplayHoverPause: true,
		    stagePadding: 1,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:false
		        },
		        600:{
		            items:2,
		            loop: true,
		            nav:false
		        },
		        1000:{
		            items:items,
		            nav:true,
		            loop: true,
		        }
		    }
		  });
	})
	 
 })