<?php

/**
 * Class for managing plugin assets
 */
class Tp_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'wp_head',                     array( __CLASS__, 'register' ) );
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		add_action( 'perch/generator/preview/before', array( __CLASS__, 'register' ) );
		add_action( 'perch/examples/preview/before',  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'wp_footer',                   array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'perch/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'perch/examples/preview/after',   array( __CLASS__, 'prnt' ) );
		// Custom CSS
		add_action( 'wp_footer',                   array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'perch/generator/preview/after',  array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'perch/examples/preview/after',   array( __CLASS__, 'custom_css' ), 99 );
		// RTL support
		add_action( 'perch/assets/custom_css/after',        array( __CLASS__, 'rtl_shortcodes' ) );
		// Custom TinyMCE CSS and JS
		// add_filter( 'mce_css',                     array( __CLASS__, 'mce_css' ) );
		// add_filter( 'mce_external_plugins',        array( __CLASS__, 'mce_js' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {
		wp_register_script( 'imgLiquid', plugins_url( 'assets/js/imgLiquid-min.js', TP_PLUGIN_FILE ), array( 'jquery' ), '1.0', true );
		// Chart.js
		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', TP_PLUGIN_FILE ), false, '0.2', true );
		// SimpleSlider
		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', TP_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', plugins_url( 'assets/css/simpleslider.css', TP_PLUGIN_FILE ), false, '1.0.0', 'all' );
		// Owl Carousel
		wp_register_script( 'owl-carousel', plugins_url( 'assets/js/owl.carousel.min.js', TP_PLUGIN_FILE ), array( 'jquery' ), '1.3.2', true );
		wp_register_script( '_owl-carousel', plugins_url( 'assets/js/_owl.carousel.min.js', TP_PLUGIN_FILE ), array( 'jquery' ), '1.3.2', true );
		wp_register_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', TP_PLUGIN_FILE ), false, '1.3.2', 'all' );
		wp_register_style( 'owl-carousel-transitions', plugins_url( 'assets/css/owl-carousel-transitions.css', TP_PLUGIN_FILE ), false, '1.3.2', 'all' );
		//linearicons
		wp_register_style( 'linearicons', plugins_url( 'assets/css/linearicons/style.css', TP_PLUGIN_FILE ), false, '1.0', 'all' );
		// Font Awesome
		wp_register_style( 'genericons', plugins_url( 'assets/css/genericons/genericons.css', TP_PLUGIN_FILE ), false, '1.0', 'all' );
		//wp_register_style( 'foundation-icons', plugins_url( 'assets/css/foundation-icons/foundation-icons.css', TP_PLUGIN_FILE ), false, '1.0', 'all' );
		wp_register_style( 'ionicons', plugins_url( 'assets/css/ionicons-2.0.1/css/ionicons.min.css', TP_PLUGIN_FILE ), false, '4.1.0', 'all' );
		wp_register_style( 'font-awesome', plugins_url( 'assets/css/font-awesome/css/font-awesome.min.css', TP_PLUGIN_FILE ), array('ionicons', 'genericons', 'linearicons'), '4.1.0', 'all' );

		//bootstrap
		wp_register_style( 'bootstrap', plugins_url( 'assets/css/bootstrap.min.css', TP_PLUGIN_FILE ), false, '4.1.0', 'all' );
		
		wp_register_style( 'bootstrap-theme', plugins_url( 'assets/css/bootstrap-theme.min.css', TP_PLUGIN_FILE ), array('bootstrap'), '4.1.0', 'all' );
		// Animate.css
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', TP_PLUGIN_FILE ), false, '3.1.1', 'all' );
		// InView
		wp_register_script( 'inview', plugins_url( 'assets/js/inview.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// qTip
		wp_register_style( 'qtip', plugins_url( 'assets/css/qtip.css', TP_PLUGIN_FILE ), false, '2.1.1', 'all' );
		wp_register_script( 'qtip', plugins_url( 'assets/js/qtip.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// jsRender
		wp_register_script( 'jsrender', plugins_url( 'assets/js/jsrender.js', TP_PLUGIN_FILE ), array( 'jquery' ), '1.0.0-beta', true );
		// Magnific Popup
		wp_register_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', TP_PLUGIN_FILE ), false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.js', TP_PLUGIN_FILE ), array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'perch_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'perch' ),
				'loading' => __( 'Loading...', 'perch' ),
				'prev'    => __( 'Previous (Left arrow key)', 'perch' ),
				'next'    => __( 'Next (Right arrow key)', 'perch' ),
				'counter' => sprintf( __( '%s of %s', 'perch' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'perch' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );
		wp_register_style( 'pricing-table', plugins_url( 'assets/css/pricing-table.css', TP_PLUGIN_FILE ), false, '1.0', 'all' );
		// Ace
		wp_register_script( 'ace', plugins_url( 'assets/js/ace/ace.js', TP_PLUGIN_FILE ), false, '1.1.3', true );
		// Swiper
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.6.1', true );
		// jPlayer
		wp_register_script( 'jplayer', plugins_url( 'assets/js/jplayer.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// freewall
		wp_register_script( 'freewall', plugins_url( 'assets/js/freewall.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		wp_register_script( 'masonry', plugins_url( 'assets/js/masonry.pkgd.min.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		wp_register_script( 'mapapi', 'http://maps.google.com/maps/api/js?sensor=false', array( 'jquery' ), '1.0.0-beta', true );
		wp_register_script( 'mapmarker', plugins_url( 'assets/js/jquery.mapmarker.js', TP_PLUGIN_FILE ), array( 'jquery', 'mapapi' ), '1.0.0-beta', true );
		wp_register_script( 'perch-map', plugins_url( 'assets/js/perch-map.js', TP_PLUGIN_FILE ), array( 'jquery', 'mapmarker' ), TP_PLUGIN_VERSION, true );

		// Options page
		wp_register_style( 'perch-options-page', plugins_url( 'assets/css/options-page.css', TP_PLUGIN_FILE ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_script( 'perch-options-page', plugins_url( 'assets/js/options-page.js', TP_PLUGIN_FILE ), array( 'magnific-popup', 'jquery-ui-sortable', 'ace', 'jsrender' ), TP_PLUGIN_VERSION, true );
		wp_localize_script( 'perch-options-page', 'perch_options_page', array(
				'upload_title'  => __( 'Choose files', 'perch' ),
				'upload_insert' => __( 'Add selected files', 'perch' ),
				'not_clickable' => __( 'This button is not clickable', 'perch' )
			) );
		// Cheatsheet
		wp_register_style( 'perch-cheatsheet', plugins_url( 'assets/css/cheatsheet.css', TP_PLUGIN_FILE ), false, TP_PLUGIN_VERSION, 'all' );
		// Generator
		wp_register_style( 'perch-generator', plugins_url( 'assets/css/generator.css', TP_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup' ), TP_PLUGIN_VERSION, 'all' );
		wp_register_script( 'perch-generator', plugins_url( 'assets/js/generator.js', TP_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup', 'qtip' ), TP_PLUGIN_VERSION, true );
		wp_localize_script( 'perch-generator', 'perch_generator', array(
				'upload_title'         => __( 'Choose file', 'perch' ),
				'upload_insert'        => __( 'Insert', 'perch' ),
				'isp_media_title'      => __( 'Select images', 'perch' ),
				'isp_media_insert'     => __( 'Add selected images', 'perch' ),
				'presets_prompt_msg'   => __( 'Please enter a name for new preset', 'perch' ),
				'presets_prompt_value' => __( 'New preset', 'perch' ),
				'last_used'            => __( 'Last used settings', 'perch' ),
				'hotkey'               => get_option( 'perch_option_hotkey' )
			) );
		// Shortcodes stylesheets
		wp_register_style( 'perch-content-shortcodes', self::skin_url( 'content-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-box-shortcodes', self::skin_url( 'box-shortcodes.css' ), array( 'bootstrap' ), TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-media-shortcodes', self::skin_url( 'media-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-other-shortcodes', self::skin_url( 'other-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-galleries-shortcodes', self::skin_url( 'galleries-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-players-shortcodes', self::skin_url( 'players-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );

		//Landx css
		wp_register_style( 'landx_shortcodes_styles', self::skin_url( 'landx_shortcodes_styles.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'landx_shortcodes', self::skin_url( 'landx_shortcodes.css' ), array('landx_shortcodes_styles'), TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'landx-owl-carousel', self::skin_url( 'owl-carousel.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'landx-owl-theme', self::skin_url( 'owl.theme.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'nivo-lightbox', self::skin_url( 'nivo-lightbox.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'landx-default', self::skin_url( 'default.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'landx', self::skin_url( 'landx.css' ), array('landx-owl-carousel','landx-owl-theme','nivo-lightbox','landx-default','font-awesome' ), TP_PLUGIN_VERSION, 'all' );

		//Landx js
		wp_register_script( 'landx_scroll_fade', plugins_url( 'assets/js/landx_scroll_fade.js', TP_PLUGIN_FILE ), array( 'jquery' ), TP_PLUGIN_VERSION, true );
		wp_register_script( 'nivo-lightbox', plugins_url( 'assets/js/nivo-lightbox.min.js', TP_PLUGIN_FILE ), array( 'jquery' ), TP_PLUGIN_VERSION, true );
		wp_register_script( 'landx-styles', plugins_url( 'assets/js/landx.js', TP_PLUGIN_FILE ), array( 'jquery', '_owl-carousel', 'nivo-lightbox' ), TP_PLUGIN_VERSION, true );


		// RTL stylesheets
		wp_register_style( 'perch-rtl-shortcodes', self::skin_url( 'rtl-shortcodes.css' ), false, TP_PLUGIN_VERSION, 'all' );
		wp_register_style( 'perch-rtl-admin', self::skin_url( 'rtl-admin.css' ), false, TP_PLUGIN_VERSION, 'all' );
		// Shortcodes scripts
		wp_register_script( 'perch-galleries-shortcodes', plugins_url( 'assets/js/galleries-shortcodes.js', TP_PLUGIN_FILE ), array( 'jquery', 'swiper' ), TP_PLUGIN_VERSION, true );
		wp_register_script( 'perch-players-shortcodes', plugins_url( 'assets/js/players-shortcodes.js', TP_PLUGIN_FILE ), array( 'jquery', 'jplayer' ), TP_PLUGIN_VERSION, true );
		wp_register_script( 'perch-other-shortcodes', plugins_url( 'assets/js/other-shortcodes.js', TP_PLUGIN_FILE ), array( 'jquery' ), TP_PLUGIN_VERSION, true );
		wp_localize_script( 'perch-other-shortcodes', 'perch_other_shortcodes', array( 'no_preview' => __( 'This shortcode doesn\'t work in live preview. Please insert it into editor and preview on the site.', 'perch' ) ) );
		wp_register_script( 'bohopeople', plugins_url( 'assets/js/bohopeople.js', TP_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// Hook to deregister assets or add custom
		do_action( 'perch/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'perch/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'perch/assets/print', $assets );
	}

	/**
	 * Print custom CSS
	 */
	public static function custom_css() {
		// Get custom CSS and apply filters to it
		$custom_css = apply_filters( 'perch/assets/custom_css', str_replace( '&#039;', '\'', html_entity_decode( (string) get_option( 'perch_option_custom-css' ) ) ) );
		// Print CSS if exists
		if ( $custom_css ) echo "\n\n<!-- Perch Shortcodes custom CSS - begin -->\n<style type='text/css'>\n" . stripslashes( str_replace( array( '%theme_url%', '%home_url%', '%plugin_url%' ), array( trailingslashit( get_stylesheet_directory_uri() ), trailingslashit( get_option( 'home' ) ), trailingslashit( plugins_url( '', TP_PLUGIN_FILE ) ) ), $custom_css ) ) . "\n</style>\n<!-- Perch Shortcodes custom CSS - end -->\n\n";
		// Hook
		do_action( 'perch/assets/custom_css/after' );
	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= plugins_url( 'assets/css/tinymce.css', TP_PLUGIN_FILE );
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['shortcodesultimate'] = plugins_url( 'assets/js/tinymce.js', TP_PLUGIN_FILE );
		return $plugins;
	}

	/**
	 * RTL support for shortcodes
	 */
	public static function rtl_shortcodes( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		wp_print_styles( array( 'perch-rtl-shortcodes' ) );
	}

	/**
	 * RTL support for admin
	 */
	public static function rtl_admin( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		self::add( 'css', 'perch-rtl-admin' );
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}

	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'perch/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'perch/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = shortcodes_ultimate();
		$skin = get_option( 'perch_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? plugins_url( 'assets/css/', TP_PLUGIN_FILE ) : $uploads . '/perch-shortcodes-skins/' . $skin;
		return trailingslashit( apply_filters( 'perch/assets/skin', $url ) ) . $file;
	}
}

new Tp_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function perch_query_asset( $type, $handle ) {
	Tp_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function perch_skin_url( $file ) {
	return Tp_Assets::skin_url( $file );
}
