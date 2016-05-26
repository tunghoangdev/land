<?php
/**
 * Shortcode Generator
 */
class Tp_Generator {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'media_buttons',                       array( __CLASS__, 'button' ), 1000 );

		add_action( 'perch/update',                           array( __CLASS__, 'reset' ) );
		add_action( 'perch/activation',                       array( __CLASS__, 'reset' ) );
		add_action( 'sunrise/page/before',                 array( __CLASS__, 'reset' ) );
		add_action( 'create_term',                         array( __CLASS__, 'reset' ), 10, 3 );
		add_action( 'edit_term',                           array( __CLASS__, 'reset' ), 10, 3 );
		add_action( 'delete_term',                         array( __CLASS__, 'reset' ), 10, 3 );

		add_action( 'wp_ajax_perch_generator_settings',       array( __CLASS__, 'settings' ) );
		add_action( 'wp_ajax_perch_generator_preview',        array( __CLASS__, 'preview' ) );
		add_action( 'perch/generator/actions',                array( __CLASS__, 'presets' ) );

		add_action( 'wp_ajax_perch_generator_get_icons',      array( __CLASS__, 'ajax_get_icons' ) );
		add_action( 'wp_ajax_perch_generator_get_terms',      array( __CLASS__, 'ajax_get_terms' ) );
		add_action( 'wp_ajax_perch_generator_get_taxonomies', array( __CLASS__, 'ajax_get_taxonomies' ) );
		add_action( 'wp_ajax_perch_generator_add_preset',     array( __CLASS__, 'ajax_add_preset' ) );
		add_action( 'wp_ajax_perch_generator_remove_preset',  array( __CLASS__, 'ajax_remove_preset' ) );
		add_action( 'wp_ajax_perch_generator_get_preset',     array( __CLASS__, 'ajax_get_preset' ) );
	}

	/**
	 * Generator button
	 */
	public static function button( $args = array() ) {
		// Check access
		if ( !self::access_check() ) return;
		// Prepare button target
		$target = is_string( $args ) ? $args : 'content';
		// Prepare args
		$args = wp_parse_args( $args, array(
				'target'    => $target,
				'text'      => __( 'Insert shortcode', 'perch' ),
				'class'     => 'button',
				'icon'      => plugins_url( 'assets/images/icon.png', TP_PLUGIN_FILE ),
				'echo'      => true,
				'shortcode' => false
			) );
		// Prepare icon
		if ( $args['icon'] ) $args['icon'] = '<img src="' . $args['icon'] . '" /> ';
		// Print button
		$button = '<a href="javascript:void(0);" class="perch-generator-button ' . $args['class'] . '" title="' . $args['text'] . '" data-target="' . $args['target'] . '" data-mfp-src="#perch-generator" data-shortcode="' . (string) $args['shortcode'] . '">' . $args['icon'] . $args['text'] . '</a>';
		// Show generator popup
		add_action( 'wp_footer',    array( __CLASS__, 'popup' ) );
		add_action( 'admin_footer', array( __CLASS__, 'popup' ) );
		// Request assets
		wp_enqueue_media();
		perch_query_asset( 'css', array( 'simpleslider', 'farbtastic', 'magnific-popup', 'font-awesome', 'perch-generator' ) );
		perch_query_asset( 'js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'simpleslider', 'farbtastic', 'magnific-popup', 'jquery-hotkeys', 'perch-generator' ) );
		// Hook
		do_action( 'perch/button', $args );
		// Print/return result
		if ( $args['echo'] ) echo $button;
		return $button;
	}

	/**
	 * Cache reset
	 */
	public static function reset() {
		// Clear popup cache
		delete_transient( 'perch/generator/popup' );
		// Clear shortcodes settings cache
		foreach ( array_keys( (array) Tp_Data::shortcodes() ) as $shortcode ) delete_transient( 'perch/generator/settings/' . $shortcode );
	}

	/**
	 * Generator popup form
	 */
	public static function popup() {
		// Get cache
		$output = get_transient( 'perch/generator/popup' );
		if ( $output && TP_ENABLE_CACHE ) echo $output;
		// Cache not found
		else {
			ob_start();
			$tools = apply_filters( 'perch/generator/tools', array(
					'<a href="' . admin_url( 'admin.php?page=perch-shortcodes' ) . '#tab-1" target="_blank" title="' . __( 'Settings', 'perch' ) . '">' . __( 'Plugin settings', 'perch' ) . '</a>',
					'<a href="http://gndev.info/perch-shortcodes/" target="_blank" title="' . __( 'Plugin homepage', 'perch' ) . '">' . __( 'Plugin homepage', 'perch' ) . '</a>',
					'<a href="http://themeforest.net/user/themeperch/portfolio/?ref=themeperch" target="_blank" title="' . __( 'Envato portfolios', 'perch' ) . '">' . __( 'Envato portfolios', 'perch' ) . '</a>'
				) );
?>
		<div id="perch-generator-wrap" style="display:none">
			<div id="perch-generator">
				<div id="perch-generator-header">
					<div id="perch-generator-tools"><?php echo implode( ' <span></span> ', $tools ); ?></div>
					<input type="text" name="perch_generator_search" id="perch-generator-search" value="" placeholder="<?php _e( 'Search for shortcodes', 'perch' ); ?>" />
					<p id="perch-generator-search-pro-tip"><?php printf( '<strong>%s:</strong> %s', __( 'Pro Tip', 'perch' ), __( 'Hit enter to select highlighted shortcode, while searching' ) ) ?></p>
					<div id="perch-generator-filter">
						<strong><?php _e( 'Filter by type', 'perch' ); ?></strong>
						<?php foreach ( (array) Tp_Data::groups() as $group => $label ) echo '<a href="#" data-filter="' . $group . '">' . $label . '</a>'; ?>
					</div>
					<div id="perch-generator-choices" class="perch-generator-clearfix">
						<?php
			// Choices loop
			foreach ( (array) Tp_Data::shortcodes() as $name => $shortcode ) {
				$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
				$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
				echo '<span data-name="' . $shortcode['name'] . '" data-shortcode="' . $name . '" title="' . esc_attr( $shortcode['desc'] ) . '" data-desc="' . esc_attr( $shortcode['desc'] ) . '" data-group="' . $shortcode['group'] . '">' . Tp_Tools::icon( $icon ) . $shortcode['name'] . '</span>' . "\n";
			}
?>
					</div>
				</div>
				<div id="perch-generator-settings"></div>
				<input type="hidden" name="perch-generator-selected" id="perch-generator-selected" value="<?php echo plugins_url( '', TP_PLUGIN_FILE ); ?>" />
				<input type="hidden" name="perch-generator-url" id="perch-generator-url" value="<?php echo plugins_url( '', TP_PLUGIN_FILE ); ?>" />
				<input type="hidden" name="perch-compatibility-mode-prefix" id="perch-compatibility-mode-prefix" value="<?php echo perch_compatibility_mode_prefix(); ?>" />
				<div id="perch-generator-result" style="display:none"></div>
			</div>
		</div>
	<?php
			$output = ob_get_contents();
			set_transient( 'perch/generator/popup', $output, 2 * DAY_IN_SECONDS );
			ob_end_clean();
			echo $output;
		}
	}

	/**
	 * Process AJAX request
	 */
	public static function settings() {
		self::access();
		// Param check
		if ( empty( $_REQUEST['shortcode'] ) ) wp_die( __( 'Shortcode not specified', 'perch' ) );
		// Get cache
		$output = get_transient( 'perch/generator/settings/' . sanitize_text_field( $_REQUEST['shortcode'] ) );
		if ( $output && TP_ENABLE_CACHE ) echo $output;
		// Cache not found
		else {
			// Request queried shortcode
			$shortcode = Tp_Data::shortcodes( sanitize_key( $_REQUEST['shortcode'] ) );
			// Prepare skip-if-default option
			$skip = ( get_option( 'perch_option_skip' ) === 'on' ) ? ' perch-generator-skip' : '';
			// Prepare actions
			$actions = apply_filters( 'perch/generator/actions', array(
					'insert' => '<a href="javascript:void(0);" class="button button-primary button-large perch-generator-insert"><i class="fa fa-check"></i> ' . __( 'Insert shortcode', 'perch' ) . '</a>',
					'preview' => '<a href="javascript:void(0);" class="button button-large perch-generator-toggle-preview"><i class="fa fa-eye"></i> ' . __( 'Live preview', 'perch' ) . '</a>'
				) );
			// Shortcode header
			$return = '<div id="perch-generator-breadcrumbs">';
			$return .= apply_filters( 'perch/generator/breadcrumbs', '<a href="javascript:void(0);" class="perch-generator-home" title="' . __( 'Click to return to the shortcodes list', 'perch' ) . '">' . __( 'All shortcodes', 'perch' ) . '</a> &rarr; <span>' . $shortcode['name'] . '</span> <small class="alignright">' . $shortcode['desc'] . '</small><div class="perch-generator-clear"></div>' );
			$return .= '</div>';
			// Shortcode note
			if ( isset( $shortcode['note'] ) || isset( $shortcode['example'] ) ) {
				$return .= '<div class="perch-generator-note"><i class="fa fa-info-circle"></i><div class="perch-generator-note-content">';
				if ( isset( $shortcode['note'] ) ) $return .= wpautop( $shortcode['note'] );
				if ( isset( $shortcode['example'] ) ) $return .= wpautop( '<a href="' . admin_url( 'admin.php?page=perch-shortcodes-examples&example=' . $shortcode['example'] ) . '" target="_blank">' . __( 'Examples of use', 'perch' ) . ' &rarr;</a>' );
				$return .= '</div></div>';
			}
			// Shortcode has atts
			if ( isset( $shortcode['atts'] ) && count( $shortcode['atts'] ) ) {
				// Loop through shortcode parameters
				foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
					// Prepare default value
					$default = (string) ( isset( $attr_info['default'] ) ) ? $attr_info['default'] : '';
					$attr_info['name'] = ( isset( $attr_info['name'] ) ) ? $attr_info['name'] : $attr_name;
					$return .= '<div class="perch-generator-attr-container' . $skip . '" data-default="' . esc_attr( $default ) . '">';
					$return .= '<h5>' . $attr_info['name'] . '</h5>';
					// Create field types
					if ( !isset( $attr_info['type'] ) && isset( $attr_info['values'] ) && is_array( $attr_info['values'] ) && count( $attr_info['values'] ) ) $attr_info['type'] = 'select';
					elseif ( !isset( $attr_info['type'] ) ) $attr_info['type'] = 'text';
					if ( is_callable( array( 'Tp_Generator_Views', $attr_info['type'] ) ) ) $return .= call_user_func( array( 'Tp_Generator_Views', $attr_info['type'] ), $attr_name, $attr_info );
					elseif ( isset( $attr_info['callback'] ) && is_callable( $attr_info['callback'] ) ) $return .= call_user_func( $attr_info['callback'], $attr_name, $attr_info );
					if ( isset( $attr_info['desc'] ) ) $attr_info['desc'] = str_replace( '%perch_skins_link%', perch_skins_link(), $attr_info['desc'] );
					if ( isset( $attr_info['desc'] ) ) $return .= '<div class="perch-generator-attr-desc">' . str_replace( array( '<b%value>', '<b_>' ), '<b class="perch-generator-set-value" title="' . __( 'Click to set this value', 'perch' ) . '">', $attr_info['desc'] ) . '</div>';
					$return .= '</div>';
				}
			}
			// Single shortcode (not closed)
			if ( $shortcode['type'] == 'single' ) $return .= '<input type="hidden" name="perch-generator-content" id="perch-generator-content" value="false" />';
			// Wrapping shortcode
			else {
				// Prepare shortcode content
				$shortcode['content'] = ( isset( $shortcode['content'] ) ) ? $shortcode['content'] : '';
				$return .= '<div class="perch-generator-attr-container"><h5>' . __( 'Content', 'perch' ) . '</h5><textarea name="perch-generator-content" id="perch-generator-content" rows="5">' . esc_attr( str_replace( array( '%prefix_', '__' ), perch_cmpt(), $shortcode['content'] ) ) . '</textarea></div>';
			}
			$return .= '<div id="perch-generator-preview"></div>';
			$return .= '<div class="perch-generator-actions perch-generator-clearfix">' . implode( ' ', array_values( $actions ) ) . '</div>';
			set_transient( 'perch/generator/settings/' . sanitize_text_field( $_REQUEST['shortcode'] ), $return, 2 * DAY_IN_SECONDS );
			echo $return;
		}
		exit;
	}

	/**
	 * Process AJAX request and generate preview HTML
	 */
	public static function preview() {
		// Check authentication
		self::access();
		// Output results
		do_action( 'perch/generator/preview/before' );
		echo '<h5>' . __( 'Preview', 'perch' ) . '</h5>';
		// echo '<hr />' . stripslashes( $_POST['shortcode'] ) . '<hr />'; // Uncomment for debug
		echo do_shortcode( str_replace( '\"', '"', $_POST['shortcode'] ) );
		echo '<div style="clear:both"></div>';
		do_action( 'perch/generator/preview/after' );
		die();
	}

	public static function access() {
		if ( !self::access_check() ) wp_die( __( 'Access denied', 'perch' ) );
	}

	public static function access_check() {
		$by_role = ( get_option( 'perch_generator_access' ) ) ? current_user_can( get_option( 'perch_generator_access' ) ) : true;
		return current_user_can( 'edit_posts' ) && $by_role;
	}

	public static function ajax_get_icons() {
		self::access();
		die( Tp_Tools::icons() );
	}

	public static function ajax_get_terms() {
		self::access();
		$args = array();
		if ( isset( $_REQUEST['tax'] ) ) $args['options'] = (array) Tp_Tools::get_terms( sanitize_key( $_REQUEST['tax'] ) );
		if ( isset( $_REQUEST['class'] ) ) $args['class'] = (string) sanitize_key( $_REQUEST['class'] );
		if ( isset( $_REQUEST['multiple'] ) ) $args['multiple'] = (bool) sanitize_key( $_REQUEST['multiple'] );
		if ( isset( $_REQUEST['size'] ) ) $args['size'] = (int) sanitize_key( $_REQUEST['size'] );
		if ( isset( $_REQUEST['noselect'] ) ) $args['noselect'] = (bool) sanitize_key( $_REQUEST['noselect'] );
		die( Tp_Tools::select( $args ) );
	}

	public static function ajax_get_taxonomies() {
		self::access();
		$args = array();
		$args['options'] = Tp_Tools::get_taxonomies();
		die( Tp_Tools::select( $args ) );
	}

	public static function presets( $actions ) {
		ob_start();
?>
<div class="perch-generator-presets alignright" data-shortcode="<?php echo sanitize_key( $_REQUEST['shortcode'] ); ?>">
	<a href="javascript:void(0);" class="button button-large perch-gp-button"><i class="fa fa-bars"></i> <?php _e( 'Presets', 'perch' ); ?></a>
	<div class="perch-gp-popup">
		<div class="perch-gp-head">
			<a href="javascript:void(0);" class="button button-small button-primary perch-gp-new"><?php _e( 'Save current settings as preset', 'perch' ); ?></a>
		</div>
		<div class="perch-gp-list">
			<?php self::presets_list(); ?>
		</div>
	</div>
</div>
		<?php
		$actions['presets'] = ob_get_contents();
		ob_end_clean();
		return $actions;
	}

	public static function presets_list( $shortcode = false ) {
		// Shortcode isn't specified, try to get it from $_REQUEST
		if ( !$shortcode ) $shortcode = $_REQUEST['shortcode'];
		// Shortcode name is still doesn't exists, exit
		if ( !$shortcode ) return;
		// Shortcode has been specified, sanitize it
		$shortcode = sanitize_key( $shortcode );
		// Get presets
		$presets = get_option( 'perch_presets_' . $shortcode );
		// Presets has been found
		if ( is_array( $presets ) && count( $presets ) ) {
			// Print the presets
			foreach ( $presets as $preset ) {
				echo '<span data-id="' . $preset['id'] . '"><em>' . stripslashes( $preset['name'] ) . '</em> <i class="fa fa-times"></i></span>';
			}
			// Hide default text
			echo sprintf( '<b style="display:none">%s</b>', __( 'Presets not found', 'perch' ) );
		}
		// Presets doesn't found
		else echo sprintf( '<b>%s</b>', __( 'Presets not found', 'perch' ) );
	}

	public static function ajax_add_preset() {
		self::access();
		// Check incoming data
		if ( empty( $_POST['id'] ) ) return;
		if ( empty( $_POST['name'] ) ) return;
		if ( empty( $_POST['settings'] ) ) return;
		if ( empty( $_POST['shortcode'] ) ) return;
		// Clean-up incoming data
		$id = sanitize_key( $_POST['id'] );
		$name = sanitize_text_field( $_POST['name'] );
		$settings = ( is_array( $_POST['settings'] ) ) ? stripslashes_deep( $_POST['settings'] ) : array();
		$shortcode = sanitize_key( $_POST['shortcode'] );
		// Prepare option name
		$option = 'perch_presets_' . $shortcode;
		// Get the existing presets
		$current = get_option( $option );
		// Create array with new preset
		$new = array(
			'id'       => $id,
			'name'     => $name,
			'settings' => $settings
		);
		// Add new array to the option value
		if ( !is_array( $current ) ) $current = array();
		$current[$id] = $new;
		// Save updated option
		update_option( $option, $current );
		// Clear cache
		delete_transient( 'perch/generator/settings/' . $shortcode );
	}

	public static function ajax_remove_preset() {
		self::access();
		// Check incoming data
		if ( empty( $_POST['id'] ) ) return;
		if ( empty( $_POST['shortcode'] ) ) return;
		// Clean-up incoming data
		$id = sanitize_key( $_POST['id'] );
		$shortcode = sanitize_key( $_POST['shortcode'] );
		// Prepare option name
		$option = 'perch_presets_' . $shortcode;
		// Get the existing presets
		$current = get_option( $option );
		// Check that preset is exists
		if ( !is_array( $current ) || empty( $current[$id] ) ) return;
		// Remove preset
		unset( $current[$id] );
		// Save updated option
		update_option( $option, $current );
		// Clear cache
		delete_transient( 'perch/generator/settings/' . $shortcode );
	}

	public static function ajax_get_preset() {
		self::access();
		// Check incoming data
		if ( empty( $_GET['id'] ) ) return;
		if ( empty( $_GET['shortcode'] ) ) return;
		// Clean-up incoming data
		$id = sanitize_key( $_GET['id'] );
		$shortcode = sanitize_key( $_GET['shortcode'] );
		// Default data
		$data = array();
		// Get the existing presets
		$presets = get_option( 'perch_presets_' . $shortcode );
		// Check that preset is exists
		if ( is_array( $presets ) && isset( $presets[$id]['settings'] ) ) $data = $presets[$id]['settings'];
		// Print results
		die( json_encode( $data ) );
	}
}

new Tp_Generator;

class Perch_Shortcodes_Generator extends Tp_Generator {
	function __construct() {
		parent::__construct();
	}
}
