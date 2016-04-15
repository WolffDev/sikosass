<?php
/**
 * Template Name: Nyheder Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			  $custom_args = array(
			      'post_type' => 'post',
						'category_name' => 'nyheder',
			      'posts_per_page' => 5,
			      'paged' => $paged
			    );

			  $custom_query = new WP_Query( $custom_args ); ?>

			  <?php if ( $custom_query->have_posts() ) : ?>

			    <!-- the loop -->
			    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			      <article class="loop">
			        <h3><?php the_title(); ?></h3>
							<span><?php sikosass_posted_on(); ?></span>
			        <div class="content">
			          <?php the_excerpt(); ?>
			        </div>
			      </article>
			    <?php endwhile; ?>
			    <!-- end of the loop -->

			    <!-- pagination here -->
			    <?php
			        custom_pagination($custom_query->max_num_pages,"",$paged);
			    ?>

			  <?php wp_reset_postdata(); ?>

			  <?php else:  ?>
			    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			  <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
