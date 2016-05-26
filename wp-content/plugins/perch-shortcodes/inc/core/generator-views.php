<?php
/**
 * Shortcode Generator
 */
class Tp_Generator_Views {

	/**
	 * Constructor
	 */
	function __construct() {}

	public static function text( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'default' => ''
		) );
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr" />';
		return $return;
	}

	public static function textarea( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'rows'    => 3,
			'default' => ''
		) );
		$return = '<textarea name="' . $id . '" id="perch-generator-attr-' . $id . '" rows="' . $field['rows'] . '" class="perch-generator-attr">' . esc_textarea( $field['default'] ) . '</textarea>';
		return $return;
	}

	public static function select( $id, $field ) {
		// Multiple selects
		$multiple = ( isset( $field['multiple'] ) ) ? ' multiple' : '';
		$return = '<select name="' . $id . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr"' . $multiple . '>';
		// Create options
		foreach ( $field['values'] as $option_value => $option_title ) {
			// Is this option selected
			$selected = ( $field['default'] === $option_value ) ? ' selected="selected"' : '';
			// Create option
			$return .= '<option value="' . $option_value . '"' . $selected . '>' . $option_title . '</option>';
		}
		$return .= '</select>';
		return $return;
	}

	public static function bool( $id, $field ) {
		$return = '<span class="perch-generator-switch perch-generator-switch-' . $field['default'] . '"><span class="perch-generator-yes">' . __( 'Yes', 'perch' ) . '</span><span class="perch-generator-no">' . __( 'No', 'perch' ) . '</span></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr perch-generator-switch-value" />';
		return $return;
	}

	public static function upload( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr perch-generator-upload-value" /><div class="perch-generator-field-actions"><a href="javascript:;" class="button perch-generator-upload-button"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'perch' ) . '" />' . __( 'Media manager', 'perch' ) . '</a></div>';
		return $return;
	}

	public static function icon( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr perch-generator-icon-picker-value" /><div class="perch-generator-field-actions"><a href="javascript:;" class="button perch-generator-upload-button perch-generator-field-action"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'perch' ) . '" />' . __( 'Media manager', 'perch' ) . '</a> <a href="javascript:;" class="button perch-generator-icon-picker-button perch-generator-field-action"><img src="' . admin_url( '/images/media-button-other.gif' ) . '" alt="' . __( 'Icon picker', 'perch' ) . '" />' . __( 'Icon picker', 'perch' ) . '</a></div><div class="perch-generator-icon-picker perch-generator-clearfix"><input type="text" class="widefat" placeholder="' . __( 'Filter icons', 'perch' ) . '" /></div>';
		return $return;
	}

	public static function color( $id, $field ) {
		$return = '<span class="perch-generator-select-color"><span class="perch-generator-select-color-wheel"></span><input type="text" name="' . $id . '" value="' . $field['default'] . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr perch-generator-select-color-value" /></span>';
		return $return;
	}

	public static function gallery( $id, $field ) {
		$shult = shortcodes_ultimate();
		// Prepare galleries list
		$galleries = $shult->get_option( 'galleries' );
		$created = ( is_array( $galleries ) && count( $galleries ) ) ? true : false;
		$return = '<select name="' . $id . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr" data-loading="' . __( 'Please wait', 'perch' ) . '">';
		// Check that galleries is set
		if ( $created ) // Create options
			foreach ( $galleries as $g_id => $gallery ) {
				// Is this option selected
				$selected = ( $g_id == 0 ) ? ' selected="selected"' : '';
				// Prepare title
				$gallery['name'] = ( $gallery['name'] == '' ) ? __( 'Untitled gallery', 'perch' ) : stripslashes( $gallery['name'] );
				// Create option
				$return .= '<option value="' . ( $g_id + 1 ) . '"' . $selected . '>' . $gallery['name'] . '</option>';
			}
		// Galleries not created
		else
			$return .= '<option value="0" selected>' . __( 'Galleries not found', 'perch' ) . '</option>';
		$return .= '</select><small class="description"><a href="' . $shult->admin_url . '#tab-3" target="_blank">' . __( 'Manage galleries', 'perch' ) . '</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="perch-generator-reload-galleries">' . __( 'Reload galleries', 'perch' ) . '</a></small>';
		return $return;
	}

	public static function number( $id, $field ) {
		$return = '<input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="perch-generator-attr" />';
		return $return;
	}

	public static function slider( $id, $field ) {
		$return = '<div class="perch-generator-range-picker perch-generator-clearfix"><input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="perch-generator-attr" /></div>';
		return $return;
	}

	public static function shadow( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', '0', '0', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$return = '<div class="perch-generator-shadow-picker"><span class="perch-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="perch-generator-sp-hoff" /><small>' . __( 'Horizontal offset', 'perch' ) . ' (px)</small></span><span class="perch-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[1] . '" class="perch-generator-sp-voff" /><small>' . __( 'Vertical offset', 'perch' ) . ' (px)</small></span><span class="perch-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[2] . '" class="perch-generator-sp-blur" /><small>' . __( 'Blur', 'perch' ) . ' (px)</small></span><span class="perch-generator-shadow-picker-field perch-generator-shadow-picker-color"><span class="perch-generator-shadow-picker-color-wheel"></span><input type="text" value="' . $defaults[3] . '" class="perch-generator-shadow-picker-color-value" /><small>' . __( 'Color', 'perch' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr" /></div>';
		return $return;
	}

	public static function border( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', 'solid', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$borders = Tp_Tools::select( array(
				'options' => Tp_Data::borders(),
				'class' => 'perch-generator-bp-style',
				'selected' => $defaults[1]
			) );
		$return = '<div class="perch-generator-border-picker"><span class="perch-generator-border-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="perch-generator-bp-width" /><small>' . __( 'Border width', 'perch' ) . ' (px)</small></span><span class="perch-generator-border-picker-field">' . $borders . '<small>' . __( 'Border style', 'perch' ) . '</small></span><span class="perch-generator-border-picker-field perch-generator-border-picker-color"><span class="perch-generator-border-picker-color-wheel"></span><input type="text" value="' . $defaults[2] . '" class="perch-generator-border-picker-color-value" /><small>' . __( 'Border color', 'perch' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr" /></div>';
		return $return;
	}

	public static function image_source( $id, $field ) {
		$field = wp_parse_args( $field, array(
				'default' => 'none'
			) );
		$sources = Tp_Tools::select( array(
				'options'  => array(
					'media'         => __( 'Media library', 'perch' ),
					'posts: recent' => __( 'Recent posts', 'perch' ),
					'category'      => __( 'Category', 'perch' ),
					'taxonomy'      => __( 'Taxonomy', 'perch' )
				),
				'selected' => '0',
				'none'     => __( 'Select images source', 'perch' ) . '&hellip;',
				'class'    => 'perch-generator-isp-sources'
			) );
		$categories = Tp_Tools::select( array(
				'options'  => Tp_Tools::get_terms( 'category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'perch-generator-isp-categories'
			) );
		$taxonomies = Tp_Tools::select( array(
				'options'  => Tp_Tools::get_taxonomies(),
				'none'     => __( 'Select taxonomy', 'perch' ) . '&hellip;',
				'selected' => '0',
				'class'    => 'perch-generator-isp-taxonomies'
			) );
		$terms = Tp_Tools::select( array(
				'class'    => 'perch-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			) );
		$return = '<div class="perch-generator-isp">' . $sources . '<div class="perch-generator-isp-source perch-generator-isp-source-media"><div class="perch-generator-clearfix"><a href="javascript:;" class="button button-primary perch-generator-isp-add-media"><i class="fa fa-plus"></i>&nbsp;&nbsp;' . __( 'Add images', 'perch' ) . '</a></div><div class="perch-generator-isp-images perch-generator-clearfix"><em class="description">' . __( 'Click the button above and select images.<br>You can select multimple images with Ctrl (Cmd) key', 'perch' ) . '</em></div></div><div class="perch-generator-isp-source perch-generator-isp-source-category"><em class="description">' . __( 'Select categories to retrieve posts from.<br>You can select multiple categories with Ctrl (Cmd) key', 'perch' ) . '</em>' . $categories . '</div><div class="perch-generator-isp-source perch-generator-isp-source-taxonomy"><em class="description">' . __( 'Select taxonomy and it\'s terms.<br>You can select multiple terms with Ctrl (Cmd) key', 'perch' ) . '</em>' . $taxonomies . $terms . '</div><input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="perch-generator-attr-' . $id . '" class="perch-generator-attr" /></div>';
		return $return;
	}

}
