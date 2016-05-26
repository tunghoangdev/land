function SGPopup() {
	this.positionLeft = '';
	this.positionTop = '';
	this.positionBottom = '';
	this.positionRight = '';
	this.initialPositionTop = '';
	this.initialPositionLeft = '';
	this.isOnLoad = '';
	this.openOnce = '';
	this.numberLimit = '';
	this.popupData = new Array();
	this.popupEscKey = true;
	this.popupOverlayClose = true;
	this.popupContentClick = false;
	this.popupCloseButton = true;
	this.sgTrapFocus = true;
}

SGPopup.prototype.init = function() {
	var that = this;

	this.onCompleate();
	jQuery(".sg-show-popup").bind('click',function() {
		var sgPopupID = jQuery(this).attr("data-sgpopupid");
		that.showPopup(sgPopupID,false);
	});
}

SGPopup.prototype.onCompleate = function() {

	jQuery("#sgcolorbox").bind("sgColorboxOnCompleate", function() {

		/* Scroll only inside popup */
		jQuery('#sgcboxLoadedContent').isolatedScroll();
	});
	this.isolatedScroll();
}

SGPopup.prototype.isolatedScroll = function() {

	jQuery.fn.isolatedScroll = function() {
		this.bind('mousewheel DOMMouseScroll', function (e) {
			var delta = e.wheelDelta || (e.originalEvent && e.originalEvent.wheelDelta) || -e.detail,
				bottomOverflow = this.scrollTop + jQuery(this).outerHeight() - this.scrollHeight >= 0,
				topOverflow = this.scrollTop <= 0;

			if ((delta < 0 && bottomOverflow) || (delta > 0 && topOverflow)) {
				e.preventDefault();
			}
		});
		return this;
	};
}

SGPopup.prototype.varToBool = function(optionName) {
	returnValue = (optionName) ? true : false;
	return returnValue;
}

SGPopup.prototype.canOpenPopup = function(id, openOnce, isOnLoad) {
	if (!isOnLoad) {
		return true;
	}
	if(openOnce && typeof jQuery.cookie('sgPopupDetails') != 'undefined') {
		return this.canOpenOnce(id);
	}

	return true;
}

SGPopup.prototype.setFixedPosition = function(sgPositionLeft, sgPositionTop, sgPositionBottom, sgPositionRight, sgFixedPositionTop, sgFixedPositionLeft) {
	this.positionLeft = sgPositionLeft;
	this.positionTop = sgPositionTop;
	this.positionBottom = sgPositionBottom;
	this.positionRight = sgPositionRight;
	this.initialPositionTop = sgFixedPositionTop;
	this.initialPositionLeft = sgFixedPositionLeft;
}

SGPopup.prototype.percentToPx = function(percentDimention, screenDimension) {
	var dimension = parseInt(percentDimention)*screenDimension/100;
	return dimension;
}

SGPopup.prototype.getPositionPercent = function(needPercent, screenDimension, dimension) {
	var sgPosition = (((this.percentToPx(needPercent,screenDimension)-dimension/2)/screenDimension)*100)+"%";
	return sgPosition;
}

SGPopup.prototype.showPopup = function(id, isOnLoad) {
	var that = this;

	this.popupData = SG_POPUP_DATA[id];
	this.isOnLoad = isOnLoad;
	this.openOnce = this.varToBool(this.popupData['repeatPopup']);
	this.numberLimit = this.popupData['popup-appear-number-limit'];

	if(typeof that.removeCookie !== 'undefined') {
		that.removeCookie(this.openOnce);
	}

	if (!this.canOpenPopup(this.popupData['id'], this.openOnce, isOnLoad)) {
		return;
	}

	popupColorboxUrl = SG_APP_POPUP_URL+'/style/sgcolorbox/'+this.popupData['theme'];
	jQuery('[id=sg_colorbox_theme-css]').remove();
	head = document.getElementsByTagName('head')[0];
	link = document.createElement('link')
	link.type = "text/css";
	link.id = "sg_colorbox_theme-css";
	link.rel = "stylesheet"
	link.href = popupColorboxUrl;
	document.getElementsByTagName('head')[0].appendChild(link);
	var img = document.createElement('img');
	sgAddEvent(img, "error", function() {
		that.sgShowColorboxWithOptions();
	});
	setTimeout(function(){img.src = popupColorboxUrl;},0);
}

