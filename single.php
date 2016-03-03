<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SIKO
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation( array (
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Næste', 'sikosass' ) . '</span>' . '<br>' .
				'<span class="screen-reader-text">' . __( 'Næste post', 'sikosass' ) . '</span>' . '<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Forige', 'sikosass' ) . '</span>' . '<br>' .
				'<span class="screen-reader-text">' . __( 'Forige post', 'sikosass' ) . '</span>' . '<span class="post-title">%title</span>',
			));
		?>

		<?php endwhile; // End of the loop.?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
