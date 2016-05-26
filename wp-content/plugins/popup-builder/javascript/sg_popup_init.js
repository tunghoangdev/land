function SgPopupInit(popupData) {
	this.popupData = popupData;
	this.shortcodeInPopupContent();
}

SgPopupInit.prototype.shortcodeInPopupContent = function() {

	jQuery(".sg-show-popup").bind('click',function() {
		var sgPopupID = jQuery(this).attr("data-sgpopupid");
		var sgInsidePopup = jQuery(this).attr("insidepopup");

		if(typeof sgInsidePopup == 'undefined' || sgInsidePopup != 'on') {
			return false;
		}
		
		jQuery.sgcolorbox.close();
		
		jQuery('#sgcolorbox').bind("sgPopupClose", function() {
			if(sgPopupID == '') {
				return;
			}
			sgPoupFrontendObj = new SGPopup();
			sgPoupFrontendObj.showPopup(sgPopupID,false);
			sgPopupID = '';
		});
	});
}

SgPopupInit.prototype.overallInit = function() {
	jQuery('.sg-popup-close').bind('click', function() {
		jQuery.sgcolorbox.close();
	});

	//Facebook reInit
	if(jQuery('#sg-facebook-like').length && typeof FB !== 'undefined') {
		FB.XFBML.parse();
	}
}

SgPopupInit.prototype.initByPopupType = function() {
	var data = this.popupData;
	var popupObj = {};
	var popupType = data['type'];

	switch(popupType) {
		case 'countdown':
			var popupObj = new SGCountdown();
			popupObj.init();
			break;
		case 'contactForm':
			popupObj = new SgContactForm();
			popupObj.buildStyle();
			break;
		case 'social':
			popupObj = new SgSocialFront();
			popupObj.init();
			break;
		case 'subscription':
			popupObj = new SgSubscription();
			popupObj.init();
			break;
		case 'ageRestriction':
			popupObj = new SGAgeRestriction();
			popupObj.init();
			break;
	}

	return popupObj;
}