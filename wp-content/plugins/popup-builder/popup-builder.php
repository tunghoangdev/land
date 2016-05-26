<?php
/**
* Plugin Name: Popup Builder
* Plugin URI: http://sygnoos.com
* Description: The most complete popup plugin. Html, image, iframe, shortcode, video and many other popup types. Manage popup dimensions, effects, themes and more.
* Version: 2.2.6
* Author: Sygnoos
* Author URI: http://www.sygnoos.com
* License: GPLv2
*/

require_once(dirname(__FILE__)."/config.php");

require_once(SG_APP_POPUP_CLASSES .'/SGPopup.php');
require_once(SG_APP_POPUP_FILES .'/sg_functions.php');

require_once(SG_APP_POPUP_CLASSES .'/PopupInstaller.php'); //cretae tables

if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
	require_once( SG_APP_POPUP_CLASSES .'/PopupProInstaller.php'); //uninstall tables
	require_once(SG_APP_POPUP_FILES ."/sg_popup_pro.php"); // Pro functions
}
require_once(SG_APP_POPUP_PATH .'/style/sg_popup_style.php' ); //include our css file
require_once(SG_APP_POPUP_JS .'/sg_popup_javascript.php' ); //include our js file
require_once(SG_APP_POPUP_FILES .'/sg_popup_page_selection.php' );  // include here in page  button for select popup every page

register_activation_hook(__FILE__, 'sgPopupActivate');
register_uninstall_hook(__FILE__, 'sgPopupDeactivate');

add_action('wpmu_new_blog', 'sgNewBlogPopup', 10, 6);

function sgNewBlogPopup()
{
	PopupInstaller::install();
	if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
		PopupProInstaller::install();
	}
}

function sgPopupActivate()
{
	update_option('SG_POPUP_VERSION', SG_POPUP_VERSION);
	PopupInstaller::install();
	if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
		PopupProInstaller::install();
	}
}

function sgPopupDeactivate()
{
	PopupInstaller::uninstall();
	if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
		PopupProInstaller::uninstall();
	}

}


add_action("admin_menu","sgAddMenu");
function sgAddMenu()
{
	add_menu_page("Popup Builder", "Popup Builder", "manage_options","PopupBuilder","sgPopupMenu","dashicons-welcome-widgets-menus");
	add_submenu_page("PopupBuilder", "All Popups", "All Popups", 'manage_options', "PopupBuilder", "sgPopupMenu");
	add_submenu_page("PopupBuilder", "Add New", "Add New", 'manage_options', "create-popup", "sgCreatePopup");
	add_submenu_page("PopupBuilder", "Edit Popup", "Edit Popup", 'manage_options', "edit-popup", "sgEditPopup");
	if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_SILVER) {
		add_submenu_page("PopupBuilder", "Subscribers", "Subscribers", 'manage_options', "subscribers", "sgSubscribers");
	}
}

function sgPopupMenu()
{
	require_once( SG_APP_POPUP_FILES . '/sg_popup_main.php');
}

function sgCreatePopup()
{
	require_once( SG_APP_POPUP_FILES . '/sg_popup_create.php'); // here is inculde file in the first sub menu
}

function sgEditPopup()
{
	require_once( SG_APP_POPUP_FILES . '/sg_popup_create_new.php');
}

function sgSubscribers()
{
	require_once( SG_APP_POPUP_FILES . '/sg_subscribers.php');
}

