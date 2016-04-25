<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SIKO
 */

?>

<article class="loop">
	<a href="<?php the_permalink(); ?>"><h3 class="arkiv-nyhed-titel"><?php the_title(); ?></h3></a>
	<span><?php sikosass_posted_on(); ?></span>
	<div class="content">
		<?php the_excerpt(); ?>
	</div>
</article>
<hr>
