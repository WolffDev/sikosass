<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SIKO
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<?php if ( is_front_page() || is_home() ) { ?>

		<div class="site-logo">
			<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 833.3 472.8" style="enable-background:new 0 0 833.3 472.8;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#00AF62;}
	.st1{fill:#FFFFFF;}
	.st2{font-family:'Ubuntu-Bold';}
	.st3{font-size:64.6149px;}
	.st4{font-size:108.7276px;}
</style>
<g>
	<path class="st0" d="M36,256.5h113.8c20.8,1.8,21.5-13.2,21.5-13.2l8.9-33.5c0-11.9-14.2-11.2-14.2-11.2L43.6,199
		c-18.2,0-10.9-20.3-10.9-20.3L64.7,54.2c1.8-26.4,37.5-23.3,37.5-23.3h27.1h160c0,0,12.7,1.8,15.2-4.6c0,0,15.3-26.4,52.5-26.4
		c0,0,34.2-0.3,49.4,26.6c0,0,2.5,6.3,13.4,6.3h128.5H688h114.3h18.5c0,0,12.4-2.5,12.4,9.9l-9.1,34.2c0,12.4-12.4,9.9-12.4,9.9
		h-9.4H688H548.3H419.8c-10.9,0-13.4,6.3-13.4,6.3c-15.2,26.9-49.4,26.6-49.4,26.6c-41.3,0-52.5-26.4-52.5-26.4
		c-2.5-6.3-15.2-4.6-15.2-4.6h-160c-15.2,0-18.8,11.2-18.8,11.2l-7.9,35.5c0,10.1,7.9,10.4,7.9,10.4H233c16.5,0,13.2,15.2,13.2,15.2
		l-35.2,133.6c-6.1,16-23.3,12.2-23.3,12.2H7.1c-8.1,0-7.1-6.8-7.1-6.8l9.9-36c-0.8-9.1,11.7-7.9,11.7-7.9L36,256.5z M354.9,22.3
		c-20.6,0-37.3,16.7-37.3,37.3c0,20.6,16.7,37.3,37.3,37.3c20.6,0,37.3-16.7,37.3-37.3C392.2,39,375.5,22.3,354.9,22.3"/>
	<path class="st0" d="M789.2,132.2c10.8,0,17.5,9.1,14.8,20.2l-31.5,131.4c-2.7,11.1-13.7,20.2-24.5,20.2H583.4
		c-10.8,0-17.5-9.1-14.8-20.2l32.1-131.4c2.7-11.1,13.8-20.2,24.6-20.2H789.2z M657.8,180.2c-5.1,0-10.2,4-11.5,8.9l-15,57.9
		c-1.3,4.9,1.8,8.9,6.9,8.9h76.9c5.1,0,10.2-4,11.5-8.9l14.7-57.9c1.2-4.9-1.9-8.9-6.9-8.9H657.8z"/>
	<path class="st0" d="M577.7,141.7c0,0,5.7-8.8-8.8-8.8h-49.7c-6.8,0-11.8,7.4-11.8,7.4l-51.1,53.8l13.5-51.7c0,0,1.3-8.2-10.4-8.2
		h-36.8c-9.8,0-11.1,8.7-11.1,8.7l-40.6,155.9c0,0-1.5,8.1,10.4,8.1h36.8c10.8,0,10.5-6.8,10.5-6.8l18.6-71.2l35.3,68.7
		c0,0,3.2,8.3,12,8.3h36.2c12.1,0,8.8-8.8,8.8-8.8l-38.2-74l-0.7-0.8l6.8-7.7L577.7,141.7z"/>
	<path class="st0" d="M353.3,194.1l13.5-51.6c0,0,1.3-8.2-10.4-8.2h-36.8c-9.8,0-11.1,8.7-11.1,8.7l-40.6,155.9
		c0,0-1.5,8.1,10.4,8.1h36.8c10.8,0,10.5-6.8,10.5-6.8l18.6-71.2L353.3,194.1z"/>
</g>
<text transform="matrix(0.9642 0 0 1 3.925 371.1935)" class="st1 st2 st3">Samvirkende Irdætsklubber</text>
<text transform="matrix(1.8497 0 0 1 -8.0002 468.085)" class="st1 st2 st4">I Odense</text>
</svg>

			</a>
		</div>
	<?php } ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sikosass' ); ?></a>
			<header id="masthead" class="site-header" role="banner">
				<div class="headerslider">
				 <?php if ( is_front_page() || is_home()  ) {
					 echo do_shortcode('[sp_responsiveslider design="design-1" width="1024" first_slide="1" height="350" effect="slide" pagination="true" navigation="true" speed="6000" autoplay="true" autoplay_interval="8000"]'); }?>
				 </div>


	 			<!-- <div class="site-branding<?php if ( !is_front_page() ) { echo ' screen-reader-text'; } ?>">
				<?php
				if ( is_front_page() || is_home()  ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() && is_home() ) : ?>
					<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
				<?php else : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'sikosass' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
