jQuery(document).ready(function() {
	jQuery('#sgcolorbox').bind("sgColorboxOnCompleate", function() {

			if(jQuery('div.wpcf7 > form').length) { /* Contact form 7 */
				jQuery('div.wpcf7 > form').wpcf7InitForm();
			}

			if(jQuery('.myStat').length) { /* Percent to Infograph */
				jQuery('.myStat').circliful();
			}

			if(jQuery("form[name ^= 'form']").length > 0) { /* for Form Maker plugin */
				formMakerId = jQuery("form[name ^= 'form']").attr('name').match(/\d/g);
				if(jQuery(".captcha_refresh").length > 0) {
					jQuery(".captcha_refresh").bind('click', function() {
						captcha_refresh("wd_captcha", formMakerId);
					});
					captcha_refresh("wd_captcha", formMakerId);
				}
			}

			if(typeof wpcr3 != "undefined") { /* WP Customer Reviews */
				wpcr3.init();
			}

			if(jQuery('.pdfemb-viewer').length != 0) { /* PDF Embedder pluguin */
				PDFJS.workerSrc = pdfemb_trans.worker_src;
				PDFJS.cMapUrl = pdfemb_trans.cmap_url;
				PDFJS.cMapPacked = true;
				jQuery('.pdfemb-viewer').pdfEmbedder();
			}
			
	});
});
