<?php
/**
 * Template Name: Foreninger
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="forening" class="entry-content">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.

				endwhile; // End of the loop.
				?>
				<div class="forening-wrap">
					<?php
						$query = new WP_Query( 'pagename=til_foreninger' );
						$forening_id = $query->queried_object->ID;
						wp_reset_postdata();

						$args = array(
							'post_type' => 'page',
							'post_parent' => $forening_id
						);
						$forening_query = new WP_Query( $args );

						if ( $forening_query->have_posts() ) {
							while ( $forening_query->have_posts() ) {
								$forening_query->the_post();
								echo '<div class="forening-list">';
								echo '<a href="' . get_permalink() . '" title="Læs mere om ' . get_the_title() . '">';
								echo '<h3 class="forening-title">' . get_the_title() . '</h3>';
								echo '</a>';
								echo '<div class="forening-lede">';
								the_content('Læs mere...');
								echo '</div>';
								echo '</div>';
							}
							echo '</<div>';
						}
						wp_reset_postdata();

					?>
				</div>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
