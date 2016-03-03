<?php
/**
 * Template Name: Grid Image Show
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			

			<article id="posts">
				<?php
				$temp = $wp_query; $wp_query= null;
				$wp_query = new WP_Query(); $wp_query->query('category_name=nyheder&showposts=4' . '&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part( 'template-parts/content', 'land' );
				?>
				<?php
				endwhile; // End of the loop.
				?>
			</article>

			<div class="reklame hide"></div>

			<div class="calender">
				<div class="cal-wrap">
					<div class="cal">
						<p>
							Kalender tekst her.
						</p>
					</div>
					<div class="cal">
						<p>
							Kanlender her.
						</p>
					</div>
				</div>
			</div>

			<div class="reklame hide"></div>

			<div class="nyhedsBrev">
				<div class="mailsub">
					<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quas, nihil? Laudantium autem quae, rem aliquam iure quo eius voluptatum!</h2>
				</div>
				<div class="mailsub">
					<?php
						if( function_exists( 'mc4wp_show_form' ) ) {
  				  	mc4wp_show_form();
						}
					?>
				</div>
			</div>

			<div class="reklame hide last-item"></div>

			</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
