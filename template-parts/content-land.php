<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SIKO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-entry">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}else{ ?>
						<img src="<?php bloginfo('template_directory');?>/inc/img/default_post_img.jpg">
					<?php } ?>
				</a>

		</header><!-- .entry-header -->
		<div class="entry-wrap">
			<div class="entry-meta">
				<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) : ?>
				<?php sikosass_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>

			<div class="entry-content">

		<?php the_excerpt(); ?>

			</div><!-- .entry-content -->
		</div><!-- .entry-wrap -->
	</div><!-- .post-entry -->
</article><!-- #post-## -->
