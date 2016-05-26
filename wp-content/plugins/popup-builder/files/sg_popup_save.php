<?php
add_action('admin_post_save_popup', 'sgPopupSave');

function sgSanitize($optionsKey)
{
	if (isset($_POST[$optionsKey])) {
		if ($optionsKey == "sg_popup_html"||
			$optionsKey == "sg_ageRestriction"||
			$optionsKey == "sg_countdown"||
			$optionsKey == "sg_social" ||
			$optionsKey == "sg-exit-intent" ||
			$optionsKey == "sg_popup_fblike" ||
			$optionsKey == "sg_subscription" ||
			$optionsKey == "sg_contactForm" ||
			$optionsKey == "all-selected-page" ||
			$optionsKey == "all-selected-posts"
			) {
			if(POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
				$sgPopupData = $_POST[$optionsKey];
				require_once(SG_APP_POPUP_FILES ."/sg_popup_pro.php");
				return SgPopupPro::sgPopupDataSanitize($sgPopupData);
			}
			return wp_kses_post($_POST[$optionsKey]);
		}
		return sanitize_text_field($_POST[$optionsKey]);
	}
	else {
		return "";
	}
}

function sgPopupSave()
{
	global $wpdb;
	$socialButtons = array();
	$socialOptions = array();
	$countdownOptions = array();
	$fblikeOptions = array();
	$subscriptionOptions = array();
	$options = array();
	$contactFormOptions = array();
	$showAllPages = sgSanitize('allPages');
	$showAllPosts = sgSanitize('allPosts');
	$allSelectedPages = "";
	$allSelectedPosts = "";

	/* if popup check for all pages it is not needed for save all pages all posts */
	if($showAllPages !== "all") {
		$allSelectedPages = explode(",", sgSanitize('all-selected-page'));
	}
	
	if($showAllPosts !== "all") {
		$allSelectedPosts = explode(",", sgSanitize('all-selected-posts'));
	}

	$socialOptions = array(
		'sgSocialTheme' => sgSanitize('sgSocialTheme'),
		'sgSocialButtonsSize' => sgSanitize('sgSocialButtonsSize'),
		'sgSocialLabel' => sgSanitize('sgSocialLabel'),
		'sgSocialShareCount' => sgSanitize('sgSocialShareCount'),
		'sgRoundButton' => sgSanitize('sgRoundButton'),
		'fbShareLabel' => sgSanitize('fbShareLabel'),
		'lindkinLabel' => sgSanitize('lindkinLabel'),
		'sgShareUrl' => sgSanitize('sgShareUrl'),
		'shareUrlType' => sgSanitize('shareUrlType'),
		'googLelabel' => sgSanitize('googLelabel'),
		'twitterLabel' => sgSanitize('twitterLabel'),
		'pinterestLabel' => sgSanitize('pinterestLabel'),
		'sgMailSubject' => sgSanitize('sgMailSubject'),
		'sgMailLable' => sgSanitize('sgMailLable')
	);

	$socialButtons = array(
		'sgTwitterStatus' => sgSanitize('sgTwitterStatus'),
		'sgFbStatus' => sgSanitize('sgFbStatus'),
		'sgEmailStatus' => sgSanitize('sgEmailStatus'),
		'sgLinkedinStatus' => sgSanitize('sgLinkedinStatus'),
		'sgGoogleStatus' => sgSanitize('sgGoogleStatus'),
		'sgPinterestStatus' => sgSanitize('sgPinterestStatus'),
		'pushToBottom' => sgSanitize('pushToBottom')
	);

	$countdownOptions = array(
		'pushToBottom' => sgSanitize('pushToBottom'),
		'countdownNumbersBgColor' => sgSanitize('countdownNumbersBgColor'),
		'countdownNumbersTextColor' => sgSanitize('countdownNumbersTextColor'),
		'sg-due-date' => sgSanitize('sg-due-date'),
		'countdown-position' => sgSanitize('countdown-position'),
		'counts-language'=> sgSanitize('counts-language'),
		'sg-time-zone' => sgSanitize('sg-time-zone'),
		'sg-countdown-type' => sgSanitize('sg-countdown-type'),
	);

	$videoOptions = array(
		'video-autoplay' => sgSanitize('video-autoplay')
	);

	$exitIntentOptions = array(
		'exit-intent-type' => sgSanitize('exit-intent-type'),
		'exit-intent-expire-time' => sgSanitize('exit-intent-expire-time'),
		'exit-intent-alert' => sgSanitize('exit-intent-alert')
	);

	$subscriptionOptions = array(
		'subs-first-name-status' => sgSanitize('subs-first-name-status'),
		'subs-last-name-status' => sgSanitize('subs-last-name-status'),
		'subscription-email' => sgSanitize('subscription-email'),
		'subs-first-name' => sgSanitize('subs-first-name'),
		'subs-last-name' => sgSanitize('subs-last-name'),
		'subs-text-width' => sgSanitize('subs-text-width'),
		'subs-button-bgcolor' => sgSanitize('subs-button-bgcolor'),
		'subs-btn-width' => sgSanitize('subs-btn-width'),
		'subs-btn-title' => sgSanitize('subs-btn-title'),
		'subs-text-input-bgcolor' => sgSanitize('subs-text-input-bgcolor'),
		'subs-text-bordercolor' => sgSanitize('subs-text-bordercolor'),
		'subs-button-color' => sgSanitize('subs-button-color'),
		'subs-inputs-color' => sgSanitize('subs-inputs-color'),
		'subs-btn-height' => sgSanitize('subs-btn-height'),
		'subs-text-height' => sgSanitize('subs-text-height'),
		'subs-placeholder-color' => sgSanitize('subs-placeholder-color'),
		'subs-validation-message' => sgSanitize('subs-validation-message'),
		'subs-success-message' => sgSanitize('subs-success-message'),
		'subs-btn-progress-title' => sgSanitize('subs-btn-progress-title'),
		'subs-text-border-width' => sgSanitize('subs-text-border-width'),
	);

	$contactFormOptions = array(
		'contact-name' => sgSanitize('contact-name'),
		'contact-subject' => sgSanitize('contact-subject'),
		'contact-email' => sgSanitize('contact-email'),
		'contact-message' => sgSanitize('contact-message'),
		'contact-validation-message' => sgSanitize('contact-validation-message'),
		'contact-success-message' => sgSanitize('contact-success-message'),
		'contact-inputs-width' => sgSanitize('contact-inputs-width'),
		'contact-inputs-height' => sgSanitize('contact-inputs-height'),
		'contact-inputs-border-width' => sgSanitize('contact-inputs-border-width'),
		'contact-text-input-bgcolor' => sgSanitize('contact-text-input-bgcolor'),
		'contact-text-bordercolor' => sgSanitize('contact-text-bordercolor'),
		'contact-inputs-color' => sgSanitize('contact-inputs-color'),
		'contact-placeholder-color' => sgSanitize('contact-placeholder-color'),
		'contact-btn-width' => sgSanitize('contact-btn-width'),
		'contact-btn-height' => sgSanitize('contact-btn-height'),
		'contact-btn-title' => sgSanitize('contact-btn-title'),
		'contact-btn-progress-title' => sgSanitize('contact-btn-progress-title'),
		'contact-button-bgcolor' => sgSanitize('contact-button-bgcolor'),
		'contact-button-color' => sgSanitize('contact-button-color'),
		'contact-area-width' => sgSanitize('contact-area-width'),
		'contact-area-height' => sgSanitize('contact-area-height'),
		'sg-contact-resize' => sgSanitize('sg-contact-resize'),
		'contact-validate-email' => sgSanitize('contact-validate-email'),
		'contact-receive-email' => sgSanitize('contact-receive-email'),
		'contact-fail-message' => sgSanitize('contact-fail-message')
	);

	$fblikeOptions = array(
		'fblike-like-url' => sgSanitize('fblike-like-url'),
		'fblike-layout' => sgSanitize('fblike-layout')
	);

	$options = array(
		'width' => sgSanitize('width'),
		'height' => sgSanitize('height'),
		'delay' => (int)sgSanitize('delay'),
		'duration' => (int)sgSanitize('duration'),
		'effect' => sgSanitize('effect'),
		'escKey' => sgSanitize('escKey'),
		'scrolling' => sgSanitize('scrolling'),
		'reposition' => sgSanitize('reposition'),
		'overlayClose' => sgSanitize('overlayClose'),
		'contentClick' => sgSanitize('contentClick'),
		'content-click-behavior' => sgSanitize('content-click-behavior'),
		'click-redirect-to-url' => sgSanitize('click-redirect-to-url'),
		'opacity' => sgSanitize('opacity'),
		'sgOverlayColor' => sgSanitize('sgOverlayColor'),
		'sg-content-background-color' => sgSanitize('sg-content-background-color'),
		'popupFixed' => sgSanitize('popupFixed'),
		'fixedPostion' => sgSanitize('fixedPostion'),
		'maxWidth' => sgSanitize('maxWidth'),
		'maxHeight' => sgSanitize('maxHeight'),
		'initialWidth' => sgSanitize('initialWidth'),
		'initialHeight' => sgSanitize('initialHeight'),
		'closeButton' => sgSanitize('closeButton'),
		'theme' => sgSanitize('theme'),
		'onScrolling' => sgSanitize('onScrolling'),
		'beforeScrolingPrsent' => (int)sgSanitize('beforeScrolingPrsent'),
		'forMobile' => sgSanitize('forMobile'),
		'openMobile' => sgSanitize('openMobile'), // open only for mobile
		'repeatPopup' => sgSanitize('repeatPopup'),
		'popup-appear-number-limit' => sgSanitize('popup-appear-number-limit'),
		'autoClosePopup' => sgSanitize('autoClosePopup'),
		'countryStatus' => sgSanitize('countryStatus'),
		'showAllPages' => $showAllPages,
		"allPagesStatus" => sgSanitize("allPagesStatus"),
		"allPostsStatus" => sgSanitize("allPostsStatus"),
		'allSelectedPages' => $allSelectedPages,
		'showAllPosts' => $showAllPosts,
		'allSelectedPosts' => $allSelectedPosts,
		'sg-user-status' => sgSanitize('sg-user-status'),
		'loggedin-user' => sgSanitize('loggedin-user'),
		'popup-timer-status' => sgSanitize('popup-timer-status'),
		'popup-start-timer' => sgSanitize('popup-start-timer'),
		'popup-finish-timer' => sgSanitize('popup-finish-timer'),
		'allowCountries' => sgSanitize('allowCountries'),
		'countryName' => sgSanitize('countryName'),
		'countryIso' => sgSanitize('countryIso'),
		'disablePopup' => sgSanitize('disablePopup'),
		'disablePopupOverlay' => sgSanitize('disablePopupOverlay'),
		'popupClosingTimer' => sgSanitize('popupClosingTimer'),
		'yesButtonLabel' => sgSanitize('yesButtonLabel'),
		'noButtonLabel' => sgSanitize('noButtonLabel'),
		'restrictionUrl' => sgSanitize('restrictionUrl'),
		'yesButtonBackgroundColor' => sgSanitize('yesButtonBackgroundColor'),
		'noButtonBackgroundColor' => sgSanitize('noButtonBackgroundColor'),
		'yesButtonTextColor' => sgSanitize('yesButtonTextColor'),
		'noButtonTextColor' => sgSanitize('noButtonTextColor'),
		'yesButtonRadius' => (int)sgSanitize('yesButtonRadius'),
		'noButtonRadius' => (int)sgSanitize('noButtonRadius'),
		'pushToBottom' => sgSanitize('pushToBottom'),
		'onceExpiresTime' => sgSanitize('onceExpiresTime'),
		'sgOverlayCustomClasss' => sgSanitize('sgOverlayCustomClasss'),
		'sgContentCustomClasss' => sgSanitize('sgContentCustomClasss'),
		'theme-close-text' => sgSanitize('theme-close-text'),
		'socialButtons' => json_encode($socialButtons),
		'socialOptions' => json_encode($socialOptions),
		'countdownOptions' => json_encode($countdownOptions),
		'exitIntentOptions' => json_encode($exitIntentOptions),
		'videoOptions' => json_encode($videoOptions),
		'fblikeOptions' => json_encode($fblikeOptions)
	);

	$html = stripslashes(sgSanitize("sg_popup_html"));
	$fblike = stripslashes(sgSanitize("sg_popup_fblike"));
	$ageRestriction = stripslashes(sgSanitize('sg_ageRestriction'));
	$social = stripslashes(sgSanitize('sg_social'));
	$image = sgSanitize('ad_image');
	$countdown = stripslashes(sgSanitize('sg_countdown'));
	$subscription = stripslashes(sgSanitize('sg_subscription'));
	$sgContactForm = stripslashes(sgSanitize('sg_contactForm'));
	$iframe = sgSanitize('iframe');
	$video = sgSanitize('video');
	$shortCode = stripslashes(sgSanitize('shortcode'));
	$exitIntent = stripslashes(sgSanitize('sg-exit-intent'));
	$type = sgSanitize('type');
	$title = stripslashes(sgSanitize('title'));
	$id = sgSanitize('hidden_popup_number');
	$jsonDataArray = json_encode($options);

	$data = array(
		'id' => $id,
		'title' => $title,
		'type' => $type,
		'image' => $image,
		'html' => $html,
		'fblike' => $fblike,
		'iframe' => $iframe,
		'video' => $video,
		'shortcode' => $shortCode,
		'ageRestriction' => $ageRestriction,
		'countdown' => $countdown,
		'exitIntent' => $exitIntent,
		'sg_subscription' => $subscription,
		'sg_contactForm' => $sgContactForm,
		'social' => $social,
		'options' => $jsonDataArray,
		'subscriptionOptions' => json_encode($subscriptionOptions),
		'contactFormOptions' => json_encode($contactFormOptions)
	);

	function setPopupForAllPages($id, $data) {
		SGPopup::addPopupForAllPages($id, $data);
	}

	function setOptionPopupType($id, $type) {
		update_option("SG_POPUP_".strtoupper($type)."_".$id,$id);
	}

	if (empty($title)) {
		wp_redirect(SG_APP_POPUP_ADMIN_URL."admin.php?page=edit-popup&type=$type&titleError=1");
		exit();
	}
	$popupName = "SG".ucfirst(strtolower($_POST['type']));
	$popupClassName = $popupName."Popup";
	
	require_once(SG_APP_POPUP_PATH ."/classes/".$popupClassName.".php");
	if ($id == "") {
		global $wpdb;
		call_user_func(array($popupClassName, 'create'), $data);
		$lastId = $wpdb->get_var("SELECT LAST_INSERT_ID() FROM ".  $wpdb->prefix."sg_popup");
		
		if(POPUP_BUILDER_PKG != POPUP_BUILDER_PKG_FREE) {
			SGPopup::removePopupFromPages($lastId);
			if($options['allPagesStatus']) {
				if(!empty($showAllPages) && $showAllPages != 'all') {
					update_option("SG_ALL_PAGES", false);
					setPopupForAllPages($lastId, $allSelectedPages);
				}
				else {
					update_option("SG_ALL_PAGES", $lastId);
				}
			}
			
			if($options['allPostsStatus']) {
				if(!empty($showAllPosts) && $showAllPosts != "all") {
					update_option("SG_ALL_POSTS", false);
					setPopupForAllPages($lastId, $allSelectedPosts);
				}
				else {
					update_option("SG_ALL_POSTS", $lastId);
				}
			}
			
		}
		
		setOptionPopupType($lastId, $type);
		wp_redirect(SG_APP_POPUP_ADMIN_URL."admin.php?page=edit-popup&id=".$lastId."&type=$type&saved=1");
		exit();
	}
	else {
		$popup = SGPopup::findById($id);
		$popup->setTitle($title);
		$popup->setId($id);
		$popup->setType($type);
		$popup->setOptions($jsonDataArray);

		switch ($popupName) {
			case 'SGImage':
				$popup->setUrl($image);
				break;
			case 'SGIframe':
				$popup->setUrl($iframe);
				break;
			case 'SGVideo':
				$popup->setUrl($video);
				$popup->setRealUrl($video);
				$popup->setVideoOptions(json_encode($videoOptions));
				break;
			case 'SGHtml':
				$popup->setContent($html);
				break;
			case 'SGFblike':
				$popup->setContent($fblike);
				$popup->setFblikeOptions(json_encode($fblikeOptions));
				break;
			case 'SGShortcode':
				$popup->setShortcode($shortCode);
				break;
			case 'SGAgerestriction':
				$popup->setContent($ageRestriction);
				$popup->setYesButton($options['yesButtonLabel']);
				$popup->setNoButton($options['noButtonLabel']);
				$popup->setRestrictionUrl($options['restrictionUrl']);
				break;
			case 'SGCountdown':
				$popup->setCountdownContent($countdown);
				$popup->setCountdownOptions(json_encode($countdownOptions));
				break;
			case 'SGSocial':
				$popup->setSocialContent($social);
				$popup->setButtons(json_encode($socialButtons));
				$popup->setSocialOptions(json_encode($socialOptions));
				break;
			case 'SGExitintent':
				$popup->setContent($exitIntent);
				$popup->setExitIntentOptions(json_encode($exitIntentOptions));
				break;
			case 'SGSubscription':
				$popup->setContent($subscription);
				$popup->setSubscriptionOptions(json_encode($subscriptionOptions));
				break;
			case 'SGContactform':
				$popup->setContent($sgContactForm);
				$popup->steParams(json_encode($contactFormOptions));
			break;
		}
		if(POPUP_BUILDER_PKG != POPUP_BUILDER_PKG_FREE) {
			SGPopup::removePopupFromPages($id);
			if(!empty($options['allPagesStatus'])) {
				if($showAllPages && $showAllPages != 'all') {
					update_option("SG_ALL_PAGES", false);
					setPopupForAllPages($id, $allSelectedPages);
				}
				else {
					update_option("SG_ALL_PAGES", $id);
				}
			}
			else if(get_option("SG_ALL_PAGES") == $id) {
				update_option("SG_ALL_PAGES", false);
			}

			if(!empty($options['allPostsStatus'])) {
				if(!empty($showAllPosts) && $showAllPosts != "all") {
					update_option("SG_ALL_POSTS", false);
					setPopupForAllPages($id, $allSelectedPosts);
				}
				else {
					update_option("SG_ALL_POSTS", $id);
				}
			}
			else if(get_option("SG_ALL_POSTS") == $id) {
				update_option("SG_ALL_PAGES", false);
			}
		}
	
		setOptionPopupType($id, $type);
		$popup->save();
		wp_redirect(SG_APP_POPUP_ADMIN_URL."admin.php?page=edit-popup&id=$id&type=$type&saved=1");
		exit();
	}
}