function sgRegisterScripts()
{
	SGPopup::$registeredScripts = true;
	wp_register_style('sg_animate', SG_APP_POPUP_URL . '/style/animate.css');
	wp_enqueue_style('sg_animate');
	wp_register_script('sg_popup_init', SG_APP_POPUP_URL . '/javascript/sg_popup_init.js', array('jquery'));
	wp_enqueue_script('sg_popup_init');
	wp_register_script('sg_popup_frontend', SG_APP_POPUP_URL . '/javascript/sg_popup_frontend.js', array('jquery'));
	wp_enqueue_script('sg_popup_frontend');
	wp_enqueue_script('jquery');
	wp_register_script('sg_colorbox', SG_APP_POPUP_URL . '/javascript/jquery.sgcolorbox-min.js', array('jquery'), '5.0');
	wp_enqueue_script('sg_colorbox');
	wp_register_script('sg_popup_support_plugins', SG_APP_POPUP_URL . '/javascript/sg_popup_support_plugins.js', array('jquery'));
	wp_enqueue_script('sg_popup_support_plugins');
	if (POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {
		wp_register_script('sgPopupPro', SG_APP_POPUP_URL . '/javascript/sg_popup_pro.js?ver=4.2.3');
		wp_enqueue_script('sgPopupPro');
		wp_register_script('sg_cookie', SG_APP_POPUP_URL . '/javascript/jquery_cookie.js', array('jquery'));
		wp_enqueue_script('sg_cookie');
		wp_register_script('sg_popup_queue', SG_APP_POPUP_URL . '/javascript/sg_popup_queue.js');
		wp_enqueue_script('sg_popup_queue');
	}
}

function sgRenderPopupScript($id)
{
	if (SGPopup::$registeredScripts==false) {
		sgRegisterScripts();
	}
	wp_register_style('sg_colorbox_theme', SG_APP_POPUP_URL . "/style/sgcolorbox/colorbox1.css");
	wp_register_style('sg_colorbox_theme2', SG_APP_POPUP_URL . "/style/sgcolorbox/colorbox2.css");
	wp_register_style('sg_colorbox_theme3', SG_APP_POPUP_URL . "/style/sgcolorbox/colorbox3.css");
	wp_register_style('sg_colorbox_theme4', SG_APP_POPUP_URL . "/style/sgcolorbox/colorbox4.css");
	wp_register_style('sg_colorbox_theme5', SG_APP_POPUP_URL . "/style/sgcolorbox/colorbox5.css", array(), '5.0');
	wp_enqueue_style('sg_colorbox_theme');
	wp_enqueue_style('sg_colorbox_theme2');
	wp_enqueue_style('sg_colorbox_theme3');
	wp_enqueue_style('sg_colorbox_theme4');
	wp_enqueue_style('sg_colorbox_theme5');
	sgFindPopupData($id);
}

function sgFindPopupData($id)
{
	$obj = SGPopup::findById($id);
	if (!empty($obj)) {
		$content = $obj->render();
	}

	if (POPUP_BUILDER_PKG == POPUP_BUILDER_PKG_PLATINUM) {
		$userCountryIso = SGFunctions::getUserLocationData($id);
		if(!is_bool($userCountryIso)) {
			echo "<script type='text/javascript'>SgUserData = {
				'countryIsoName': '$userCountryIso'
			}</script>";
		}
	}

	echo "<script type='text/javascript'>";
	echo $content;
	echo "</script>";
}

function sgShowShortCode($args, $content)
{
	ob_start();
	$obj = SGPopup::findById($args['id']);
	if (!$obj) {
		return $content;
	}
	if(!empty($content)) {
		sgRenderPopupScript($args['id']);
		$attr = '';

		if(isset($args['insidepopup'])) {
			$attr .= 'insidePopup="on"';
 		}
		echo "<a href='javascript:void(0)' class='sg-show-popup' data-sgpopupid=".$args['id']." $attr>".$content."</a>";
	}
	else {
		echo redenderScriptMode($args['id']);
	}
	$shortcodeContent = ob_get_contents();
	ob_end_clean();
	return $shortcodeContent;
}
add_shortCode('sg_popup', 'sgShowShortCode');

function sgRenderPopupOpen($popupId)
{
	sgRenderPopupScript($popupId);

	echo "<script type=\"text/javascript\">

			sgAddEvent(window, 'load',function() {
				sgOnScrolling = (SG_POPUP_DATA [$popupId]['onScrolling']) ? SG_POPUP_DATA [$popupId]['onScrolling']: ''; ;
				beforeScrolingPrsent = (SG_POPUP_DATA [$popupId]['onScrolling']) ?  SG_POPUP_DATA [$popupId]['beforeScrolingPrsent']: '';
				autoClosePopup = (SG_POPUP_DATA [$popupId]['autoClosePopup']) ?  SG_POPUP_DATA [$popupId]['autoClosePopup']: '';
				popupClosingTimer = (SG_POPUP_DATA [$popupId]['popupClosingTimer']) ?  SG_POPUP_DATA [$popupId]['popupClosingTimer']: '';
				sgPoupFrontendObj = new SGPopup();
				if(sgOnScrolling) {
					sgPoupFrontendObj.onScrolling($popupId);
				}
				else {

					sgPoupFrontendObj.showPopup($popupId,true);
				}
			});
		</script>";
}

