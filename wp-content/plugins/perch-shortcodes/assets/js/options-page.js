// Wait DOM
jQuery(document).ready(function($) {
	// ########## About screen ##########
	$('.perch-demo-video').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('perch-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('perch-mfp-shown');
			}
		}
	});
	// ########## Custom CSS screen ##########
	$('.perch-custom-css-originals a').magnificPopup({
		type: 'iframe',
		callbacks: {
			open: function() {
				// Change z-index
				$('body').addClass('perch-mfp-shown');
			},
			close: function() {
				// Change z-index
				$('body').removeClass('perch-mfp-shown');
			}
		}
	});
	// Enable ACE editor
	if ($('#perch-field-custom-css-editor').length > 0) {
		var editor = ace.edit('perch-field-custom-css-editor'),
			$textarea = $('#perch-field-custom-css').hide();
		editor.getSession().setValue($textarea.val());
		editor.getSession().on('change', function() {
			$textarea.val(editor.getSession().getValue());
		});
		editor.getSession().setMode('ace/mode/css');
		editor.setTheme('ace/theme/monokai');
		editor.getSession().setUseWrapMode(true);
		editor.getSession().setWrapLimitRange(null, null);
		editor.renderer.setShowPrintMargin(null);
		editor.session.setUseSoftTabs(null);
	}
	// ########## Add-ons screen ##########
	var addons_timer = 0;
	$('.perch-addons-item').each(function() {
		var $item = $(this),
			delay = 300;
		$item.click(function(e) {
			window.open($(this).data('url'));
			e.preventDefault();
		});
		addons_timer = addons_timer + delay;
		window.setTimeout(function() {
			$item.addClass('animated bounceIn').css('visibility', 'visible');
		}, addons_timer);
	});
	// ########## Examples screen ##########
	// Disable all buttons
	$('#perch-examples-preview').on('click', '.perch-button', function(e) {
		if ($(this).hasClass('perch-example-button-clicked')) alert(perch_options_page.not_clickable);
		else $(this).addClass('perch-example-button-clicked');
		e.preventDefault();
	});
	var open = $('#perch_open_example').val(),
		nonce = $('#perch_examples_nonce').val(),
		$example_window = $('#perch-examples-window'),
		$example_preview = $('#perch-examples-preview');
	$('.perch-examples-group-title, .perch-examples-item').each(function() {
		var $item = $(this),
			delay = 200;
		if ($item.hasClass('perch-examples-item')) {
			$item.on('click', function(e) {
				var code = $(this).data('code'),
					id = $(this).data('id');
				$item.magnificPopup({
					type: 'inline',
					alignTop: true,
					callbacks: {
						open: function() {
							// Change z-index
							$('body').addClass('perch-mfp-shown');
						},
						close: function() {
							// Change z-index
							$('body').removeClass('perch-mfp-shown');
							$example_preview.html('');
						}
					}
				});
				var perch_example_preview = $.ajax({
					url: ajaxurl,
					type: 'get',
					dataType: 'html',
					data: {
						action: 'perch_example_preview',
						code: code,
						id: id,
						nonce: nonce
					},
					beforeSend: function() {
						if (typeof perch_example_preview === 'object') perch_example_preview.abort();
						$example_window.addClass('perch-ajax');
						$item.magnificPopup('open');
					},
					success: function(data) {
						$example_preview.html(data);
						$example_window.removeClass('perch-ajax');
					}
				});
				e.preventDefault();
			});
			// Open preselected example
			if ($item.data('id') === open) $item.trigger('click');
		}
	});
	$('#perch-examples-window').on('click', '.perch-examples-get-code', function(e) {
		$(this).hide();
		$(this).parent('.perch-examples-code').children('textarea').slideDown(300);
		e.preventDefault();
	});
	// ########## Cheatsheet screen ##########
	$('.perch-cheatsheet-switch').on('click', function(e) {
		$('body').toggleClass('perch-print-cheatsheet');
		e.preventDefault();
	});
});