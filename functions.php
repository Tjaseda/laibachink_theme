<?php
/**
 * laibachink functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package laibachink
 */

if ( ! function_exists( 'laibachink_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function laibachink_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on laibachink, use a find and replace
		 * to change 'laibachink' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'laibachink', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'laibachink' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Toolbar', 'laibachink' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'laibachink_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function laibachink_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'laibachink_content_width', 640 );
}
add_action( 'after_setup_theme', 'laibachink_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function laibachink_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'laibachink' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'laibachink' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'laibachink_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function laibachink_scripts() {
	wp_enqueue_style( 'laibachink-style', get_stylesheet_uri() );
	wp_enqueue_style( 'laibachink-syncopate-font', 'https://fonts.googleapis.com/css?family=Syncopate:400,700');
	wp_enqueue_style( 'laibachink-average_sans-font', 'https://fonts.googleapis.com/css?family=Average+Sans');

	wp_enqueue_script( 'mixitup_library', get_bloginfo('template_directory') . '/assets/js/dist/mixitup.min.js', '', '', true);
	wp_enqueue_script( 'main_js', get_bloginfo('template_directory') . '/assets/js/dist/app.min.js', array( 'jquery' ), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'laibachink_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
* Registered image sizes.
*/

/* adding croped image for portfolio grid and srcset alternatives*/
add_image_size( 'portfolio_grid', 260, 325, true );
add_image_size( 'portfolio_grid@2x', 520, 650, true );
add_image_size( 'portfolio_grid@3x', 780, 975, true );

add_image_size( 'portfolio_view', 400, 400, false );
add_image_size( 'portfolio_view@2', 800, 800, false );
add_image_size( 'portfolio_view@3', 1000, 1000, false );


/* Setting sizes attribute for portfolio grid */
function laibachink_portfolio_sizes_attr( $attr, $attachment, $size ) {
	if ( $size === 'portfolio_grid' ) {
		/* on max width 500px one pic takes up 50% of view width, on max width 740px one pic takes 33% of vw,... */
		$attr['sizes'] = '(max-width: 500px) 50vw, (max-width: 740px) 33vw, (max-width: 970px) 25vw, (max-width: 1550px) 16vw, (min-width: 1550px) 12vw, 260px';
	}
	else if ( $size === 'portfolio_view') {
		$attr['sizes'] = '(max-width: 500px) 80vw, (max-width: 740px) 70vw, (max-width: 970px) 60vw, (min-width: 970px) 25vw, 400px';
	}
	return$attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'laibachink_portfolio_sizes_attr', 10 , 3 );

/**
 * Add custom attribute and value to a nav menu item's anchor based on CSS class.
 */

 add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
  if ( 'id-about-us-link' === $item->classes[0] ) {
      $atts['id'] = 'about-us-link';
  }
	else if ( 'id-gallery-link' === $item->classes[0] ) {
      $atts['id'] = 'gallery-link';
	}
	else if ( 'id-info-link' === $item->classes[0] ) {
      $atts['id'] = 'info-link';
	}
	else if ( 'id-products-link' === $item->classes[0] ) {
      $atts['id'] = 'products-link';
	}
	else if ( 'id-contact-link' === $item->classes[0] ) {
      $atts['id'] = 'contact-link';
	}

return $atts; }, 10, 3 );


add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
	  if ( 'nav-link' === $item->classes[1] ) {

	      $atts['class'] = 'nav-link';
				$atts['data-scroll'] = $atts['href'];
	  }

return $atts; }, 10, 3 );

add_action( 'init', 'create_custom_post_types' );
function create_custom_post_types() {

  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team Member' )
      ),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => false,
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
    )
  );

	register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' )
      ),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies' => array( 'category' )
    )
  );

	register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQ' ),
        'singular_name' => __( 'FAQ' )
      ),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => false,
			'supports' => array( 'title', 'editor' ),
    )
  );
}

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');


function my_header_elements() { ?>
<ul class="social">
	<li><a href="#"><span class="lbi-wordl"></span></a></li>
	<li><a href="#"><span class="lbi-dcicon"></span></a></li>
	<li><a href="#"><span class="lbi-email"></span></a></li>
 	<li><a href="#"><span class="lbi-facebook"></span></a></li>
 	<li><a href="#"><span class="lbi-instagram"></span></a></li>
	<li><a href="#"><span class="lbi-logo"></span></a></li>
 	<li><a href="#"><span class="lbi-phone"></span></a></li>

</ul>
 <?php
}
add_action( 'hybrid_header', 'my_header_elements' );

?>