function showPopupInPage($popupId) {


	if(POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE) {

		$isActivePopup = SgPopupPro::popupInTimeRange($popupId);

		if(!$isActivePopup) {
			return false;
		}

		$showUser = SgPopupPro::showUserResolution($popupId);
		if(!$showUser) return false;

		if(!SGPopup::showPopupForCounrty($popupId)) { /* Sended popupId and function return true or false */
			return;
		}
	}


	redenderScriptMode($popupId);
}

function redenderScriptMode($popupId)
{
	/* If user delete popup */
	$obj = SGPopup::findById($popupId);
	if(empty($obj)) {
		return;
	}
	$multiplePopup = get_option('SG_MULTIPLE_POPUP');
	$exitIntentPopupId = get_option('SG_POPUP_EXITINTENT_'.$popupId);

	if(isset($exitIntentPopupId) && $exitIntentPopupId == $popupId) {
		sgRenderPopupScript($popupId);
		require_once(SG_APP_POPUP_CLASSES.'/SGExitintentPopup.php');
		$exitObj = new SGExitintentPopup();
		echo $exitObj->getExitIntentInitScript($popupId);
		return;
	}
	if($multiplePopup && @in_array($popupId, $multiplePopup)) {
		sgRenderPopupScript($popupId);
		return;
	}


	sgRenderPopupOpen($popupId);
}

function sgOnloadPopup()
{
	$page = get_queried_object_id();
	$popup = "sg_promotional_popup";
	//If popup is set on page load
	$popupId = SGPopup::getPagePopupId($page, $popup);

	if(get_option("SG_ALL_PAGES")  && (is_page() || is_home()  || is_front_page())) {
		showPopupInPage(get_option("SG_ALL_PAGES"));
		/* return because if has all pages popup it should be open only */
		return;
	}
	if(get_option("SG_ALL_POSTS") && !(is_page() || is_home()  || is_front_page())) {
		showPopupInPage(get_option("SG_ALL_POSTS"));
		/* return because if has all posts popup it should be open only */
		return;
	}

	if(POPUP_BUILDER_PKG > POPUP_BUILDER_PKG_FREE){
		delete_option("SG_MULTIPLE_POPUP");

		/* Retrun all popups id width selected On All Pages */
		$popupsId = SgPopupPro::allowPopupInAllPages($page);

		/* $popupsId[0] its last selected popup id */
		if(isset($popupsId[0])) {
			delete_option("SG_MULTIPLE_POPUP");
			if(count($popupsId) > 0) {
				update_option("SG_MULTIPLE_POPUP",$popupsId);
			}
			foreach ($popupsId as $queuePupupId) {

				showPopupInPage($queuePupupId);
			}

			$popupsId = json_encode($popupsId);
		}
		else {
			$popupsId = json_encode(array());
		}
		echo '<script type="text/javascript">
			SG_POPUPS_QUEUE = '.$popupsId.'</script>';
	}

	//If popup is set for all pages
	if($popupId != 0) {
		showPopupInPage($popupId);
	}
	return false;
}

add_action('wp_head','sgOnloadPopup');
require_once( SG_APP_POPUP_FILES . '/sg_popup_media_button.php');
require_once( SG_APP_POPUP_FILES . '/sg_popup_save.php'); // saving form data
require_once( SG_APP_POPUP_FILES . '/sg_popup_ajax.php');
require_once( SG_APP_POPUP_FILES . '/sg_admin_post.php');

function sgPopupPluginLoaded()
{
	$versionPopup = get_option('SG_POPUP_VERSION');
	if (!$versionPopup || $versionPopup < SG_POPUP_VERSION ) {
		update_option('SG_POPUP_VERSION', SG_POPUP_VERSION);
		PopupInstaller::install();
	}
}

add_action('plugins_loaded', 'sgPopupPluginLoaded');
