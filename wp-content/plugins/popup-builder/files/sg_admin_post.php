<?php
function sgGetCsvFile() {
	global $wpdb;
	$content = '';
	$sql = "SHOW COLUMNS FROM ". $wpdb->prefix ."sg_subscribers";
	$rows = $wpdb->get_results($sql, ARRAY_A);
	foreach ($rows as $value) {
		$content .= $value['Field'].",";
	}
	$content .= "\n";

	$sql = "Select * from ". $wpdb->prefix ."sg_subscribers";
	$subscribers = $wpdb->get_results($sql, ARRAY_A);

	foreach($subscribers as $values) {
		foreach ($values as  $value) {
			$content .= $value.',';
		}
		$content .= "\n";
	}

	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"subscribersList.csv\";" );
	header("Content-Transfer-Encoding: binary");
	echo $content;
}

add_action('admin_post_csv_file', 'sgGetCsvFile');

function sgDeleteSubscribe() {
	global $wpdb;
	$id = $_GET['id'];
	$wpdb->query(
		$wpdb->prepare(
			"DELETE FROM ". $wpdb->prefix ."sg_subscribers WHERE id = %d"
			,$id
		)
	);
	wp_redirect(SG_APP_POPUP_ADMIN_URL."admin.php?page=subscribers");
}

add_action('admin_post_subscribe_delete', 'sgDeleteSubscribe');

function sgPopupClone() {
	$id = $_GET['id'];
	$obj = SGPopup::findById($id);
	$title = $obj->getTitle();
	$title .= "(clone)";
	$obj->setId("");
	$obj->setTitle($title);

	$options = $obj->getOptions();
	$options = json_decode($options, true);
	$obj->save();

	$cloneId = $obj->getId();
	/* For save popupIn pages table */
	if($options['allPagesStatus']) {
		if(!empty($options['showAllPages']) && $options['showAllPages'] != 'all') {
			update_option("SG_ALL_PAGES", false);
			SGPopup::addPopupForAllPages($cloneId, $options['allSelectedPages']);
		}
		else {
			update_option("SG_ALL_PAGES", $cloneId);
		}
	}
	if($options['allPostsStatus']) {
		if(!empty($options['showAllPosts']) && $options['showAllPosts'] != "all") {
			update_option("SG_ALL_POSTS", false);
			SGPopup::addPopupForAllPages($cloneId, $options['allSelectedPosts']);
		}
		else {
			update_option("SG_ALL_POSTS", $cloneId);
		}
	}

	wp_redirect(SG_APP_POPUP_ADMIN_URL."admin.php?page=PopupBuilder");
}

add_action('admin_post_popup_clone', 'sgPopupClone');

function sgPopupDataExport() {
	global $wpdb;

	$exportArray = array();
	$mainTable = PopupInstaller::$maintablename;

	$popupDataSql = "SELECT * FROM ".$wpdb->prefix.$mainTable;
	$getAllPopupData = $wpdb->get_results($popupDataSql, ARRAY_A);
	foreach ($getAllPopupData as $popupData) {
		$type = $popupData['type'];
		$id = $popupData['id'];
		if ($type == 'ageRestriction') {
			$type = "age_restriction";
		}
		else if($type == 'exitIntent') {
			$type = "exit_intent";
		}
		else if($type == 'contactForm') {
			$type = "contact_form";
		}
		$table = "sg_".$type."_popup";
		$tableName = $wpdb->prefix.$table;

		$chieldPopupDataSql = "SELECT * FROM ".$tableName;
		$chieldPopupData = $wpdb->get_results($chieldPopupDataSql, ARRAY_A);

		$getRowsSql = "SHOW COLUMNS FROM ".$tableName;
		$chiledRows = $wpdb->get_results($getRowsSql, ARRAY_A);

		unset($chieldPopupData[0]['id']);
		//unset($chiledRows[0]);

		$exportArray[] = array(
			'mainPopupData' => $popupData,
			'childData' => $chieldPopupData,
			'chiledColums' => $chiledRows,
			'childTableName' => $table
		);
	}

	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"sgexportdata.txt\";" );
	header("Content-Transfer-Encoding: binary");
	echo serialize($exportArray);
}

add_action('admin_post_popup_export', 'sgPopupDataExport');

