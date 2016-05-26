jQuery(document).ready(function ($) {
	// Prepare items arrays for lightbox
	$('.perch-lightbox-gallery').each(function () {
		var slides = [];
		$(this).find('.perch-slider-slide, .perch-carousel-slide, .perch-custom-gallery-slide').each(function (i) {
			$(this).attr('data-index', i);
			slides.push({
				src: $(this).children('a').attr('href')
			});
		});
		$(this).data('slides', slides);
	});
	// Enable sliders
	$('.perch-slider').each(function () {
		// Prepare data
		var $slider = $(this);
		// Apply Swiper
		var $swiper = $slider.swiper({
			wrapperClass: 'perch-slider-slides',
			slideClass: 'perch-slider-slide',
			slideActiveClass: 'perch-slider-slide-active',
			slideVisibleClass: 'perch-slider-slide-visible',
			pagination: '#' + $slider.attr('id') + ' .perch-slider-pagination',
			autoplay: $slider.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $slider.data('mousewheel'),
			speed: $slider.data('speed'),
			calculateHeight: $slider.hasClass('perch-slider-responsive-yes'),
			loop: true
		});
		// Prev button
		$slider.find('.perch-slider-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$slider.find('.perch-slider-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable carousels
	$('.perch-carousel').each(function () {
		// Prepare data
		var $carousel = $(this),
			$slides = $carousel.find('.perch-carousel-slide');
		// Apply Swiper
		var $swiper = $carousel.swiper({
			wrapperClass: 'perch-carousel-slides',
			slideClass: 'perch-carousel-slide',
			slideActiveClass: 'perch-carousel-slide-active',
			slideVisibleClass: 'perch-carousel-slide-visible',
			pagination: '#' + $carousel.attr('id') + ' .perch-carousel-pagination',
			autoplay: $carousel.data('autoplay'),
			paginationClickable: true,
			grabCursor: true,
			mode: 'horizontal',
			mousewheelControl: $carousel.data('mousewheel'),
			speed: $carousel.data('speed'),
			slidesPerView: ($carousel.data('items') > $slides.length) ? $slides.length : $carousel.data('items'),
			slidesPerGroup: $carousel.data('scroll'),
			calculateHeight: $carousel.hasClass('perch-carousel-responsive-yes'),
			loop: true
		});
		// Prev button
		$carousel.find('.perch-carousel-prev').click(function (e) {
			$swiper.swipeNext();
		});
		// Next button
		$carousel.find('.perch-carousel-next').click(function (e) {
			$swiper.swipePrev();
		});
	});
	// Enable lightbox
	$('.perch-lightbox-gallery').on('click', '.perch-slider-slide, .perch-carousel-slide, .perch-custom-gallery-slide', function (e) {
		e.preventDefault();
		var slides = $(this).parents('.perch-lightbox-gallery').data('slides');
		$.magnificPopup.open({
			items: slides,
			type: 'image',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1],
				tPrev: perch_magnific_popup.prev,
				tNext: perch_magnific_popup.next,
				tCounter: perch_magnific_popup.counter
			},
			tClose: perch_magnific_popup.close,
			tLoading: perch_magnific_popup.loading
		}, $(this).data('index'));
	});
});