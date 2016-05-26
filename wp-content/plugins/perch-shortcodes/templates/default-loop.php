<div class="row">
<div class="twelvecol tp-posts tp-posts-default-loop" data-equal="eqheight" >
	<?php
		$readmore_text = $posts->readmore_text;
		// Posts are found
		if ( $posts->have_posts() ) {
			$i = 1;			
			while ( $posts->have_posts() ) :
			$class = '';
				$posts->the_post();
				global $post;
				if( $i%3 == 0){ $class = 'last';}
				?>

				<div id="tp-post-<?php the_ID(); ?>" class="eqheight col-md-4 tp-post <?php echo esc_attr($class); ?>"><div class=" blog_item">
					<?php if ( ! post_password_required() && ! is_attachment() ) :
						global $wp_query;
						$thumb_width = 400;
						landx_post_thumb( 400, 250 );
					endif; ?>
					<div class="blog_info">
	                    <h3 class="blog_title"><a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10 ); ?></a></h3>
						<?php landx_entry_header_meta(); ?>
	                    <a class="blog_icons last" href="<?php echo get_permalink(); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date('d M Y'); ?></a>
						<p><?php 
						$content = get_the_excerpt();
						$trimmed_content = wp_trim_words( $content, 20 );
						echo force_balance_tags($trimmed_content);
						?></p>
						<?php echo ( $readmore_text != '' )? '<a class="btn small" href="'.get_permalink().'">'.esc_attr($readmore_text).'</a>' : '';  ?>
					</div>
				</div></div>

				<?php
				$i++;
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'tp' ) . '</h4>';
		}
		
	?>
</div>
</div>