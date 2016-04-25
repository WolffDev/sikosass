<?php
/**
 * Template Name: Nyheder Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
				<h1>SIKO's nyhedsarkiv</h1>

			<?php

			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			  $custom_args = array(
			      'post_type' => 'post',
						'category_name' => 'nyheder',
			      'posts_per_page' => 6,
			      'paged' => $paged
			    );

			  $custom_query = new WP_Query( $custom_args ); ?>

			  <?php if ( $custom_query->have_posts() ) : ?>

			    <!-- the loop -->
			    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			      <article class="loop">
			        <a href="<?php the_permalink(); ?>"><h3 class="arkiv-nyhed-titel"><?php the_title(); ?></h3></a>
							<span><?php sikosass_posted_on(); ?></span>
			        <div class="content">
			          <?php the_excerpt(); ?>
			        </div>
			      </article>
						<hr>
			    <?php endwhile; ?>
			    <!-- end of the loop -->

			    <!-- pagination here -->
					<div class="nyheder-pagination">
				    <?php
				        custom_pagination($custom_query->max_num_pages,"",$paged);
				    ?>
					</div>

			  <?php wp_reset_postdata(); ?>

			  <?php else:  ?>
			    <p><?php _e( 'Der var intet indhold på det du søgte efter.' ); ?></p>
			  <?php endif; ?>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
