<div class="perch-posts perch-posts-single-post">
	<?php
		// Prepare marker to show only one post
		$first = true;
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;

				// Show oly first post
				if ( $first ) {
					$first = false;
					?>
					<div id="perch-post-<?php the_ID(); ?>" class="perch-post">
						<h1 class="perch-post-title"><?php the_title(); ?></h1>
						<div class="perch-post-meta"><?php _e( 'Posted', 'perch' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?> | <a href="<?php comments_link(); ?>" class="perch-post-comments-link"><?php comments_number( __( '0 comments', 'perch' ), __( '1 comment', 'perch' ), __( '%n comments', 'perch' ) ); ?></a></div>
						<div class="perch-post-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				}
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'perch' ) . '</h4>';
		}
	?>
</div>