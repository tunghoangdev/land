<?php

function sgPopupDelete()
{
	$id = (int)@$_POST['popup_id'];
	if (!$id) {
		return;
	}
	require_once(SG_APP_POPUP_CLASSES.'/SGPopup.php');
	SGPopup::delete($id);
	SGPopup::removePopupFromPages($id);
}

add_action('wp_ajax_delete_popup', 'sgPopupDelete');

function sgFrontend()
{
	global $wpdb;
	parse_str($_POST['subsribers'], $subsribers);
	$email = $subsribers['subs-email-name'];
	$firstName = $subsribers['subs-first-name'];
	$lastName = $subsribers['subs-last-name'];
	$title = $subsribers['subs-popup-title'];

	$query = $wpdb->prepare("SELECT id FROM ". $wpdb->prefix ."sg_subscribers WHERE email = %s AND subscriptionType = %s", $email, $title);
	$list = $wpdb->get_row($query, ARRAY_A);
	if(!isset($list['id'])) {
		$sql = $wpdb->prepare("INSERT INTO ".$wpdb->prefix."sg_subscribers (firstName, lastName, email, subscriptionType) VALUES (%s, %s, %s, %s)", $firstName, $lastName, $email, $title);
		$res = $wpdb->query($sql);
	}
	die();
}

add_action('wp_ajax_nopriv_subs_send_mail', 'sgFrontend');
add_action('wp_ajax_subs_send_mail', 'sgFrontend');

function sgContactForm()
{
	global $wpdb;
	parse_str($_POST['contactParams'], $params);
	$adminMail = sanitize_text_field($_POST['receiveMail']);
	$name = $params['contact-name'];
	$subject = $params['contact-subject'];
	$userMessage = $params['content-message'];
	$mail = $params['contact-email'];

	$message = '';
	$message .= '<b>Name</b>: '.$name."<br>";
	$message .= '<b>E-mail</b>: '.$mail."<br>";
	$message .= '<b>Subject</b>: '.$subject."<br>";
	$message .= '<b>Message</b>: '.$userMessage."<br>";
	$headers  = 'MIME-Version: 1.0'."\r\n";
	$headers  = 'From: '.$adminMail.''."\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8'."\r\n"; //set UTF-8
	
	$sendStatus = wp_mail($adminMail, 'Popup contact form', $message, $headers); //return true or false
	echo $sendStatus;
	die();
}

add_action('wp_ajax_nopriv_contact_send_mail', 'sgContactForm');
add_action('wp_ajax_contact_send_mail', 'sgContactForm');

function sgImportPopups(){
	global $wpdb;
	$url = $_POST['attachmentUrl'];

	$contents = unserialize(file_get_contents($url));

	foreach ($contents as $content) {
		//Main popup table data
		$popupData = $content['mainPopupData'];
		$popupType = $popupData['type'];
		$popupTitle = $popupData['title'];
		$popupOptions = $popupData['options'];

		//Insert popup
		$sql = $wpdb->prepare("INSERT INTO ".$wpdb->prefix.PopupInstaller::$maintablename."(type, title, options) VALUES (%s, %s, %s)", $popupType, $popupTitle, $popupOptions);
		$res = $wpdb->query($sql);
		//Get last insert popup id
		$lastInsertId = $wpdb->insert_id;

		//Child popup data
		$childPopupTableName = $content['childTableName']; // change it Tbale to Table
		$childPopupData = $content['childData']; //change it child

		//Foreach throw child popups
		foreach ($childPopupData as $childPopup) {
			//Child popup table columns
			$columns = implode(array_keys($childPopup), ', ');
			$values = "'".implode(array_values($childPopup), "','")."'";
			$queryValues = str_repeat("'%s', ", count(array_keys($childPopup)));
			$queryValues = rtrim($queryValues, ', ');
			$queryStr = 'INSERT INTO '.$wpdb->prefix.$childPopupTableName.'(id, '.$columns.') VALUES ('.$lastInsertId.', '.$values.')';
			$sql = $wpdb->prepare($queryStr, $values);
			$resa = $wpdb->query($sql);
			echo 'ChildRes: '.$resa;
		}
		echo 'MainRes: '.$res;
	}
}

add_action('wp_ajax_import_popups', 'sgImportPopups');

function sgCloseReviewPanel() {
    update_option('SG_COLOSE_REVIEW_BLOCK', true);
}
add_action('wp_ajax_close_review_panel', 'sgCloseReviewPanel');

function sgLazyLoading() {

	$popupId = (int)$_POST['popupId'];
	$params = "";
	$postType = $_POST['postType'];
	$loadingNumber = (int)$_POST['loadingNumber'];

	/* Whem load first time need add Home page in Wp pages */
	if($loadingNumber == 0) {
		$defArray = array(-1=>"Home page");
	}
	else {
		$defArray = array();
	}

	if($postType == SG_POST_TYPE_PAGE) {
		$pageData = SgPopupPro::getAllData($defArray, 'page', $loadingNumber);
	}
	if($postType == SG_POST_TYPE_POST) {
		$pageData = SgPopupPro::getAllData($defArray, 'post', $loadingNumber);
	}
	
	if($loadingNumber > 0 && sizeof($pageData) == 0) {
		die();
	}

	/* When popup is insert */
	if($popupId != -1) {
		$popup = SGPopup::findById($popupId);
		$options = $popup->getOptions();
		$options = json_decode($options, true);

		if($postType == SG_POST_TYPE_PAGE) {
			$allSelectedPages = $options['allSelectedPages'];
		}
		else if($postType == SG_POST_TYPE_POST) {
			$allSelectedPages = $options['allSelectedPosts'];
		}
	}
	
	foreach ($pageData as $key => $value) {
		/* When have seleced pages data */
		if($popupId != -1) {
			$selected = "";
			if(isset($allSelectedPages) && @in_array($key, $allSelectedPages)) {
				$selected = "selected";
			}
		}
		else {
			$selected = "";
		}
		
		$params .= "<option value='".$key."' $selected>$value</option>";
	}
	echo $params;
	die();
}
add_action('wp_ajax_lazy_loading', 'sgLazyLoading');