SGPopup.prototype.sgShowColorboxWithOptions = function() {
	var that = this;
	setTimeout(function() {

		sgPopupFixed = that.varToBool(that.popupData['popupFixed']);
		that.popupOverlayClose = that.varToBool(that.popupData['overlayClose']);
		that.popupContentClick = that.varToBool(that.popupData['contentClick']);
		var popupReposition = that.varToBool(that.popupData['reposition']);
		var popupScrolling = that.varToBool(that.popupData['scrolling']);
		that.popupEscKey = that.varToBool(that.popupData['escKey']);
		that.popupCloseButton = that.varToBool(that.popupData['closeButton']);
		var countryStatus = that.varToBool(that.popupData['countryStatus']);
		var popupForMobile = that.varToBool(that.popupData['forMobile']);
		var onlyMobile = that.varToBool(that.popupData['openMobile']);
		var popupCantClose = that.varToBool(that.popupData['disablePopup']);
		var disablePopupOverlay = that.varToBool(that.popupData['disablePopupOverlay']);
		var popupAutoClosePopup = that.varToBool(that.popupData['autoClosePopup']);
		popupClosingTimer = that.popupData['popupClosingTimer'];

		if (popupCantClose) {
			that.cantPopupClose();
		}
		var popupPosition = that.popupData['fixedPostion'];
		var popupHtml = (that.popupData['html'] == '') ? '&nbsp;' : that.popupData['html'];
		var popupImage = that.popupData['image'];
		var popupIframeUrl = that.popupData['iframe'];
		var popupShortCode = that.popupData['shortcode'];
		var popupVideo = that.popupData['video'];
		var popupOverlayColor = that.popupData['sgOverlayColor'];
		var contentBackgroundColor = that.popupData['sg-content-background-color'];
		var popupWidth = that.popupData['width'];
		var popupHeight = that.popupData['height'];
		var popupOpacity = that.popupData['opacity'];
		var popupMaxWidth = that.popupData['maxWidth'];
		var popupMaxHeight = that.popupData['maxHeight'];
		var popupInitialWidth = that.popupData['initialWidth'];
		var popupInitialHeight = that.popupData['initialHeight'];
		var popupEffectDuration = that.popupData['duration'];
		var popupEffect = that.popupData['effect'];
		var contentClickBehavior = that.popupData['content-click-behavior'];
		var clickRedirectToUrl = that.popupData['click-redirect-to-url'];
		var pushToBottom = that.popupData['pushToBottom'];
		var onceExpiresTime = parseInt(that.popupData['onceExpiresTime']);
		var sgType = that.popupData['type'];
		var overlayCustomClass = that.popupData['sgOverlayCustomClasss'];
		var contentCustomClass = that.popupData['sgContentCustomClasss'];
		var popupTheme = that.popupData['theme'];
		var themeStringLength = popupTheme.length;
		var customClassName = popupTheme.substring(0, themeStringLength-4);
		var closeButtonText = that.popupData['theme-close-text'];

		popupHtml = (popupHtml) ? popupHtml : false;
		var popupIframe = (popupIframeUrl) ? true: false;
		popupVideo = (popupVideo) ? popupVideo : false;
		popupImage = (popupImage) ? popupImage : false;
		var popupPhoto = (popupImage) ? true : false;
		popupShortCode = (popupShortCode) ? popupShortCode : false;
		if (popupShortCode && popupHtml == false) {
			popupHtml = popupShortCode;
		}

		if(popupHtml && popupWidth == '' &&  popupHeight == '' && popupMaxWidth =='' && popupMaxHeight == '') {

			jQuery(popupHtml).find('img:first').attr('onload', 'jQuery.sgcolorbox.resize();');
		}
		if (popupIframeUrl) {
			popupImage = popupIframeUrl;
		}
		if (popupVideo) {
			if (popupWidth == '') {
				popupWidth = '50%';
			}
			if (popupHeight == '') {
				popupHeight = '50%';
			}
			popupIframe = true;
			popupImage = popupVideo;
		}
		var sgScreenWidth = jQuery(window).width();
		var sgScreenHeight = jQuery(window).height();

		var sgIsWidthInPercent = popupWidth.indexOf("%");
		var sgIsHeightInPercent = popupHeight.indexOf("%");
		var sgPopupHeightPx = popupHeight;
		var sgPopupWidthPx = popupWidth;
		if (sgIsWidthInPercent != -1) {
			sgPopupWidthPx = that.percentToPx(popupWidth, sgScreenWidth);
		}
		if (sgIsHeightInPercent != -1) {
			sgPopupHeightPx = that.percentToPx(popupHeight, sgScreenHeight);
		}
		popupPositionTop = that.getPositionPercent("50%", sgScreenHeight, sgPopupHeightPx);
		popupPositionLeft = that.getPositionPercent("50%", sgScreenWidth, sgPopupWidthPx);

		if(popupPosition == 1) { // Left Top
			that.setFixedPosition('0%','3%', false, false, 0, 0);
		}
		else if(popupPosition == 2) { // Left Top
			that.setFixedPosition(popupPositionLeft,'3%', false, false, 0, 50);
		}
		else if(popupPosition == 3) { //Right Top
			that.setFixedPosition(false,'3%', false, '0%', 0, 90);
		}
		else if(popupPosition == 4) { // Left Center
			that.setFixedPosition('0%', popupPositionTop, false, false, popupPositionTop, 0);
		}
		else if(popupPosition == 5) { // center Center
			sgPopupFixed = true;
			that.setFixedPosition(false, false, false, false, 50, 50);
		}
		else if(popupPosition == 6) { // Right Center
			that.setFixedPosition('0%', popupPositionTop, false,'0%', 50, 90);
		}
		else if(popupPosition == 7) { // Left Bottom
			that.setFixedPosition('0%', false, '0%', false, 90, 0);
		}
		else if(popupPosition == 8) { // Center Bottom
			that.setFixedPosition(popupPositionLeft, false, '0%', false, 90, 50);
		}
		else if(popupPosition == 9) { // Right Bottom
			that.setFixedPosition(false, false, '0%', '0%', 90, 90);
		}
		if(!sgPopupFixed) {
			that.setFixedPosition(false, false, false, false, 50, 50);
		}

		var userDevice = false;
		if (popupForMobile) {
			userDevice = that.forMobile();
		}

		if (popupAutoClosePopup) {
			setTimeout(that.autoClosePopup, popupClosingTimer*1000);
		}

		if(disablePopupOverlay) {
			that.sgTrapFocus = false;
			that.disablePopupOverlay();
		}

		if(onlyMobile) {
			openOnlyMobile = false;
			openOnlyMobile = that.forMobile();
			if(openOnlyMobile == false) {
				return;
			}
		}

		if (userDevice) {
			return;
		}

		SG_POPUP_SETTINGS = {
			width: popupWidth,
			height: popupHeight,
			className: customClassName,
			close: closeButtonText,
			overlayCutsomClassName: overlayCustomClass,
			contentCustomClassName: contentCustomClass,
			onOpen:function() {
				jQuery('#sgcolorbox').removeAttr('style');
				jQuery('#sgcolorbox').removeAttr('left');
				jQuery('#sgcolorbox').css('top',''+that.initialPositionTop+'%');
				jQuery('#sgcolorbox').css('left',''+that.initialPositionLeft+'%');
				jQuery('#sgcolorbox').css('animation-duration', popupEffectDuration+"s");
				jQuery('#sgcolorbox').css('-webkit-animation-duration', popupEffectDuration+"s");
				jQuery("#sgcolorbox").addClass('sg-animated '+popupEffect+'');
				jQuery("#sgcboxOverlay").addClass("sgcboxOverlayBg");
				jQuery("#sgcboxOverlay").removeAttr('style');

				if (popupOverlayColor) {
					jQuery("#sgcboxOverlay").css({'background' : 'none', 'background-color' : popupOverlayColor});
				}

				jQuery('#sgcolorbox').trigger("sgColorboxOnOpen", []);
			},
			onLoad: function(){
			},
			onComplete: function(){
				if(contentBackgroundColor) {
					jQuery("#sgcboxLoadedContent").css({'background-color' : contentBackgroundColor})
				}
				jQuery('#sgcolorbox').trigger("sgColorboxOnCompleate", [pushToBottom]);
				if(popupWidth == '' && popupHeight == '') {
					jQuery.sgcolorbox.resize();
				}

				var sgpopupInit = new SgPopupInit(that.popupData);
				sgpopupInit.overallInit();
				/* For specific popup Like Countdown AgeRestcion popups */
				sgpopupInit.initByPopupType();

			},
			onClosed: function() {
				jQuery('#sgcolorbox').trigger("sgPopupClose", []);
			},
			trapFocus: that.sgTrapFocus,
			html: popupHtml,
			photo: popupPhoto,
			iframe: popupIframe,
			href: popupImage,
			opacity: popupOpacity,
			escKey: that.popupEscKey,
			closeButton: that.popupCloseButton,
			fixed: sgPopupFixed,
			top: that.positionTop,
			bottom: that.positionBottom,
			left: that.positionLeft,
			right: that.positionRight,
			scrolling: popupScrolling,
			reposition: popupReposition,
			overlayClose: that.popupOverlayClose,
			maxWidth: popupMaxWidth,
			maxHeight: popupMaxHeight,
			initialWidth: popupInitialWidth,
			initialHeight: popupInitialHeight
		};

		jQuery.sgcolorbox(SG_POPUP_SETTINGS);


		if(countryStatus == true && typeof SgUserData != "undefined") {
			jQuery.cookie("SG_POPUP_USER_COUNTRY_NAME", SgUserData.countryIsoName, { expires: 365});
		}
		if (that.popupData['id'] && that.isOnLoad==true && that.openOnce != '') {
			sgCookieData = '';
			jQuery.cookie.defaults = {path:'/'};
			var currentCookie = jQuery.cookie('sgPopupDetails');

			if(typeof currentCookie == 'undefined') {
				openCounter = 1;
			}
			else {
				var currentCookie = JSON.parse(jQuery.cookie('sgPopupDetails'));
				openCounter = currentCookie.openCounter+=1;
			}
			sgCookieData = {
				'popupId': that.popupData['id'],
				'openCounter': openCounter,
				'openLimit': that.numberLimit
			}
			jQuery.cookie("sgPopupDetails",JSON.stringify(sgCookieData), { expires: onceExpiresTime});
		}

		if (that.popupContentClick) {

			/* If has url for redirect */
			if((contentClickBehavior !== 'close' || clickRedirectToUrl !== '') && typeof contentClickBehavior !== 'undefined') {
				jQuery('#sgcolorbox').css({
					"cursor": 'pointer'
				});
			}
			jQuery('#sgcolorbox').bind('click',function() {
				if(contentClickBehavior == 'close' || clickRedirectToUrl == '' || typeof contentClickBehavior == 'undefined') {
					jQuery.sgcolorbox.close();
				}
				else {
					window.location = clickRedirectToUrl;
				}

			});
		}

		jQuery('#sgcolorbox').bind('sgPopupClose', function(e) {
			jQuery('#sgcolorbox').removeClass(customClassName); /* Remove custom class for another popup */
			jQuery('#sgcboxOverlay').removeClass(customClassName);
			jQuery('#sgcolorbox').removeClass(popupEffect); /* Remove animated effect for another popup */
		});

	},this.popupData['delay']*1000);
}

jQuery(document).ready(function($) {
	var popupObj = new SGPopup();
	popupObj.init();
});
