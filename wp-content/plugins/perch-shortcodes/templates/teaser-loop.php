<div class="perch-posts perch-posts-default-loop">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>

				<div id="perch-post-<?php the_ID(); ?>" class="perch-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="perch-post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="perch-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="perch-post-meta"><?php _e( 'Posted', 'perch' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="perch-post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php comments_link(); ?>" class="perch-post-comments-link"><?php comments_number( __( '0 comments', 'perch' ), __( '1 comment', 'perch' ), '% comments' ); ?></a>
				</div>

				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'perch' ) . '</h4>';
		}
		
	?>
</div>