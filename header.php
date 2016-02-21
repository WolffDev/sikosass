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
	<div class="site-logo">
		<?php $site_title = get_bloginfo( 'name' ); ?>
		<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home">
			<?php
			if ( has_site_icon() ) {
				$site_icon = esc_url( get_site_icon_url() );?>
				<img src="<?php echo $site_icon; ?>" class="site-icon">
			<?php } else { ?>
				<div class="site-firstletter" aria-hidden="true">
					<?php echo substr($site_title, 0, 1); ?>
				</div>
			<?php } ?>
		</a>
	</div>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sikosass' ); ?></a>
		<?php if ( get_header_image() ) { ?>
			<header id="masthead" class="site-header" role="banner">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php bloginfo( 'description' ); ?>">
		<?php } else { ?>
			<header id="masthead" class="site-header" role="banner">

		<?php } ?>
			<div class="site-branding">
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
