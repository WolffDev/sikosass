<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SIKO
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found entry-content">
				<header class="page-header">
					<h1 class="page-title">Forket side!</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Det ser ud til at du er havnet på en forkert side. Prøv igen eller benyt søge boksen til at søge hvad du leder efter på siden.</p>

					<?php
						get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
