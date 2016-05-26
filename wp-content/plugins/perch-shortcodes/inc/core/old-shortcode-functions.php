<?php
/*
 * Testimonial
 * @since v1.0
 *
 */

function testimonial_landx_group( $atts, $content = NULL) {
	extract( shortcode_atts( array(
			'class'			=> '',
		), $atts ) );
	$html = '<div class="row testimonials">
		<div id="feedbacks" class="owl-carousel owl-theme">';
	$html .=do_shortcode ( $content );
	$html .='</div>
	</div>';
	return $html;
}

add_shortcode('perch-testimonials-group', 'testimonial_landx_group');

function landx_testimonial_single ($atts, $content = NULL) {
	extract( shortcode_atts( array(
			'name'				=> '',
			'title'			=> '',
			'website'			=> '',
			'image'			=> '',
		), $atts ) );

	if( $image > 0 ){
		$arr = explode(',', $image);
		//print_r($arr);
		$image_attributes = wp_get_attachment_image_src( intval($arr[0]), 'full' );
		$image_url = $image_attributes[0];
	}else{
		$image_url = '';
	}
	

	$html = '<div class="single-feedback">
				<div class="client-pic">';
				if($image_url !=''){				
					$resize_image_url = landx_image_resize($image_url, 71, 71, true, '', false);
					$html .= '<img src="'.$resize_image_url.'" alt="client image">';
				} else {
					$html .= '<img src=" http://placehold.it/71x71" alt="client image">';
				}
				$html .= '</div>
				<div class="box">
					<p class="message">'.$content.'</p>
				</div>
				<div class="client-info">
					<div class="client-name colored-text strong">'.$name.'</div>
					<div class="company">'.$title.'</div>
				</div>
			</div>';
	return $html;
}

add_shortcode('perch-testimonial','landx_testimonial_single');

// screenshot shortcode



function perch_carousel_callback( $atts=array() ){
	extract( shortcode_atts( array(
		'images' => '',
		'thumb_width' => 400,
		'thumb_height' => 272,
		), $atts ) );
	$output = '';

	if($images != ''){
		$output = '<div class="row screenshots"><div id="screenshots" class="owl-carousel owl-theme">';
		
		if( $images != '' ){
			$arr = explode(',', $images);
			foreach ($arr as $key => $value) {
				if( $value > 0 ):
					$image_attributes = wp_get_attachment_image_src( $value, 'full' );
					$url = $image_attributes[0];
					$resize_image = perch_image_resize($url, $thumb_width, $thumb_height);

						$output .= '<div class="shot">
						<a href="'.$url.'" data-lightbox-gallery="screenshots-gallery"><img src="'.$resize_image['url'].'" alt="image"></a>
					</div>';
				endif;
			}
			
			
		}else{
			$image_url = '';
		}
		
		$output .= '</div></div>';
	}
	return $output;
}
add_shortcode( 'perch-carousel', 'perch_carousel_callback' );


function perch_clients_logo_callback( $atts=array() ){
	extract( shortcode_atts( array(
		'images' => ''
		), $atts ) );
	$output = '';

	if($images != ''){
		$output = '<ul class="client-logos">';
		
		if( $images != '' ){
			$arr = explode(',', $images);
			foreach ($arr as $key => $value) {
				if( $value > 0 ):
					$image_attributes = wp_get_attachment_image_src( $value, 'full' );
					$url = $image_attributes[0];
					if( $url != '' )				
					$output .= '<li><a href="'.$url.'"><img src="'.$url.'" alt="image"></a></li>';
				endif;
			}
			
			
		}else{
			$image_url = '';
		}
		
		$output .= '</ul>';
	}
	return $output;
}

add_shortcode( 'perch-clients-logo', 'perch_clients_logo_callback' );

/*
 * Toggle
 * @since v1.0
 */
if( !function_exists('perch_toggle_shortcode') ) {
	function perch_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title'			=> 'Toggle Title',
			'class'			=> '',
			'visibility'	=> 'all',
			'state'       => ''
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('perch_toggle');
		
		// Display the Toggle
		return '<div class="perch-toggle '. $class .' perch-'. $visibility .' '.$state.'"><h3 class="perch-toggle-trigger">'. $title .'</h3><div class="perch-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
}
add_shortcode('perch_toggle', 'perch_toggle_shortcode');


/*
 * Accordion
 * @since v1.0
 *
 */
/*
 * Tabs
 * @since v1.0
 *
 */
if (!function_exists('perch_tabgroup_shortcode')) {
	function perch_tabgroup_shortcode( $atts, $content = null ) {
		
		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('perch_tabs');
		
		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
			$output .= '<div id="perch-tab-'. rand(1, 100) .'" class="perch-tabs">';
			$output .= '<ul class="ui-tabs-nav perch-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#perch-tab-'. sanitize_title( $tab[0] ) .'">' . esc_attr($tab[0]) . '</a></li>';
			}
			$output .= '</ul>';
			$output .= do_shortcode( $content );
			$output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
}
add_shortcode( 'perch_tabgroup', 'perch_tabgroup_shortcode' );
