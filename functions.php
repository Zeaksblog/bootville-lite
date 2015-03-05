<?php
/**
 * bootville functions and definitions
 *
 * @package bootville
 */


if ( ! function_exists( 'bootville_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootville_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootville, use a find and replace
	 * to change 'bootville' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootville', get_template_directory() . '/languages' );


	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses add_editor_style() Links a stylesheet to visual editor
	 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
	 */	
	add_editor_style();

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

  // Custom Header
  $header_args = array(
      'random-default'         => false,
      'width'                  => 1090,
      'height'                 => 400,
      'flex-height'            => true,
      'flex-width'             => true,
      'header-text'            => false,
      'uploads'                => true,
  );
  add_theme_support( 'custom-header', $header_args );
  add_theme_support( 'allow_flexible_header_height', 200 );
  add_theme_support( 'allow_flexible_header_width', 1000 );	
  
 
// Set content width
if ( ! isset( $content_width ) ) $content_width = 712;  
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');
	
// Add featured image sizes
add_image_size( 'featured-large', 712, 400, true ); // width, height, crop
//Optional Slider image size
	add_image_size('slider', 1090, 400, true);

// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bootville' ),
		'footer-menu' => __( 'Footer Menu', 'bootville' ),	
		'social'  => __( 'Social Links Menu', 'bootville' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootville_custom_background_args', array(
		'default-color' => 'eaeaea',
		'default-image' => '',
	) ) );
}
endif; // bootville_setup
add_action( 'after_setup_theme', 'bootville_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
	
function bootville_widgets_init() {
	// Default sidebar
	register_sidebar( array(
		'name'          => __( 'Default Sidebar', 'bootville' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div>',
	) );

	// contact page sidebar widget area
	register_sidebar( array(
		'name'          => __( 'Contact Template Sidebar', 'bootville' ),
		'id'            => 'contact',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div>',
	) );
	
  register_sidebar(array(
		'name'          => __( 'Footer 1', 'bootville' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div>',
  ) );
 
  register_sidebar(array(
		'name'          => __( 'Footer 2', 'bootville' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div>',
  ) );
 
  register_sidebar(array(
		'name'          => __( 'Footer 3', 'bootville' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="panel-heading"><h4 class="widget-title panel-title">',
		'after_title'   => '</h4></div>',
  ) );	
}
add_action( 'widgets_init', 'bootville_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function bootville_scripts() {
	
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.2.0', 'all' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );
	
	// Optional bootswatch styles can be loaded here. Load them before the main stylesheet to achieve the desired look
	//wp_enqueue_style( 'bootswatch-style', get_template_directory_uri() . '/css/cosmo.min.css', array(), '1.0.0', 'all' );
	
	wp_enqueue_style( 'bootville-style', get_stylesheet_uri() );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.2.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootville_scripts' );

/**
 * Add Respond.js for IE
 */
if( !function_exists('ie_scripts')) {
	function ie_scripts() {
	 	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
	   	echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
	   	echo ' <!--[if lt IE 9]>';
	    echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	    echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	   	echo ' <![endif]-->';
   	}
   	add_action('wp_head', 'ie_scripts');
} // end if

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Bootstrap Menu.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';

/**
 * Author Meta.
 */
require get_template_directory() . '/inc/author-meta.php';

/**
 * Search Results - Highlight.
 */
require get_template_directory() . '/inc/search-highlight.php';

/**
 * Breadcrumbs Yum.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Admin page
 */
require get_template_directory() . '/inc/admin.php';