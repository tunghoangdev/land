<?php
class Tp_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

	public static function testimonial( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'name'		=> 'Jhone doe',
			'title'		=> 'Marketing maneger',
			'website'	=> 'http://themeperch.net',
			'image'		=> plugins_url( 'assets/images/testimonial.jpg', TP_PLUGIN_FILE ),
		), $atts, 'testimonial' ) ;

		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/testimonial', $atts );

		$html = '<div class="single-feedback">
				<div class="client-pic">';
				if($atts['image'] !=''){				
					$image = perch_image_resize($atts['image'], 71, 71);
					$html .= '<img src="'.$image['url'].'" alt="'.$atts['name'].'">';
				} else {
					$html .= '<img src=" http://placehold.it/71x71" alt="client image">';
				}
				$html .= '</div>
				<div class="box">
					<p class="message">'.do_shortcode($content).'</p>
				</div>
				<div class="client-info">
					<div class="client-name colored-text strong">'.$atts['name'].'</div>
					<div class="company">'.$atts['title'].'</div>
				</div>
			</div>';
		return $html;
	}

	public static function clients_logo( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'source'		=> '',
		), $atts, 'clients_logo' ) ;

		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/clients_logo', $atts );
		$slides = (array) Tp_Tools::get_slides( $atts );

		$output = '';
		if(!empty($slides)){
			$output = '<ul class="client-logos list-inline">';			
			foreach ($slides as $slide) {
				$output .= ($slide['image'] != '')? '<li><a href="'.$slide['image'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"></a></li>' : '';
			}			
			$output .= '</ul>';
		}
		return $output;
	}

	public static function carousel( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'thumb_width'	=> 400,
			'thumb_height'	=> 272,
			'source'		=> 'none',
			'items' 		=> 3,
		), $atts, 'carousel' ) ;
		perch_query_asset( 'css', 'landx-styles' );
		perch_query_asset( 'js', 'landx-styles' );
		do_action( 'perch/shortcode/carousel', $atts );
		$slides = (array) Tp_Tools::get_slides( $atts );

		$output = '';
		if(!empty($slides)){
			$output = '<div class="row screenshots perch-screenshots"><div data-item="'.$atts['items'].'" class="owl-carousel owl-theme">';		
				foreach ($slides as $slide) {
					$image = perch_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height']);
					$output .= '<div class="shot">
								<a href="'.$slide['image'].'" data-lightbox-gallery="screenshots-gallery"><img src="'.$image['url'].'" alt="'.$slide['title'].'"></a>
							</div>';
				}			
			$output .= '</div></div>';
		}
		return $output;
	}
	public static function skillbar( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'title'			=> '',
			'percentage'	=> 50,
			'color'			=> '#6adcfa',
			'show_percent'	=> 'yes',
		), $atts, 'skillbar' ) ;
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		do_action( 'perch/shortcode/skillbar', $atts );

		// Enque scripts
		wp_enqueue_script('perch_skillbar');
		
		// Display the skillbar	';
		$output = '<div class="perch-skillbar perch-clearfix perch-all" data-percent="'. intval( $atts['percentage'] ) .'%">';
		$output .= ( $atts['title'] !== '' )? '<div class="perch-skillbar-title" style="background: '. $atts['color'] .';"><span>'. $atts['title'] .'</span></div>': '';
		$output .= '<div class="perch-skillbar-bar" style="background: '. $atts['color'] .';"></div>';
		$output .= ( $atts['show_percent'] == 'yes' )? '<div class="perch-skill-bar-percent">'.$atts['percentage'].'%</div>' : '';
		$output .= '</div>';
		
		return $output;
	}

	public static function spacing( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'size'	=> 20,
			'class'	=> '',
		), $atts, 'spacing' ) ;
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		do_action( 'perch/shortcode/spacing', $atts );
		return '<hr class="perch-spacing '. $atts['class'] .'" style="height: '. intval($atts['size']) .'px" />';
	}	
	
	
	public static function toggle( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'name'		=> '',
			'title'		=> 'Title',
			'website'	=> '',
			'image'		=> '',
		), $atts, 'toggle' ) ;
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		do_action( 'perch/shortcode/testimonial', $atts );
		return '<div class="perch-heading perch-heading-style-' . $atts['style'] . ' perch-heading-align-' . $atts['align'] . perch_ecssc( $atts ) . '" style="margin-bottom:' . $atts['margin'] . 'px"><h'. $atts['size'] .' class="perch-heading-inner">' . esc_attr($atts['title']) . '</h'. $atts['size'] .'><div class="heading-subtitle">'.do_shortcode( $content ).'</div></div>';
	}

	public static function feature_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'icon'		=> 'icon: lnr lnr-smile',
			'title'		=> 'Sample Title',
		), $atts, 'feature_list' ) ;
		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/feature_list', $atts );
		if ( $atts['icon'] ) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<span class="' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></span>';
				perch_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		return '<div class="feature-list-1">
				<div class="icon-container pull-left">'.$icon.'</span></div>
				<h6>' . $atts['title'] . '</h6>
				<p>'.do_shortcode($content).'</p></div>';
	}


	public static function feature( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'icon'		=> 'icon: lnr lnr-smile',
			'title'		=> 'Sample Title',
		), $atts, 'feature' ) ;
		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/feature', $atts );
		if ( $atts['icon'] ) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<span class="' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></span>';
				perch_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		return '<div class="feature text-center">
				<div class="icon">'.$icon.'</div>
				<h4>' . $atts['title'] . '</h4><p>'.do_shortcode($content).'</p></div>';
	}

	public static function service( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'icon'		=> 'icon: lnr lnr-smile',
			'title'		=> '24/7 Chat Support',
		), $atts, 'service' ) ;
		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/service', $atts );
		if ( $atts['icon'] ) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<span class="' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></span>';
				perch_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		$content = ($content != '')?'<p>'.do_shortcode($content).'</p>': '';
		return '<div class="service text-center"><h5>'.$icon.'&nbsp; ' . $atts['title'] . '</h5>'.$content.'</div>';
	}
	public static function box( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'color'		=> '#fff',
			'bg_color'	=> '#ccc',
			'float'		=> 'center',
			'text_align'=> 'left',
			'width'		=> 100,
			'margin_top'=> 10,
			'margin_bottom'	=> 10,
			'class'		=> '',
			'visibility'=> 'all',
			'fade_in'	=> '',
		), $atts, 'box' ) ;		
		do_action( 'perch/shortcode/box', $atts );

		perch_query_asset( 'css', 'landx_shortcodes' );
		$fade_in_class = NULL;
		if ( $atts['fade_in'] == 'true' ) {
			perch_query_asset( 'js', 'landx_scroll_fade' );
			$fade_in_class = 'perch-fadein';
		}
		$style_attr = '';
		$style_attr .= ( $atts['margin_bottom'] ) ? 'margin-bottom: '. $atts['margin_bottom'] .'px;' : '';
		$style_attr .= ( $atts['margin_top'] )? 'margin-top: '. $atts['margin_top'] .'px;' : '';	
		$style_attr .= ( $atts['color'] ) ? 'color:'. $atts['color'] .';' : '';
		$style_attr .= ( $atts['bg_color'] ) ? 'background-color:'. $atts['bg_color'] .';' : '';

		$alert_content = '';
		$alert_content .= '<div class="perch-box '. $fade_in_class .'  ' . $atts['color'] . ' '.$atts['float'].' '. $atts['class'] .' perch-'. $atts['visibility'] .'" style="text-align:'. $atts['text_align'] .'; width:'. $atts['width'] .'%;'. $style_attr .'">';
		$alert_content .= ' '. do_shortcode($content) .'</div>';
		
		return $alert_content;
	}
	public static function social( $atts = null, $content = null ) {
		$social = array();
		$social['title'] = 'Follow Us';
		for($i=1; $i<=6; $i++){
			$social['icon'.$i]= '';
			$social['title'.$i]= '';
			$social['url'.$i]= 'http://themeperch.net';
		}
		
		$atts = shortcode_atts( $social, $atts, 'social' ) ;
		perch_query_asset( 'css', 'landx-styles' );

		$output = ($atts['title'] != '')? '<h6>'.$atts['title'].': </h6>': '';
		$output .= '<ul class="social-icons">';

		for($i=1; $i<=6; $i++){
			if ( $atts['icon'.$i] ) {
				if ( strpos( $atts['icon'.$i], 'icon:' ) !== false ) {
					$icon = '<span class="' . trim( str_replace( 'icon:', '', $atts['icon'.$i] ) ) . '"></span>';
					perch_query_asset( 'css', 'font-awesome' );
				}
				else $icon = '<img src="' . $atts['icon'.$i] . '" alt="'.$atts['title'.$i].'" style="' . implode( $img_css, ';' ) . '" />';
			}else{
				$icon = '';
			} 
			
			$output .= ($icon != '')? '<li><a title="'.$atts['title'.$i].'" target="_blank" href="'.$atts['url'.$i].'">'.$icon.'</a></li>' : '';
		}

		$output .= '</ul>';

		return $output;
	}

	//create me

	public static function highlight( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'color'      => '#6adcfa',
				'visibility' => 'all',
				'class'      => ''
			), $atts, 'highlight' );
		if ( $atts['bg'] !== null ) $atts['background'] = $atts['bg'];
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<span class="perch-highlight' . perch_ecssc( $atts ) . '" style="background:' . $atts['visibility'] . ';color:' . $atts['color'] . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';
	}
	public static function heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			
			'title'		=> 'Sample Heading',
			'heading_icon_left'=> '',
			'heading_icon_right'=> '',
			'type'		=> 'h3',
			'text_align'=> 'left',
			'style'		=> 'colored-line',
			'margin_top'=> 10,
			'margin_bottom'=> 10,
			'class'		=> '',
			//'font_size'	=> 14,
			'color'		=> '#323232',
			'sub_heading_color'=> '#727272',
		), $atts, 'heading' ) ;
		perch_query_asset( 'css', 'landx_shortcodes' );
		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/heading', $atts );

		$style_attr = '';
		/*if ( $atts['font_size'] ) {
			$style_attr .= 'font-size: '. $atts['font_size'] .'px;';
		}*/
		
		if ( $atts['color'] ) {
			$style_attr .= 'color: '. $atts['color'] .';';
		}
		if( $atts['margin_bottom']) {
			$style_attr .= 'margin-bottom: '. intval($atts['margin_bottom']) .'px;';
		}
		if ( $atts['$margin_top'] ) {
			$style_attr .= 'margin-top: '. intval($atts['$margin_top']) .'px;';
		}
		
		if ( $atts['text_align'] ) {
			$text_align = 'text-align-'. $atts['text_align'];
		} else {
			$text_align = 'text-align-left';
		}

		if ( $atts['sub_heading_color'] ) {
			$sub_style_attr = 'color: '. $atts['sub_heading_color'] .';';
		}

		$heading_icon_left = str_replace("|"," ",$atts['heading_icon_left']) ;
		$heading_icon_right = str_replace("|"," ",$atts['heading_icon_right']) ;
		
	 	$output = '<'.$atts['type'].' class="perch-heading perch-heading-'. $atts['style'] .' '. $text_align.' '. $atts['class'] .'" style="'.$style_attr.'"><span>';
		if ( $atts['heading_icon_left'] !== '' && $atts['heading_icon_left'] !== 'none' ) $output .= '<i class="perch-heading-icon-left '. $atts['heading_icon_left'] .'"></i>';
			$output .= $atts['title'];
		if ( $atts['heading_icon_right'] !== '' && $atts['heading_icon_right'] !== 'none' ) $output .= '<i class="perch-heading-icon-right '. $atts['heading_icon_right'] .'"></i>';
		$output .= '</span></'.$atts['type'].'>';
		$output .= ($atts['style'] == 'colored-line')? '<div class="colored-line '.$text_align.'"></div>' : '';
		$output .= '<div class="sub-heading '.$text_align.'" style="'.$sub_style_attr.'">'. do_shortcode($content) .'</div>';
		
		return $output;
	}
	public static function callout( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'fade_in'		=> '',
			'button_text'	=> 'Sample button',
			'button_color'	=> '#323232',
			'button_bg_color'=> '#fff',
			'button_size'	=> 'default',
			'button_type'	=> 'standard-button',
			'button_icon_left'=> '',
			'button_icon_right'	=> '',
			'button_url'	=> 'http://themeperch.net',
			'button_rel'	=> '',
			'button_target'	=> '',
		), $atts, 'callout' ) ;
		perch_query_asset( 'css', 'landx_shortcodes' );
		perch_query_asset( 'css', 'landx-styles' );
		do_action( 'perch/shortcode/callout', $atts );
		$fade_in_class = NULL;
		if ( $atts['fade_in'] == 'true' ) {
			perch_query_asset( 'js', 'landx_scroll_fade' );
			$fade_in_class = 'perch-fadein';
		}
		$icon_left = str_replace("|"," ",$atts['button_icon_left']) ;
		$icon_right = str_replace("|"," ",$atts['button_icon_right']) ;

		$output = '<div class="perch-callout perch-clearfix '. $class .' perch-'. $visibility .' '. $fade_in_class .'">';

		if ( $atts['button_text'] !== '' ) {
			$output .= '<div class="perch-callout-button">';
				$output .='<a href="'. esc_url($atts['button_url']) .'" title="'. $atts['button_text'] .'" target="_'. $atts['button_target'] .'" class="btn '. $atts['button_size'] .' '. $atts['button_type'] .'"><span class="perch-button-inner">';
				if ( $atts['button_icon_left'] !== '' && $atts['button_icon_left'] !== 'none' ) {
					$output .= '<i class="perch-callout-icon-left '. $atts['button_icon_left'] .'"></i>';
				}
				$output .= $atts['button_text'];
				if ( $atts['button_icon_right'] !== '' && $atts['button_icon_right'] !== 'none' ) {
					$output .= '<i class="perch-callout-icon-right '. $atts['button_icon_right'] .'"></i>';
				}
			$output .='</span></a>';
			$output .='</div>';
		}
		
		$output .= '<div class="perch-callout-caption">';

			$output .= do_shortcode ( $content );
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}

	public static function tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'vertical' => 'no',
				'style'    => 'default', // 3.x
				'center' => 'no',
				'class'    => ''
			), $atts, 'tabs' );
		if ( $atts['style'] === '3' ) $atts['vertical'] = 'yes';
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();
		if ( is_array( self::$tabs ) ) {
			if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
			foreach ( self::$tabs as $tab ) {
				$tabs[] = '<span class="' . perch_ecssc( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . '>' . perch_scattr( $tab['title'] ) . '</span>';
				$panes[] = '<div class="perch-tabs-pane perch-clearfix' . perch_ecssc( $tab ) . '">' . $tab['content'] . '</div>';
			}
			$atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' perch-tabs-vertical' : ' perch-tabs-horizontal';
			$center = ( ($atts['vertical'] === 'no') && ($atts['center'] === 'yes') ) ? ' text-center' : '';
			$return = '<div class="perch-tabs perch-tabs-style-' . $atts['style'] . $atts['vertical'] . perch_ecssc( $atts ) . '" data-active="' . (string) $atts['active'] . '"><div class="perch-tabs-nav'.$center.'">' . implode( '', $tabs ) . '</div><div class="perch-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		perch_query_asset( 'css', 'genericons' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		do_action( 'perch/shortcode/tabs', $atts );
		return $return;
	}

	public static function tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => __( 'Tab title', 'perch' ),
				'disabled' => 'no',
				'anchor'   => '',
				'url'      => '',
				'target'   => 'blank',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'title'    => $atts['title'],
			'content'  => do_shortcode( $content ),
			'disabled' => ( $atts['disabled'] === 'yes' ) ? ' perch-tabs-disabled' : '',
			'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
			'url'      => ' data-url="' . $atts['url'] . '"',
			'target'   => ' data-target="' . $atts['target'] . '"',
			'class'    => $atts['class']
		);
		self::$tab_count++;
		do_action( 'perch/shortcode/tab', $atts );
	}

	public static function spoiler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => __( 'Spoiler title', 'perch' ),
				'open'   => 'no',
				'style'  => 'default',
				'icon'   => 'plus',
				'anchor' => '',
				'class'  => ''
			), $atts, 'spoiler' );
		$atts['style'] = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
		$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
		if ( $atts['open'] !== 'yes' ) $atts['class'] .= ' perch-spoiler-closed';
		perch_query_asset( 'css', 'font-awesome' );
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		do_action( 'perch/shortcode/spoiler', $atts );
		return '<div class="perch-spoiler perch-spoiler-style-' . $atts['style'] . ' perch-spoiler-icon-' . $atts['icon'] . perch_ecssc( $atts ) . '"' . $atts['anchor'] . '><div class="perch-spoiler-title"><span class="perch-spoiler-icon"></span>' . perch_scattr( $atts['title'] ) . '</div><div class="perch-spoiler-content perch-clearfix" style="display:none">' . perch_do_shortcode( $content, 's' ) . '</div></div>';
	}

	public static function accordion( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		do_action( 'perch/shortcode/accordion', $atts );
		return '<div class="perch-accordion' . perch_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function divider( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'top'           => 'yes',
				'text'          => __( 'Go to top', 'perch' ),
				'style'         => 'default',
				'divider_color' => '#999999',
				'link_color'    => '#999999',
				'size'          => '3',
				'margin'        => '15',
				'class'         => ''
			), $atts, 'divider' );
		// Prepare TOP link
		$top = ( $atts['top'] === 'yes' ) ? '<a href="#" style="color:' . $atts['link_color'] . '">' . perch_scattr( $atts['text'] ) . '</a>' : '';
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<div class="perch-divider perch-divider-style-' . $atts['style'] . perch_ecssc( $atts ) . '" style="margin:' . $atts['margin'] . 'px 0;border-width:' . $atts['size'] . 'px;border-color:' . $atts['divider_color'] . '">' . $top . '</div>';
	}

	public static function spacer( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'  => '20',
				'class' => ''
			), $atts, 'spacer' );
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<div class="perch-spacer' . perch_ecssc( $atts ) . '" style="height:' . (string) $atts['size'] . 'px"></div>';
	}


	public static function label( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'  => 'default',
				'style' => null, // 3.x
				'class' => ''
			), $atts, 'label' );
		if ( $atts['style'] !== null ) $atts['type'] = $atts['style'];
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<span class="perch-label perch-label-type-' . $atts['type'] . perch_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function quote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'cite'  => false,
				'url'   => false,
				'class' => ''
			), $atts, 'quote' );
		$cite_link = ( $atts['url'] && $atts['cite'] ) ? '<a href="' . $atts['url'] . '" target="_blank">' . $atts['cite'] . '</a>'
		: $atts['cite'];
		$cite = ( $atts['cite'] ) ? '<span class="perch-quote-cite">' . $cite_link . '</span>' : '';
		$cite_class = ( $atts['cite'] ) ? ' perch-quote-has-cite' : '';
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		do_action( 'perch/shortcode/quote', $atts );
		return '<div class="perch-quote perch-quote-style-' . $atts['style'] . $cite_class . perch_ecssc( $atts ) . '"><div class="perch-quote-inner perch-clearfix">' . do_shortcode( $content ) . perch_scattr( $cite ) . '</div></div>';
	}

	public static function pullquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'align' => 'left',
				'class' => ''
			), $atts, 'pullquote' );
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		return '<div class="perch-pullquote perch-pullquote-align-' . $atts['align'] . perch_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'size'  => 3,
				'class' => ''
			), $atts, 'dropcap' );
		$atts['style'] = str_replace( array( '1', '2', '3' ), array( 'default', 'light', 'default' ), $atts['style'] ); // 3.x
		// Calculate font-size
		$em = $atts['size'] * 0.5 . 'em';
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<span class="perch-dropcap perch-dropcap-style-' . $atts['style'] . perch_ecssc( $atts ) . '" style="font-size:' . $em . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function frame( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'align' => 'left',
				'class' => ''
			), $atts, 'frame' );
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return '<span class="perch-frame perch-frame-align-' . $atts['align'] . ' perch-frame-style-' . $atts['style'] . perch_ecssc( $atts ) . '"><span class="perch-frame-inner">' . do_shortcode( $content ) . '</span></span>';
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts );
		return '<div class="perch-row' . perch_ecssc( $atts ) . '">' . perch_do_shortcode( $content, 'r' ) . '</div>';
	}

	public static function column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'   => '1/2',
				'center' => 'no',
				'last'   => null,
				'class'  => ''
			), $atts, 'column' );
		if ( $atts['last'] !== null && $atts['last'] == '1' ) $atts['class'] .= ' perch-column-last';
		if ( $atts['center'] === 'yes' ) $atts['class'] .= ' perch-column-centered';
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		return '<div class="perch-column perch-column-size-' . str_replace( '/', '-', $atts['size'] ) . perch_ecssc( $atts ) . '"><div class="perch-column-inner perch-clearfix">' . perch_do_shortcode( $content, 'c' ) . '</div></div>';
	}

	public static function perch_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'icon' => 'icon: star',
				'icon_color' => '#333',
				'style' => null,
				'class' => ''
			), $atts, 'list' );
		// Backward compatibility // 4.2.3+
		if ( $atts['style'] !== null ) {
			switch ( $atts['style'] ) {
			case 'star':
				$atts['icon'] = 'icon: star';
				$atts['icon_color'] = '#ffd647';
				break;
			case 'arrow':
				$atts['icon'] = 'icon: arrow-right';
				$atts['icon_color'] = '#00d1ce';
				break;
			case 'check':
				$atts['icon'] = 'icon: check';
				$atts['icon_color'] = '#17bf20';
				break;
			case 'cross':
				$atts['icon'] = 'icon: remove';
				$atts['icon_color'] = '#ff142b';
				break;
			case 'thumbs':
				$atts['icon'] = 'icon: thumbs-o-up';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'link':
				$atts['icon'] = 'icon: external-link';
				$atts['icon_color'] = '#5c5c5c';
				break;
			case 'gear':
				$atts['icon'] = 'icon: cog';
				$atts['icon_color'] = '#ccc';
				break;
			case 'time':
				$atts['icon'] = 'icon: time';
				$atts['icon_color'] = '#a8a8a8';
				break;
			case 'note':
				$atts['icon'] = 'icon: edit';
				$atts['icon_color'] = '#f7d02c';
				break;
			case 'plus':
				$atts['icon'] = 'icon: plus-sign';
				$atts['icon_color'] = '#61dc3c';
				break;
			case 'guard':
				$atts['icon'] = 'icon: shield';
				$atts['icon_color'] = '#1bbe08';
				break;
			case 'event':
				$atts['icon'] = 'icon: bullhorn';
				$atts['icon_color'] = '#ff4c42';
				break;
			case 'idea':
				$atts['icon'] = 'icon: sun';
				$atts['icon_color'] = '#ffd880';
				break;
			case 'settings':
				$atts['icon'] = 'icon: cogs';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'twitter':
				$atts['icon'] = 'icon: twitter-sign';
				$atts['icon_color'] = '#00ced6';
				break;
			}
		}
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			perch_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return '<div class="perch-list perch-list-style-' . $atts['style'] . perch_ecssc( $atts ) . '">' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', perch_do_shortcode( $content, 'l' ) ) . '</div>';
	}

	public static function button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'         => get_option( 'home' ),
				'link'        => null, // 3.x
				'target'      => 'self',
				'style'       => 'default',
				'background'  => '#2D89EF',
				'color'       => '#FFFFFF',
				'dark'        => null, // 3.x
				'size'        => 3,
				'wide'        => 'no',
				'center'      => 'no',
				'radius'      => 'auto',
				'icon'        => false,
				'icon_color'  => '#FFFFFF',
				'ts_color'    => null, // Dep. 4.3.2
				'ts_pos'      => null, // Dep. 4.3.2
				'text_shadow' => 'none',
				'desc'        => '',
				'onclick'     => '',
				'rel'         => '',
				'title'       => '',
				'class'       => ''
			), $atts, 'button' );

		if ( $atts['link'] !== null ) $atts['url'] = $atts['link'];
		if ( $atts['dark'] !== null ) {
			$atts['background'] = $atts['color'];
			$atts['color'] = ( $atts['dark'] ) ? '#000' : '#fff';
		}
		if ( is_numeric( $atts['style'] ) ) $atts['style'] = str_replace( array( '1', '2', '3', '4', '5' ), array( 'default', 'glass', 'bubbles', 'noise', 'stroked' ), $atts['style'] ); // 3.x
		// Prepare vars
		$a_css = array();
		$span_css = array();
		$img_css = array();
		$small_css = array();
		$radius = '0px';
		$before = $after = '';
		// Text shadow values
		$shadows = array(
			'none'         => '0 0',
			'top'          => '0 -1px',
			'right'        => '1px 0',
			'bottom'       => '0 1px',
			'left'         => '-1px 0',
			'top-right'    => '1px -1px',
			'top-left'     => '-1px -1px',
			'bottom-right' => '1px 1px',
			'bottom-left'  => '-1px 1px'
		);
		// Common styles for button
		$styles = array(
			'size'     => round( ( $atts['size'] + 7 ) * 1.3 ),
			'ts_color' => ( $atts['ts_color'] === 'light' ) ? perch_hex_shift( $atts['background'], 'lighter', 50 ) : perch_hex_shift( $atts['background'], 'darker', 40 ),
			'ts_pos'   => ( $atts['ts_pos'] !== null ) ? $shadows[$atts['ts_pos']] : $shadows['none']
		);
		// Calculate border-radius
		if ( $atts['radius'] == 'auto' ) $radius = round( $atts['size'] + 2 ) . 'px';
		elseif ( $atts['radius'] == 'round' ) $radius = round( ( ( $atts['size'] * 2 ) + 2 ) * 2 + $styles['size'] ) . 'px';
		elseif ( is_numeric( $atts['radius'] ) ) $radius = intval( $atts['radius'] ) . 'px';
		// CSS rules for <a> tag
		$a_rules = array(
			'color'                 => $atts['color'],
			'background-color'      => $atts['background'],
			'border-color'          => perch_hex_shift( $atts['background'], 'darker', 20 ),
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius
		);
		// CSS rules for <span> tag
		$span_rules = array(
			'color'                 => $atts['color'],
			'padding'               => ( $atts['icon'] ) ? round( ( $atts['size'] ) / 2 + 4 ) . 'px ' . round( $atts['size'] * 2 + 10 ) . 'px' : '0px ' . round( $atts['size'] * 2 + 10 ) . 'px',
			'font-size'             => $styles['size'] . 'px',
			'line-height'           => ( $atts['icon'] ) ? round( $styles['size'] * 1.5 ) . 'px' : round( $styles['size'] * 2 ) . 'px',
			'border-color'          => perch_hex_shift( $atts['background'], 'lighter', 30 ),
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius,
			'text-shadow'           => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-moz-text-shadow'      => $styles['ts_pos'] . ' 1px ' . $styles['ts_color'],
			'-webkit-text-shadow'   => $styles['ts_pos'] . ' 1px ' . $styles['ts_color']
		);
		// Apply new text-shadow value
		if ( $atts['ts_color'] === null && $atts['ts_pos'] === null ) {
			$span_rules['text-shadow'] = $atts['text_shadow'];
			$span_rules['-moz-text-shadow'] = $atts['text_shadow'];
			$span_rules['-webkit-text-shadow'] = $atts['text_shadow'];
		}
		// CSS rules for <img> tag
		$img_rules = array(
			'width'     => round( $styles['size'] * 1.5 ) . 'px',
			'height'    => round( $styles['size'] * 1.5 ) . 'px'
		);
		// CSS rules for <small> tag
		$small_rules = array(
			'padding-bottom' => round( ( $atts['size'] ) / 2 + 4 ) . 'px',
			'color' => $atts['color']
		);
		// Create style attr value for <a> tag
		foreach ( $a_rules as $a_rule => $a_value ) $a_css[] = $a_rule . ':' . $a_value;
		// Create style attr value for <span> tag
		foreach ( $span_rules as $span_rule => $span_value ) $span_css[] = $span_rule . ':' . $span_value;
		// Create style attr value for <img> tag
		foreach ( $img_rules as $img_rule => $img_value ) $img_css[] = $img_rule . ':' . $img_value;
		// Create style attr value for <img> tag
		foreach ( $small_rules as $small_rule => $small_value ) $small_css[] = $small_rule . ':' . $small_value;
		// Prepare button classes
		$classes = array( 'perch-button', 'perch-button-style-' . $atts['style'] );
		// Additional classes
		if ( $atts['class'] ) $classes[] = $atts['class'];
		// Wide class
		if ( $atts['wide'] === 'yes' ) $classes[] = 'perch-button-wide';
		// Prepare icon
		if ( $atts['icon'] ) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<i class="' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $styles['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
				perch_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( $img_css, ';' ) . '" />';
		}
		else $icon = '';
		// Prepare <small> with description
		$desc = ( $atts['desc'] ) ? '<small style="' . implode( $small_css, ';' ) . '">' . perch_scattr( $atts['desc'] ) . '</small>' : '';
		// Wrap with div if button centered
		if ( $atts['center'] === 'yes' ) {
			$before .= '<div class="perch-button-center">';
			$after .= '</div>';
		}
		// Replace icon marker in content,
		// add float-icon class to rearrange margins
		if ( strpos( $content, '%icon%' ) !== false ) {
			$content = str_replace( '%icon%', $icon, $content );
			$classes[] = 'perch-button-float-icon';
		}
		// Button text has no icon marker, append icon to begin of the text
		else $content = $icon . ' ' . $content;
		// Prepare onclick action
		$atts['onclick'] = ( $atts['onclick'] ) ? ' onClick="' . $atts['onclick'] . '"' : '';
		// Prepare rel attribute
		$atts['rel'] = ( $atts['rel'] ) ? ' rel="' . $atts['rel'] . '"' : '';
		// Prepare title attribute
		$atts['title'] = ( $atts['title'] ) ? ' title="' . $atts['title'] . '"' : '';
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		return $before . '<a href="' . perch_scattr( $atts['url'] ) . '" class="' . implode( $classes, ' ' ) . '" style="' . implode( $a_css, ';' ) . '" target="_' . $atts['target'] . '"' . $atts['onclick'] . $atts['rel'] . $atts['title'] . '><span style="' . implode( $span_css, ';' ) . '">' . do_shortcode( stripcslashes( $content ) ) . $desc . '</span></a>' . $after;
	}

	public static function note( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'note_color' => '#FFFF66',
				'text_color' => '#333333',
				'background' => null, // 3.x
				'color'      => null, // 3.x
				'radius'     => '3',
				'class'      => ''
			), $atts, 'note' );
		if ( $atts['color'] !== null ) $atts['note_color'] = $atts['color'];
		if ( $atts['background'] !== null ) $atts['note_color'] = $atts['background'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		return '<div class="perch-note' . perch_ecssc( $atts ) . '" style="border-color:' . perch_hex_shift( $atts['note_color'], 'darker', 10 ) . ';' . $radius . '"><div class="perch-note-inner perch-clearfix" style="background-color:' . $atts['note_color'] . ';border-color:' . perch_hex_shift( $atts['note_color'], 'lighter', 80 ) . ';color:' . $atts['text_color'] . ';' . $radius . '">' . perch_do_shortcode( $content, 'n' ) . '</div></div>';
	}

	public static function expand( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'more_text'  => __( 'Show more', 'perch' ),
				'less_text'  => __( 'Show less', 'perch' ),
				'height'     => '100',
				'hide_less'  => 'no',
				'text_color' => '#333333',
				'link_color' => '#0088FF',
				'link_style' => 'default',
				'link_align' => 'left',
				'more_icon'  => '',
				'less_icon'  => '',
				'class'      => ''
			), $atts, 'expand' );
		// Prepare more icon
		$more_icon = ( $atts['more_icon'] ) ? Tp_Tools::icon( $atts['more_icon'] ) : '';
		$less_icon = ( $atts['less_icon'] ) ? Tp_Tools::icon( $atts['less_icon'] ) : '';
		if ( $more_icon || $less_icon ) perch_query_asset( 'css', 'font-awesome' );
		// Prepare less link
		$less = ( $atts['hide_less'] !== 'yes' ) ? '<div class="perch-expand-link perch-expand-link-less" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $less_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['less_text'] . '</span></a></div>' : '';
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return '<div class="perch-expand perch-expand-collapsed perch-expand-link-style-' . $atts['link_style'] . perch_ecssc( $atts ) . '" data-height="' . $atts['height'] . '"><div class="perch-expand-content" style="color:' . $atts['text_color'] . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="perch-expand-link perch-expand-link-more" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $more_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';
	}

	public static function lightbox( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'src'   => false,
				'type'  => 'iframe',
				'class' => ''
			), $atts, 'lightbox' );
		if ( !$atts['src'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct source', 'perch' ) );
		perch_query_asset( 'css', 'magnific-popup' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'magnific-popup' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return '<span class="perch-lightbox' . perch_ecssc( $atts ) . '" data-mfp-src="' . perch_scattr( $atts['src'] ) . '" data-mfp-type="' . $atts['type'] . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function lightbox_content( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id'         => '',
				'width'      => '50%',
				'margin'     => '40',
				'padding'    => '40',
				'text_align' => 'center',
				'background' => '#FFFFFF',
				'color'      => '#333333',
				'shadow'     => '0px 0px 15px #333333',
				'class'      => ''
			), $atts, 'lightbox_content' );
		perch_query_asset( 'css', 'perch-box-shortcodes' );
		if ( !$atts['id'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct ID for this block. You should use same ID as in the Content source field (when inserting lightbox shortcode)', 'perch' ) );
		$return = '<div class="perch-lightbox-content ' . perch_ecssc( $atts ) . '" id="' . trim( $atts['id'], '#' ) . '" style="display:none;width:' . $atts['width'] . ';margin-top:' . $atts['margin'] . 'px;margin-bottom:' . $atts['margin'] . 'px;padding:' . $atts['padding'] . 'px;background-color:' . $atts['background'] . ';color:' . $atts['color'] . ';box-shadow:' . $atts['shadow'] . ';text-align:' . $atts['text_align'] . '">' . do_shortcode( $content ) . '</div>';
		if ( did_action( 'perch/generator/preview/before' ) ) return '<div class="perch-lightbox-content-preview">' . $return . '</div>';
		else return $return;
	}

	public static function tooltip( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'        => 'yellow',
				'position'     => 'north',
				'shadow'       => 'no',
				'rounded'      => 'no',
				'size'         => 'default',
				'title'        => '',
				'content'      => __( 'Tooltip text', 'perch' ),
				'behavior'     => 'hover',
				'close'        => 'no',
				'class'        => ''
			), $atts, 'tooltip' );
		// Prepare style
		$atts['style'] = ( in_array( $atts['style'], array( 'light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip' ) ) ) ? $atts['style'] : 'plain';
		// Position
		$atts['position'] = str_replace( array( 'top', 'right', 'bottom', 'left' ), array( 'north', 'east', 'south', 'west' ), $atts['position'] );
		$position = array(
			'my' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'bottom center', 'center left', 'top center', 'center right' ), $atts['position'] ),
			'at' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'top center', 'center right', 'bottom center', 'center left' ), $atts['position'] )
		);
		// Prepare classes
		$classes = array( 'perch-qtip qtip-' . $atts['style'] );
		$classes[] = 'perch-qtip-size-' . $atts['size'];
		if ( $atts['shadow'] === 'yes' ) $classes[] = 'qtip-shadow';
		if ( $atts['rounded'] === 'yes' ) $classes[] = 'qtip-rounded';
		// Query assets
		perch_query_asset( 'css', 'qtip' );
		perch_query_asset( 'css', 'perch-other-shortcodes' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'qtip' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return '<span class="perch-tooltip' . perch_ecssc( $atts ) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode( ' ', $classes ) . '" data-title="' . $atts['title'] . '" title="' . esc_attr( $atts['content'] ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function perch_private( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'private' );
		perch_query_asset( 'css', 'perch-other-shortcodes' );
		return ( current_user_can( 'publish_posts' ) ) ? '<div class="perch-private' . perch_ecssc( $atts ) . '"><div class="perch-private-shell">' . do_shortcode( $content ) . '</div></div>' : '';
	}

	public static function media( $atts = null, $content = null ) {
		// Check YouTube video
		if ( strpos( $atts['url'], 'youtu' ) !== false ) return Tp_Shortcodes::youtube( $atts );
		// Check Vimeo video
		elseif ( strpos( $atts['url'], 'vimeo' ) !== false ) return Tp_Shortcodes::vimeo( $atts );
		// Image
		else return '<img src="' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" style="max-width:100%" />';
	}

	public static function youtube( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'youtube' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '?autoplay=1' : '';
		// Create player
		$return[] = '<div class="perch-youtube perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $id . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function youtube_advanced( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$params = array();
		$atts = shortcode_atts( array(
				'url'            => false,
				'width'          => 600,
				'height'         => 400,
				'responsive'     => 'yes',
				'autohide'       => 'alt',
				'autoplay'       => 'no',
				'controls'       => 'yes',
				'fs'             => 'yes',
				'loop'           => 'no',
				'modestbranding' => 'no',
				'playlist'       => '',
				'rel'            => 'yes',
				'showinfo'       => 'yes',
				'theme'          => 'dark',
				'https'          => 'no',
				'wmode'          => '',
				'class'          => ''
			), $atts, 'youtube_advanced' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Prepare params
		foreach ( array( 'autohide', 'autoplay', 'controls', 'fs', 'loop', 'modestbranding', 'playlist', 'rel', 'showinfo', 'theme', 'wmode' ) as $param ) $params[$param] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[$param] );
		// Correct loop
		if ( $params['loop'] === '1' && $params['playlist'] === '' ) $params['playlist'] = $id;
		// Prepare protocol
		$protocol = ( $atts['https'] === 'yes' ) ? 'https' : 'http';
		// Prepare player parameters
		$params = http_build_query( $params );
		// Create player
		$return[] = '<div class="perch-youtube perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="' . $protocol . '://www.youtube.com/embed/' . $id . '?' . $params . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function vimeo( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'vimeo' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '&amp;autoplay=1' : '';
		// Create player
		$return[] = '<div class="perch-vimeo perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function screenr( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'screenr' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*screenr\.com(?:[\/\w]*\/videos?)?\/([a-zA-Z0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Create player
		$return[] = '<div class="perch-screenr perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://screenr.com/embed/' . $id . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function dailymotion( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'autoplay'   => 'no',
				'background' => '#FFC300',
				'foreground' => '#F7FFFD',
				'highlight'  => '#171D1B',
				'logo'       => 'yes',
				'quality'    => '380',
				'related'    => 'yes',
				'info'       => 'yes',
				'class'      => ''
			), $atts, 'dailymotion' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		$id = strtok( basename( $atts['url'] ), '_' );
		// Check that url is specified
		if ( !$id ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Prepare params
		$params = array();
		foreach ( array( 'autoplay', 'background', 'foreground', 'highlight', 'logo', 'quality', 'related', 'info' ) as $param )
			$params[] = $param . '=' . str_replace( array( 'yes', 'no', '#' ), array( '1', '0', '' ), $atts[$param] );
		// Create player
		$return[] = '<div class="perch-dailymotion perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.dailymotion.com/embed/video/' . $id . '?' . implode( '&', $params ) . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'width'    => 'auto',
				'title'    => '',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'audio' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'perch_audio_player_' );
		// Prepare width
		$width = ( $atts['width'] !== 'auto' ) ? 'max-width:' . $atts['width'] : '';
		// Check that url is specified
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		perch_query_asset( 'css', 'perch-players-shortcodes' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'jplayer' );
		perch_query_asset( 'js', 'perch-players-shortcodes' );
		perch_query_asset( 'js', 'perch-players-shortcodes' );
		// Create player
		return '<div class="perch-audio' . perch_ecssc( $atts ) . '" data-id="' . $id . '" data-audio="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TP_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" style="' . $width . '"><div id="' . $id . '" class="jp-jplayer"></div><div id="' . $id . '_container" class="jp-audio"><div class="jp-type-single"><div class="jp-gui jp-interface"><div class="jp-controls"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-stop"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-volume-max"></span></div><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div><div class="jp-current-time"></div><div class="jp-duration"></div></div><div class="jp-title">' . $atts['title'] . '</div></div></div></div>';
	}

	public static function video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'poster'   => false,
				'title'    => '',
				'width'    => 600,
				'height'   => 300,
				'controls' => 'yes',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'video' );
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		$atts['url'] = perch_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'perch_video_player_' );
		// Check that url is specified
		if ( !$atts['url'] ) return Tp_Tools::error( __FUNCTION__, __( 'please specify correct url', 'perch' ) );
		// Prepare title
		$title = ( $atts['title'] ) ? '<div class="jp-title">' . $atts['title'] . '</div>' : '';
		perch_query_asset( 'css', 'perch-players-shortcodes' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'jplayer' );
		perch_query_asset( 'js', 'perch-players-shortcodes' );
		// Create player
		return '<div style="width:' . $atts['width'] . 'px"><div id="' . $id . '" class="perch-video jp-video perch-video-controls-' . $atts['controls'] . perch_ecssc( $atts ) . '" data-id="' . $id . '" data-video="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', TP_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" data-poster="' . $atts['poster'] . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';
	}

	public static function table( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'url'   => false,
				'class' => ''
			), $atts, 'table' );
		$return = '<div class="perch-table perch-table-style-'.$atts['style'] . perch_ecssc( $atts ) . '">';
		$return .= ( $atts['url'] ) ? perch_parse_csv( $atts['url'] ) : do_shortcode( $content );
		$return .= '</div>';
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return $return;
	}

	public static function permalink( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id' => 1,
				'p' => null, // 3.x
				'target' => 'self',
				'class' => ''
			), $atts, 'permalink' );
		if ( $atts['p'] !== null ) $atts['id'] = $atts['p'];
		$atts['id'] = perch_scattr( $atts['id'] );
		// Prepare link text
		$text = ( $content ) ? $content : get_the_title( $atts['id'] );
		return '<a href="' . get_permalink( $atts['id'] ) . '" class="' . perch_ecssc( $atts ) . '" title="' . $text . '" target="_' . $atts['target'] . '">' . $text . '</a>';
	}

	public static function members( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'message'    => __( 'This content is for registered users only. Please %login%.', 'perch' ),
				'color'      => '#ffcc00',
				'style'      => null, // 3.x
				'login_text' => __( 'login', 'perch' ),
				'login_url'  => wp_login_url(),
				'login'      => null, // 3.x
				'class'      => ''
			), $atts, 'members' );
		if ( $atts['style'] !== null ) $atts['color'] = str_replace( array( '0', '1', '2' ), array( '#fff', '#FFFF29', '#1F9AFF' ), $atts['style'] );
		// Check feed
		if ( is_feed() ) return;
		// Check authorization
		if ( !is_user_logged_in() ) {
			if ( $atts['login'] !== null && $atts['login'] == '0' ) return; // 3.x
			// Prepare login link
			$login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';
			perch_query_asset( 'css', 'perch-other-shortcodes' );
			return '<div class="perch-members' . perch_ecssc( $atts ) . '" style="background-color:' . perch_hex_shift( $atts['color'], 'lighter', 50 ) . ';border-color:' .perch_hex_shift( $atts['color'], 'darker', 20 ) . ';color:' .perch_hex_shift( $atts['color'], 'darker', 60 ) . '">' . str_replace( '%login%', $login, perch_scattr( $atts['message'] ) ) . '</div>';
		}
		// Return original content
		else return do_shortcode( $content );
	}

	public static function guests( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'guests' );
		$return = '';
		if ( !is_user_logged_in() && !is_null( $content ) ) {
			perch_query_asset( 'css', 'perch-other-shortcodes' );
			$return = '<div class="perch-guests' . perch_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		}
		return $return;
	}

	public static function feed( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'   => get_bloginfo_rss( 'rss2_url' ),
				'limit' => 3,
				'class' => ''
			), $atts, 'feed' );
		if ( !function_exists( 'wp_rss' ) ) include_once ABSPATH . WPINC . '/rss.php';
		ob_start();
		echo '<div class="perch-feed' . perch_ecssc( $atts ) . '">';
		wp_rss( $atts['url'], $atts['limit'] );
		echo '</div>';
		$return = ob_get_contents();
		ob_end_clean();
		return $return;
	}

	public static function subpages( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'depth' => 1,
				'p'     => false,
				'class' => ''
			), $atts, 'subpages' );
		global $post;
		$child_of = ( $atts['p'] ) ? $atts['p'] : get_the_ID();
		$return = wp_list_pages( array(
				'title_li' => '',
				'echo' => 0,
				'child_of' => $child_of,
				'depth' => $atts['depth']
			) );
		return ( $return ) ? '<ul class="perch-subpages' . perch_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function siblings( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'depth' => 1, 'class' => '' ), $atts, 'siblings' );
		global $post;
		$return = wp_list_pages( array( 'title_li' => '',
				'echo' => 0,
				'child_of' => $post->post_parent,
				'depth' => $atts['depth'],
				'exclude' => $post->ID ) );
		return ( $return ) ? '<ul class="perch-siblings' . perch_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function menu( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => false,
				'class' => ''
			), $atts, 'menu' );
		$return = wp_nav_menu( array(
				'echo'        => false,
				'menu'        => $atts['name'],
				'container'   => false,
				'fallback_cb' => array( __CLASS__, 'menu_fb' ),
				'items_wrap'  => '<ul id="%1$s" class="%2$s' . perch_ecssc( $atts ) . '">%3$s</ul>'
			) );
		return ( $atts['name'] ) ? $return : false;
	}

	public static function menu_fb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'perch' );
	}

	public static function document( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        => '',
				'file'       => null, // 3.x
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'document' );
		if ( $atts['file'] !== null ) $atts['url'] = $atts['file'];
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		return '<div class="perch-document perch-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="perch-document' . perch_ecssc( $atts ) . '"></iframe></div>';
	}

	public static function map( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'latitude' 		=> '51.507207',
				'longitude'		=> "-0.127223",
				'height'        => 280,
				'control'  => 'yes',
				'zoom'  => 16,
				'mapcolor' => 'yes'
			), $atts, 'map' );
		perch_query_asset( 'js', 'perch-map' );

		return '<!-- begin map -->
                    <div class="wt_gMap">
                        <div id="g_map_380" style="height:'.$atts['height'].'px" class="g_map google-map" data-latitude="'.$atts['latitude'].'" data-longitude="'.$atts['longitude'].'" data-control="'.$atts['control'].'" data-zoom="'.$atts['zoom'].'" data-mapcolor="'.$atts['mapcolor'].'"></div>
                    </div>
                    <!-- end map -->';
	}

	public static function gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'address'    => 'New York',
				'class'      => ''
			), $atts, 'gmap' );
		perch_query_asset( 'css', 'perch-media-shortcodes' );
		return '<div class="perch-gmap perch-responsive-media-' . $atts['responsive'] . perch_ecssc( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://maps.google.com/maps?q=' . urlencode( perch_scattr( $atts['address'] ) ) . '&amp;output=embed"></iframe></div>';
	}

	public static function slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 300,
				'responsive' => 'yes',
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'yes',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'slider' );
		// Get slides
		$slides = (array) Tp_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'perch_slider_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' perch-slider-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' perch-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="perch-slider' . $centered . ' perch-slider-pages-' . $atts['pages'] . ' perch-slider-responsive-' . $atts['responsive'] . perch_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '"><div class="perch-slider-slides">';
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop the image
				$image = perch_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="perch-slider-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="perch-slider-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . '><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="perch-slider-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes' ) $return .= '<div class="perch-slider-direction"><span class="perch-slider-prev"></span><span class="perch-slider-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="perch-slider-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				perch_query_asset( 'css', 'magnific-popup' );
				perch_query_asset( 'js', 'magnific-popup' );
			}
			perch_query_asset( 'css', 'perch-galleries-shortcodes' );
			perch_query_asset( 'js', 'jquery' );
			perch_query_asset( 'js', 'swiper' );
			perch_query_asset( 'js', 'perch-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Tp_Tools::error( __FUNCTION__, __( 'images not found', 'perch' ) );
		return $return;
	}

	



	public static function custom_gallery( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'  => 'none',
				'limit'   => 20,
				'gallery' => null, // Dep. 4.4.0
				'link'    => 'none',
				'width'   => 90,
				'height'  => 90,
				'title'   => 'hover',
				'target'  => 'self',
				'class'   => ''
			), $atts, 'custom_gallery' );
		$slides = (array) Tp_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare links target
			$atts['target'] = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' perch-lightbox-gallery';
			// Open gallery
			$return = '<div class="perch-custom-gallery perch-custom-gallery-title-' . $atts['title'] . perch_ecssc( $atts ) . '">';
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop image
				$image = perch_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $slide['title'] ) ? '<span class="perch-custom-gallery-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="perch-custom-gallery-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $atts['target'] . '><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Clear floats
			$return .= '<div class="perch-clear"></div>';
			// Close gallery
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				perch_query_asset( 'css', 'magnific-popup' );
				perch_query_asset( 'js', 'jquery' );
				perch_query_asset( 'js', 'magnific-popup' );
				perch_query_asset( 'js', 'perch-galleries-shortcodes' );
			}
			perch_query_asset( 'css', 'perch-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Tp_Tools::error( __FUNCTION__, __( 'images not found', 'perch' ) );
		return $return;
	}

	public static function posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/default-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no',
				'readmore_text' => ''
			), $atts, 'posts' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			

			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts, $post;		
		$original_posts = $post;

		// Query posts
		$posts = new WP_Query( $args );
		$posts->readmore_text = $atts['readmore_text'];
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( TP_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( TP_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Tp_Tools::error( __FUNCTION__, __( 'template not found', 'tp' ) );
		$output = ob_get_contents();
		ob_end_clean();
		
		// Reset the query
		wp_reset_postdata();
		// Return original posts
		$post = $original_posts;
		$posts = $post;
		
		perch_query_asset( 'css', 'perch-other-shortcodes' );
		return $output;
	}
	
	
	public static function animate( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'      => 'bounceIn',
				'duration'  => 1,
				'delay'     => 0,
				'inline'    => 'no',
				'class'     => ''
			), $atts, 'animate' );
		$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
		$time = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
		$return = '<' . $tag . ' class="perch-animate' . perch_ecssc( $atts ) . '" style="visibility:hidden;' . $time . '" data-animation="' . $atts['type'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
		perch_query_asset( 'css', 'animate' );
		perch_query_asset( 'js', 'jquery' );
		perch_query_asset( 'js', 'inview' );
		perch_query_asset( 'js', 'perch-other-shortcodes' );
		return $return;
	}

	public static function meta( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'key'     => '',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'meta' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="perch-error">Meta: %s</p>', __( 'post ID is incorrect', 'perch' ) );
		// Check key name
		if ( !$atts['key'] ) return sprintf( '<p class="perch-error">Meta: %s</p>', __( 'please specify meta key name', 'perch' ) );
		// Get the meta
		$meta = get_post_meta( $atts['post_id'], $atts['key'], true );
		// Set default value if meta is empty
		if ( !$meta ) $meta = $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $meta = call_user_func( $atts['filter'], $meta );
		// Return result
		return ( $meta ) ? $atts['before'] . $meta . $atts['after'] : '';
	}

	public static function user( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'display_name',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'user_id' => '',
				'filter'  => ''
			), $atts, 'user' );
		// Check for password requests
		if ( $atts['field'] === 'user_pass' ) return sprintf( '<p class="perch-error">User: %s</p>', __( 'password field is not allowed', 'perch' ) );
		// Define current user ID
		if ( !$atts['user_id'] ) $atts['user_id'] = get_current_user_id();
		// Check user ID
		if ( !is_numeric( $atts['user_id'] ) || $atts['user_id'] < 1 ) return sprintf( '<p class="perch-error">User: %s</p>', __( 'user ID is incorrect', 'perch' ) );
		// Get user data
		$user = get_user_by( 'id', $atts['user_id'] );
		// Get user data if user was found
		$user = ( $user && isset( $user->data->$atts['field'] ) ) ? $user->data->$atts['field'] : $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $user = call_user_func( $atts['filter'], $user );
		// Return result
		return ( $user ) ? $atts['before'] . $user . $atts['after'] : '';
	}

	public static function qrcode( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'data' => '',
				'title' => '',
				'size' => 200,
				'margin' => 0,
				'align' => 'none',
				'link' => '',
				'target' => 'blank',
				'color' => '#000000',
				'background' => '#ffffff',
				'class' => ''
			), $atts, 'qrcode' );
		// Check the data
		if ( !$atts['data'] ) return 'QR code: ' . __( 'please specify the data', 'perch' );
		// Prepare link
		$href = ( $atts['link'] ) ? ' href="' . $atts['link'] . '"' : '';
		// Prepare clickable class
		if ( $atts['link'] ) $atts['class'] .= ' perch-qrcode-clickable';
		// Prepare title
		$atts['title'] = esc_attr( $atts['title'] );
		// Query assets
		perch_query_asset( 'css', 'perch-content-shortcodes' );
		// Return result
		return '<span class="perch-qrcode perch-qrcode-align-' . $atts['align'] . perch_ecssc( $atts ) . '"><a' . $href . ' target="_' . $atts['target'] . '" title="' . $atts['title'] . '"><img src="https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode( $atts['data'] ) . '&size=' . $atts['size'] . 'x' . $atts['size'] . '&format=png&margin=' . $atts['margin'] . '&color=' . perch_hex2rgb( $atts['color'] ) . '&bgcolor=' . perch_hex2rgb( $atts['background'] ) . '" alt="' . $atts['title'] . '" /></a></span>';
	}

	public static function scheduler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'time'       => 'all',
				'days_week'  => 'all',
				'days_month' => 'all',
				'months'     => 'all',
				'years'      => 'all',
				'alt'        => ''
			), $atts, 'scheduler' );
		// Check time
		if ( $atts['time'] !== 'all' ) {
			// Get current time
			$now = current_time( 'timestamp', 0 );
			// Sanitize
			$atts['time'] = preg_replace( "/[^0-9-,:]/", '', $atts['time'] );
			// Loop time ranges
			foreach( explode( ',', $atts['time'] ) as $range ) {
				// Check for range symbol
				if ( strpos( $range, '-' ) === false ) return Tp_Tools::error( __FUNCTION__, sprintf( __( 'Incorrect time range (%s). Please use - (minus) symbol to specify time range. Example: 14:00 - 18:00', 'perch' ), $range ) );
				// Split begin/end time
				$time = explode( '-', $range );
				// Add minutes
				if ( strpos( $time[0], ':' ) === false ) $time[0] .= ':00';
				if ( strpos( $time[1], ':' ) === false ) $time[1] .= ':00';
				// Parse begin/end time
				$time[0] = strtotime( $time[0] );
				$time[1] = strtotime( $time[1] );
				// Check time
				if ( $now < $time[0] || $now > $time[1] ) return $atts['alt'];
			}
		}
		// Check day of the week
		if ( $atts['days_week'] !== 'all' ) {
			// Get current day of the week
			$today = date( 'w', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_week'] = preg_replace( "/[^0-9-,]/", '', $atts['days_week'] );
			// Parse days range
			$days = Tp_Tools::range( $atts['days_week'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check day of the month
		if ( $atts['days_month'] !== 'all' ) {
			// Get current day of the month
			$today = date( 'j', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_month'] = preg_replace( "/[^0-9-,]/", '', $atts['days_month'] );
			// Parse days range
			$days = Tp_Tools::range( $atts['days_month'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check month
		if ( $atts['months'] !== 'all' ) {
			// Get current month
			$now = date( 'n', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['months'] = preg_replace( "/[^0-9-,]/", '', $atts['months'] );
			// Parse months range
			$months = Tp_Tools::range( $atts['months'] );
			// Check current month
			if ( !in_array( $now, $months ) ) return $atts['alt'];
		}
		// Check year
		if ( $atts['years'] !== 'all' ) {
			// Get current year
			$now = date( 'Y', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['years'] = preg_replace( "/[^0-9-,]/", '', $atts['years'] );
			// Parse years range
			$years = Tp_Tools::range( $atts['years'] );
			// Check current year
			if ( !in_array( $now, $years ) ) return $atts['alt'];
		}
		// Return result (all check passed)
		return do_shortcode( $content );
	}
	

}

new Tp_Shortcodes;

class Perch_Shortcodes_Shortcodes extends Tp_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}
