jQuery(document).ready(function ($) {

	// Spoiler
	$('body:not(.perch-other-shortcodes-loaded)').on('click', '.perch-spoiler-title', function (e) {
		var $title = $(this),
			$spoiler = $title.parent(),
			bar = ($('#wpadminbar').length > 0) ? 28 : 0;
		// Open/close spoiler
		$spoiler.toggleClass('perch-spoiler-closed');
		// Close other spoilers in accordion
		$spoiler.parent('.perch-accordion').children('.perch-spoiler').not($spoiler).addClass('perch-spoiler-closed');
		// Scroll in spoiler in accordion
		if ($(window).scrollTop() > $title.offset().top) $(window).scrollTop($title.offset().top - $title.height() - bar);
		e.preventDefault();
	});
	$('.perch-spoiler-content').removeAttr('style');
	// Tabs
	$('body:not(.perch-other-shortcodes-loaded)').on('click', '.perch-tabs-nav span', function (e) {
		var $tab = $(this),
			data = $tab.data(),
			index = $tab.index(),
			is_disabled = $tab.hasClass('perch-tabs-disabled'),
			$tabs = $tab.parent('.perch-tabs-nav').children('span'),
			$panes = $tab.parents('.perch-tabs').find('.perch-tabs-pane'),
			$gmaps = $panes.eq(index).find('.perch-gmap:not(.perch-gmap-reloaded)');
		// Check tab is not disabled
		if (is_disabled) return false;
		// Hide all panes, show selected pane
		$panes.hide().eq(index).show();
		// Disable all tabs, enable selected tab
		$tabs.removeClass('perch-tabs-current').eq(index).addClass('perch-tabs-current');
		// Reload gmaps
		if ($gmaps.length > 0) $gmaps.each(function () {
			var $iframe = $(this).find('iframe:first');
			$(this).addClass('perch-gmap-reloaded');
			$iframe.attr('src', $iframe.attr('src'));
		});
		// Set height for vertical tabs
		tabs_height();
		// Open specified url
		if (data.url !== '') {
			if (data.target === 'self') window.location = data.url;
			else if (data.target === 'blank') window.open(data.url);
		}
		e.preventDefault();
	});

	// Activate tabs
	$('.perch-tabs').each(function () {
		var active = parseInt($(this).data('active')) - 1;
		$(this).children('.perch-tabs-nav').children('span').eq(active).trigger('click');
		tabs_height();
	});

	// Activate anchor nav for tabs and spoilers
	anchor_nav();

	// Lightbox
	$('.perch-lightbox').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			if ($(this).parent().attr('id') === 'perch-generator-preview') $(this).html(perch_other_shortcodes.no_preview);
			else {
				var type = $(this).data('mfp-type');
				$(this).magnificPopup({
					type: type,
					tClose: perch_magnific_popup.close,
					tLoading: perch_magnific_popup.loading,
					gallery: {
						tPrev: perch_magnific_popup.prev,
						tNext: perch_magnific_popup.next,
						tCounter: perch_magnific_popup.counter
					},
					image: {
						tError: perch_magnific_popup.error
					},
					ajax: {
						tError: perch_magnific_popup.error
					}
				}).magnificPopup('open');
			}
		});
	});
	// Tables
	$('.perch-table tr:even').addClass('perch-even');
	// Frame
	$('.perch-frame-align-center, .perch-frame-align-none').each(function () {
		var frame_width = $(this).find('img').width();
		$(this).css('width', frame_width + 12);
	});
	// Tooltip
	$('.perch-tooltip').each(function () {
		var $tt = $(this),
			$content = $tt.find('.perch-tooltip-content'),
			is_advanced = $content.length > 0,
			data = $tt.data(),
			config = {
				style: {
					classes: data.classes
				},
				position: {
					my: data.my,
					at: data.at,
					viewport: $(window)
				},
				content: {
					title: '',
					text: ''
				}
			};
		if (data.title !== '') config.content.title = data.title;
		if (is_advanced) config.content.text = $content;
		else config.content.text = $tt.attr('title');
		if (data.close === 'yes') config.content.button = true;
		if (data.behavior === 'click') {
			config.show = 'click';
			config.hide = 'click';
			$tt.on('click', function (e) {
				e.preventDefault();
				e.stopPropagation();
			});
			$(window).on('scroll resize', function () {
				$tt.qtip('reposition');
			});
		} else if (data.behavior === 'always') {
			config.show = true;
			config.hide = false;
			$(window).on('scroll resize', function () {
				$tt.qtip('reposition');
			});
		} else if (data.behavior === 'hover' && is_advanced) {
			config.hide = {
				fixed: true,
				delay: 600
			}
		}
		$tt.qtip(config);
	});

	// Expand
	$('.perch-expand').each(function () {
		var $this = $(this),
			$content = $this.children('.perch-expand-content'),
			$more = $this.children('.perch-expand-link-more'),
			$less = $this.children('.perch-expand-link-less'),
			data = $this.data(),
			col = 'perch-expand-collapsed';

		$more.on('click', function (e) {
			$content.css('max-height', 'none');
			$this.removeClass(col);
		});
		$less.on('click', function (e) {
			$content.css('max-height', data.height + 'px');
			$this.addClass(col);
		});
	});

	function is_transition_supported() {
		var thisBody = document.body || document.documentElement,
			thisStyle = thisBody.style,
			support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;

		return support;
	}

	// Animations is supported
	if (is_transition_supported()) {
		// Animate
		$('.perch-animate').each(function () {
			$(this).one('inview', function (e) {
				var $this = $(this),
					data = $this.data();
				window.setTimeout(function () {
					$this.addClass(data.animation);
					$this.addClass('animated');
					$this.css('visibility', 'visible');
				}, data.delay * 1000);
			});
		});
	}
	// Animations isn't supported
	else {
		$('.perch-animate').css('visibility', 'visible');
	}

	function tabs_height() {
		$('.perch-tabs-vertical').each(function () {
			var $tabs = $(this),
				$nav = $tabs.children('.perch-tabs-nav'),
				$panes = $tabs.find('.perch-tabs-pane'),
				height = 0;
			$panes.css('min-height', $nav.outerHeight(true));
		});
	}

	function anchor_nav() {
		// Check hash
		if (document.location.hash === '') return;
		// Go through tabs
		$('.perch-tabs-nav span[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $tabs = $(this).parents('.perch-tabs'),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				$(this).trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($tabs.offset().top - bar - 10);
				}, 100);
			}
		});
		// Go through spoilers
		$('.perch-spoiler[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $spoiler = $(this),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				if ($spoiler.hasClass('perch-spoiler-closed')) $spoiler.find('.perch-spoiler-title:first').trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($spoiler.offset().top - bar - 10);
				}, 100);
			}
		});
	}

	if ('onhashchange' in window) $(window).on('hashchange', anchor_nav);

	$('body').addClass('perch-other-shortcodes-loaded');
});