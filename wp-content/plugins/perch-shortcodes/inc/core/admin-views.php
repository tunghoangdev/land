<?php
class Tp_Admin_Views {
	function __construct() {}

	public static function custom_css( $field, $config ) {
		ob_start();
?>
<div id="perch-custom-css-screen">
	<div class="perch-custom-css-originals">
		<p><strong><?php _e( 'You can overview the original styles to overwrite it', $config['textdomain'] ); ?></strong></p>
		<div class="perch-inline-menu">
			<a href="<?php echo perch_skin_url( 'content-shortcodes.css' ); ?>">content-shortcodes.css</a>
			<a href="<?php echo perch_skin_url( 'box-shortcodes.css' ); ?>">box-shortcodes.css</a>
			<a href="<?php echo perch_skin_url( 'media-shortcodes.css' ); ?>">media-shortcodes.css</a>
			<a href="<?php echo perch_skin_url( 'galleries-shortcodes.css' ); ?>">galleries-shortcodes.css</a>
			<a href="<?php echo perch_skin_url( 'players-shortcodes.css' ); ?>">players-shortcodes.css</a>
			<a href="<?php echo perch_skin_url( 'other-shortcodes.css' ); ?>">other-shortcodes.css</a>
		</div>
		<?php do_action( 'perch/admin/css/originals/after' ); ?>
	</div>
	<div class="perch-custom-css-vars">
		<p><strong><?php _e( 'You can use next variables in your custom CSS', $config['textdomain'] ); ?></strong></p>
		<code>%home_url%</code> - <?php _e( 'home url', $config['textdomain'] ); ?><br/>
		<code>%theme_url%</code> - <?php _e( 'theme url', $config['textdomain'] ); ?><br/>
		<code>%plugin_url%</code> - <?php _e( 'plugin url', $config['textdomain'] ); ?>
	</div>
	<div id="perch-custom-css-editor">
		<div id="perch-field-<?php echo $field['id']; ?>-editor"></div>
		<textarea name="sunrise[<?php echo $field['id']; ?>]" id="perch-field-<?php echo $field['id']; ?>" class="regular-text" rows="10"><?php echo stripslashes( get_option( $config['prefix'] . $field['id'] ) ); ?></textarea>
	</div>
</div>
			<?php
		$output = ob_get_contents();
		ob_end_clean();
		perch_query_asset( 'css', array( 'magnific-popup', 'perch-options-page' ) );
		perch_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ace', 'perch-options-page' ) );
		return $output;
	}

	public static function examples( $field, $config ) {
		$output = array();
		$examples = Tp_Data::examples();
		$preview = '<div style="display:none"><div id="perch-examples-window"><div id="perch-examples-preview"></div></div></div>';
		$open = ( isset( $_GET['example'] ) ) ? sanitize_key( $_GET['example'] ) : '';
		$open = '<input id="perch_open_example" type="hidden" name="perch_open_example" value="' . $open . '" />';
		$nonce = '<input id="perch_examples_nonce" type="hidden" name="perch_examples_nonce" value="' . wp_create_nonce( 'perch_examples_nonce' ) . '" />';
		foreach ( $examples as $group ) {
			$items = array();
			if ( isset( $group['items'] ) ) foreach ( $group['items'] as $item ) {
					$code = ( isset( $item['code'] ) ) ? $item['code'] : plugins_url( 'inc/examples/' . $item['id'] . '.example', TP_PLUGIN_FILE );
					$id = ( isset( $item['id'] ) ) ? $item['id'] : '';
					$items[] = '<div class="perch-examples-item" data-code="' . $code . '" data-id="' . $id . '" data-mfp-src="#perch-examples-window"><i class="fa fa-' . $item['icon'] . '"></i> ' . $item['name'] . '</div>';
				}
			$output[] = '<div class="perch-examples-group perch-clearfix"><h2 class="perch-examples-group-title">' . $group['title'] . '</h2>' . implode( '', $items ) . '</div>';
		}
		perch_query_asset( 'css', array( 'magnific-popup', 'font-awesome', 'perch-options-page' ) );
		perch_query_asset( 'js', array( 'jquery', 'magnific-popup', 'perch-options-page' ) );
		return '<div id="perch-examples-screen">' . implode( '', $output ) . '</div>' . $preview . $open . $nonce;
	}

