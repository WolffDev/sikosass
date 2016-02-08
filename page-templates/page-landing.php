<?php
/**
 * Template Name: Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SIKO
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$temp = $wp_query; $wp_query= null;
			$wp_query = new WP_Query(); $wp_query->query('category_name=nyheder&showposts=4' . '&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post();
			get_template_part( 'template-parts/content', 'land' );

			?>

<?php


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
