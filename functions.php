<?php
/**
 * SIKO functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SIKO
 */

if ( ! function_exists( 'sikosass_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sikosass_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SIKO, use a find and replace
	 * to change 'sikosass' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sikosass', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 400, true );
	add_image_size('post', 500, 400, false );
	add_image_size('single_post', 1000, 400, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sikosass' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// add_theme_support( 'html5', array(
	// 	'search-form',
	// 	'comment-form',
	// 	'comment-list',
	// 	'gallery',
	// 	'caption',
	// ) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'sikosass_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'sikosass_setup' );


/*
 * Custom "nyheder" page
 */
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Side " . $paged . " af " . $numpages . "</span><br>";
      echo $paginate_links;
    echo "</nav>";
  }

}


/*
 * Change the login error message to be more secure, and only displays a general  * error - not showing if it username or password that is wrong.
 */
function login_error_override() {
	return 'Forkert login oplysninger.' . '<br>' . 'Prøv igen eller kontakt <a href="mailto:admin@siko.dk?subject=Jeg%20har%20glemt%20mit%20login&body=Hej%20admin,%0D%0AJeg%20har%20glemt%20mine%20login%20oplysninger.%0D%0A\'Indtast%20navn%20og%20email%20her\'">admin</a>.';
}
add_filter('login_errors', 'login_error_override');

/*
 * Redirect users to the home page, instead of the dashboard.
 */
function admin_login_redirect( $redirect_to, $request, $user ) {
	global $user;
	if (isset( $user->roles) && is_array( $user->roles ) ) {
		if( in_array( "administrator", $user->roles ) ) {
			return $redirect_to;
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);

/*
 * Change URL for custom login logo/text.
 */
function custom_logo_login_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_logo_login_url' );

function custom_logo_login_url_alt_text() {
	return 'SIKO - Samvirkende Idrætsklubber I Odense';
}
add_filter( 'login_headertitle', 'custom_logo_login_url_alt_text' );

/*
 * Set 'remember me' status default.
 */
function login_checked_remember() {
	add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember' );

function rememberme_checked() {
	echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

/*
 * Set path to custom login css.
 */
function custom_login_style() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/login/login-style.css">';
}
add_action('login_head', 'custom_login_style');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sikosass_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sikosass_content_width', 640 );
}
add_action( 'after_setup_theme', 'sikosass_content_width', 0 );


/**
 * Removes Edit Calendar link
 */
function simcal_remove_edit_post_link( $link, $id ) {

	// Check if the ID is a post type of calendar and if so return an empty string
	if( get_post_type( $id ) == 'calendar' ) {
		return '';
	}

	// Return the normal link for all other uses
	return $link;
}
add_filter( 'edit_post_link', 'simcal_remove_edit_post_link', 10, 2 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function sikosass_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'sikosass' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => '',
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'sikosass_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sikosass_scripts() {
	wp_enqueue_style( 'sikosass-style', get_stylesheet_uri() );

	if (is_page_template( 'page-templates/page-landing.php' )) {
		wp_enqueue_style( 'sikosass-layout-style' , get_template_directory_uri() . '/content-landing.css' );
	}

	wp_enqueue_style( 'sikosass-layout-figure-style' , get_template_directory_uri() . '/content-landing-figure.css' );

	// wp_enqueue_style( 'sikosass-fontawesome' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );


	wp_enqueue_script( 'sikosass-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sikosass-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );

	wp_localize_script( 'sikosass-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'sikosass' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'sikosass' ) . '</span>',
	) );

	wp_enqueue_script( 'sikosass-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( !is_front_page() || !is_home() ) {
		wp_enqueue_style( 'sikosass-download' , get_template_directory_uri() . '/css/downloadAtt.css' );
	}

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'sikosass_scripts' );

/**
 * Adds custom excert
 */
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '... Læs mere', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