	public static function cheatsheet( $field, $config ) {
		// Prepare print button
		$print = '<div><a href="javascript:;" id="perch-cheatsheet-print" class="perch-cheatsheet-switch button button-primary button-large">' . __( 'Printable version', 'perch' ) . '</a><div id="perch-cheatsheet-print-head"><h1>' . __( 'Perch Shortcodes', 'perch' ) . ': ' . __( 'Cheatsheet', 'perch' ) . '</h1><a href="javascript:;" class="perch-cheatsheet-switch">&larr; ' . __( 'Back to Dashboard', 'perch' ) . '</a></div></div>';
		// Prepare table array
		$table = array();
		// Table start
		$table[] = '<table><tr><th style="width:20%;">' . __( 'Shortcode', 'perch' ) . '</th><th style="width:50%">' . __( 'Attributes', 'perch' ) . '</th><th style="width:30%">' . __( 'Example code', 'perch' ) . '</th></tr>';
		// Loop through shortcodes
		foreach ( (array) Tp_Data::shortcodes() as $name => $shortcode ) {
			// Prepare vars
			$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
			$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
			$attributes = array();
			$example = array();
			$icons = 'icon: music, icon: envelope &hellip; <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'full list', 'perch' ) . '</a>';
			// Loop through attributes
			if ( is_array( $shortcode['atts'] ) )
				foreach ( $shortcode['atts'] as $id => $data ) {
					// Prepare default value
					$default = ( isset( $data['default'] ) && $data['default'] !== '' ) ? '<p><em>' . __( 'Default value', 'perch' ) . ':</em> ' . $data['default'] . '</p>' : '';
					// Check type is set
					if ( empty( $data['type'] ) ) $data['type'] = 'text';
					// Switch attribute types
					switch ( $data['type'] ) {
						// Select
					case 'select':
						$value = implode( ', ', array_keys( $data['values'] ) );
						break;
						// Slider and number
					case 'slider':
					case 'number':
						$value = $data['min'] . '&hellip;' . $data['max'];
						break;
						// Bool
					case 'bool':
						$value = 'yes | no';
						break;
						// Icon
					case 'icon':
						$value = $icons;
						break;
						// Color
					case 'color':
						$value = __( '#RGB and rgba() colors' );
						break;
						// Default value
					default:
						$value = $data['default'];
						break;
					}
					// Check empty value
					if ( $value === '' ) $value = __( 'Any text value', 'perch' );
					// Extra CSS class
					if ( $id === 'class' ) $value = __( 'Any custom CSS classes', 'perch' );
					// Add attribute
					$attributes[] = '<div class="perch-shortcode-attribute"><strong>' . $data['name'] . ' <em>&ndash; ' . $id . '</em></strong><p><em>' . __( 'Possible values', 'perch' ) . ':</em> ' . $value . '</p>' . $default . '</div>';
					// Add attribute to the example code
					$example[] = $id . '="' . $data['default'] . '"';
				}
			// Prepare example code
			$example = '[%prefix_' . $name . ' ' . implode( ' ', $example ) . ']';
			// Prepare content value
			if ( empty( $shortcode['content'] ) ) $shortcode['content'] = '';
			// Add wrapping code
			if ( $shortcode['type'] === 'wrap' ) $example .= esc_textarea( $shortcode['content'] ) . '[/%prefix_' . $name . ']';
			// Change compatibility prefix
			$example = str_replace( array( '%prefix_', '__' ), perch_cmpt(), $example );
			// Shortcode
			$table[] = '<td>' . '<span class="perch-shortcode-icon">' . Tp_Tools::icon( $icon ) . '</span>' . $shortcode['name'] . '<br/><em class="perch-shortcode-desc">' . $shortcode['desc'] . '</em></td>';
			// Attributes
			$table[] = '<td>' . implode( '', $attributes ) . '</td>';
			// Example code
			$table[] = '<td><code contenteditable="true">' . $example . '</code></td></tr>';
		}
		// Table end
		$table[] = '</table>';
		// Query assets
		perch_query_asset( 'css', array( 'font-awesome', 'perch-cheatsheet' ) );
		perch_query_asset( 'js', array( 'jquery', 'perch-options-page' ) );
		// Return output
		return '<div id="perch-cheatsheet-screen">' . $print . implode( '', $table ) . '</div>';
	}

	
}
