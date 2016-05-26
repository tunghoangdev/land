<?php
/*
  Plugin Name: Perch Shortcodes
  Plugin URI: http://themeforest.net/user/themeperch/portfolio/ref=themeperch
  Version: 1.3
  Author: Themeperch
  Author URI: http://themeforest.net/user/themeperch/ref=themeperch
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: perch
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'TP_PLUGIN_FILE', __FILE__ );
define( 'TP_PLUGIN_VERSION', '1.3' );
define( 'TP_ENABLE_CACHE', false );

// Includes
require_once 'inc/vendor/perch.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
require_once 'pricing/perch-pricing.php';
require_once 'inc/core/old-shortcode-functions.php';
require_once 'inc/core/old-widget.php';
