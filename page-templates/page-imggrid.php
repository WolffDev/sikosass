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
