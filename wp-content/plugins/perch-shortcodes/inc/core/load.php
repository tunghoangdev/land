<?php
class Perch_Shortcodes {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'plugins_loaded',             array( __CLASS__, 'init' ) );
		add_action( 'init',                       array( __CLASS__, 'register' ) );
		add_action( 'init',                       array( __CLASS__, 'update' ), 20 );
		register_activation_hook( TP_PLUGIN_FILE, array( __CLASS__, 'activation' ) );
		register_activation_hook( TP_PLUGIN_FILE, array( __CLASS__, 'deactivation' ) );
	}

	/**
	 * Plugin init
	 */
	public static function init() {
		// Make plugin available for translation
		load_plugin_textdomain( 'perch', false, dirname( plugin_basename( TP_PLUGIN_FILE ) ) . '/languages/' );
		// Setup admin class
		$admin = new Themeperch( array(
				'file'       => TP_PLUGIN_FILE,
				'slug'       => 'perch',
				'prefix'     => 'perch_option_',
				'textdomain' => 'perch'
			) );
		// Top-level menu
		$admin->add_menu( array(
				'page_title'  => __( 'Settings', 'perch' ) . ' &lsaquo; ' . __( 'Perch Shortcodes', 'perch' ),
				'menu_title'  => apply_filters( 'perch/menu/shortcodes', __( 'Shortcodes', 'perch' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'perch-shortcodes',
				'icon_url'    => 'dashicons-editor-code',
				'position'    => '80.11',
				'options'     => array(
					array(
						'type' => 'opentab',
						'name' => __( 'Settings', 'perch' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'custom-formatting',
						'name'    => __( 'Custom formatting', 'perch' ),
						'desc'    => __( 'Disable this option if you have some problems with other plugins or content formatting', 'perch' ) ,
						'default' => 'on',
						'label'   => __( 'Enabled', 'perch' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'skip',
						'name'    => __( 'Skip default values', 'perch' ),
						'desc'    => __( 'Enable this option and the generator will insert a shortcode without default attribute values that you have not changed. As a result, the generated code will be shorter.', 'perch' ),
						'default' => 'on',
						'label'   => __( 'Enabled', 'perch' )
					),
					array(
						'type'    => 'text',
						'id'      => 'prefix',
						'name'    => __( 'Shortcodes prefix', 'perch' ),
						'desc'    => sprintf( __( 'This prefix will be added to all shortcodes by this plugin. For example, type here %s and you\'ll get shortcodes like %s and %s. Please keep in mind: this option is not affects your already inserted shortcodes and if you\'ll change this value your old shortcodes will be broken', 'perch' ), '<code>perch_</code>', '<code>[perch_button]</code>', '<code>[perch_column]</code>' ),
						'default' => 'perch_'
					),
					array(
						'type'    => 'text',
						'id'      => 'hotkey',
						'name'    => __( 'Insert shortcode Hotkey', 'perch' ),
						'desc'    => sprintf( '%s<br><a href="https://rawgit.com/jeresig/jquery.hotkeys/master/test-static-01.html" target="_blank">%s</a> | <a href="https://github.com/jeresig/jquery.hotkeys#notes" target="_blank">%s</a>', __( 'Here you can define custom hotkey for the Insert shortcode popup window. Leave this field empty to disable hotkey', 'perch' ), __( 'Hotkey examples', 'perch' ), __( 'Additional notes', 'perch' ) ),
						'default' => 'alt+i'
					),
					array(
						'type'    => 'hidden',
						'id'      => 'skin',
						'name'    => __( 'Skin', 'perch' ),
						'desc'    => __( 'Choose global skin for shortcodes', 'perch' ),
						'default' => 'default'
					),
					array(
						'type' => 'closetab'
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Custom CSS', 'perch' )
					),
					array(
						'type'     => 'custom_css',
						'id'       => 'custom-css',
						'default'  => '',
						'callback' => array( 'Tp_Admin_Views', 'custom_css' )
					),
					array(
						'type' => 'closetab'
					)
				)
			) );
		// Settings submenu
		$admin->add_submenu( array(
				'parent_slug' => 'perch-shortcodes',
				'page_title'  => __( 'Settings', 'perch' ) . ' &lsaquo; ' . __( 'Perch Shortcodes', 'perch' ),
				'menu_title'  => apply_filters( 'perch/menu/settings', __( 'Settings', 'perch' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'perch-shortcodes',
				'options'     => array()
			) );
		// Examples submenu
		$admin->add_submenu( array(
				'parent_slug' => 'perch-shortcodes',
				'page_title'  => __( 'Examples', 'perch' ) . ' &lsaquo; ' . __( 'Perch Shortcodes', 'perch' ),
				'menu_title'  => apply_filters( 'perch/menu/examples', __( 'Examples', 'perch' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'perch-shortcodes-examples',
				'options'     => array(
					array(
						'type' => 'examples',
						'callback' => array( 'Tp_Admin_Views', 'examples' )
					)
				)
			) );
		// Cheatsheet submenu
		$admin->add_submenu( array(
				'parent_slug' => 'perch-shortcodes',
				'page_title'  => __( 'Cheatsheet', 'perch' ) . ' &lsaquo; ' . __( 'Perch Shortcodes', 'perch' ),
				'menu_title'  => apply_filters( 'perch/menu/examples', __( 'Cheatsheet', 'perch' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'perch-shortcodes-cheatsheet',
				'options'     => array(
					array(
						'type' => 'cheatsheet',
						'callback' => array( 'Tp_Admin_Views', 'cheatsheet' )
					)
				)
			) );
		
		// Translate plugin meta
		__( 'Perch Shortcodes', 'perch' );
		__( 'Vladimir Anokhin', 'perch' );
		__( 'Supercharge your WordPress theme with mega pack of shortcodes', 'perch' );
		// Add plugin actions links
		add_filter( 'plugin_action_links_' . plugin_basename( TP_PLUGIN_FILE ), array( __CLASS__, 'actions_links' ), -10 );
		// Add plugin meta links
		add_filter( 'plugin_row_meta', array( __CLASS__, 'meta_links' ), 10, 2 );
		// Perch Shortcodes is ready
		do_action( 'perch/init' );
	}

	/**
	 * Plugin activation
	 */
	public static function activation() {
		self::timestamp();
		update_option( 'perch_option_version', TP_PLUGIN_VERSION );
		do_action( 'perch/activation' );
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
		do_action( 'perch/deactivation' );
	}

	/**
	 * Plugin update hook
	 */
	public static function update() {
		$option = get_option( 'perch_option_version' );
		if ( $option !== TP_PLUGIN_VERSION ) {
			update_option( 'perch_option_version', TP_PLUGIN_VERSION );
			do_action( 'perch/update' );
		}
	}

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Prepare compatibility mode prefix
		$prefix = perch_cmpt();
		// Loop through shortcodes
		foreach ( ( array ) Tp_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Tp_Shortcodes', $id ) ) ) $func = array( 'Tp_Shortcodes', $id );
			elseif ( is_callable( array( 'Tp_Shortcodes', 'perch_' . $id ) ) ) $func = array( 'Tp_Shortcodes', 'perch_' . $id );
			else continue;
			// Register shortcode
			add_shortcode( $prefix . $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( $prefix . 'media', array( 'Tp_Shortcodes', 'media' ) );
	}

	/**
	 * Add timestamp
	 */
	public static function timestamp() {
		if ( !get_option( 'perch_installed' ) ) update_option( 'perch_installed', time() );
	}

	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=perch-shortcodes-examples' ) . '">' . __( 'Examples', 'perch' ) . '</a>';
		$links[] = '<a href="' . admin_url( 'admin.php?page=perch-shortcodes' ) . '#tab-0">' . __( 'Where to start?', 'perch' ) . '</a>';
		return $links;
	}

	/**
	 * Add plugin meta links
	 */
	public static function meta_links( $links, $file ) {
		// Check plugin
		if ( $file === plugin_basename( TP_PLUGIN_FILE ) ) {
			unset( $links[2] );
			$links[] = '<a href="http://themeperch.net" target="_blank">' . __( 'Project homepage', 'perch' ) . '</a>';
			$links[] = '<a href="http://themeforest.net/user/themeperch/portfolio/?ref=themeperch" target="_blank">' . __( 'Envato portfolio', 'perch' ) . '</a>';
		}
		return $links;
	}
}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function shortcodes_ultimate() {
	return true;
}

new Perch_Shortcodes;
