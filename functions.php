<?php
/**
 * Lotus by Eagles functions and definitions
 *
 * @package Lotus by Eagles
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1920; /* pixels */
}


/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

if ( ! function_exists( 'lotus_by_eagles_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lotus_by_eagles_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lotus by Eagles, use a find and replace
	 * to change 'lotus-by-eagles' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lotus-by-eagles', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'lotus-featured', 1500, 500, true );
    add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lotus-by-eagles' ),
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
	add_theme_support( 'custom-background', apply_filters( 'lotus_by_eagles_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // lotus_by_eagles_setup
add_action( 'after_setup_theme', 'lotus_by_eagles_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function lotus_by_eagles_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'lotus-by-eagles' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'lotus_by_eagles_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lotus_by_eagles_scripts() {
	wp_enqueue_style( 'lotus-by-eagles-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lotus-by-eagles-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lotus-by-eagles-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', '1.9.1');

    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') ); // all the Bootstrap javascript goodness

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lotus_by_eagles_scripts' );

function enqueue_my_styles() {
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'my-bootstrap-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');

function lotus_by_eagles_post_layout2() {
    if ( have_posts() ) :
        $count = 1;
        while ( have_posts() ) : the_post();
            switch ($count) {
                case 1:
                    if (is_sticky()){
                        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 featured">';
                        get_template_part( 'content', get_post_format() );
                        echo '</div>';
                        $count=1;
                        break;
                    };
                    echo '<div class="row">';
                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                    get_template_part( 'content', get_post_format() );
                    echo '</div>';
                    $count=2; break;
                case 2:
                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                    get_template_part( 'content', get_post_format() );
                    echo '</div> </div>';
                    $count=1; break;
            }

        endwhile;
        if ($count==2) {
            echo '</div>';
        }
        lotus_by_eagles_paging_nav();
    else :
        get_template_part( 'content', 'none' );
    endif;
}

function lotus_by_eagles_post_layout3() {
 if ( have_posts() ) :
     /* Start the Loop */ $count = 1;
     while ( have_posts() ) : the_post();
         switch ($count) {
            case 1:
                echo '<div class="row">';
                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    get_template_part( 'content', get_post_format() );
                echo '</div>';
                $count=2; break;
             case 2:
                 echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    get_template_part( 'content', get_post_format() );
                 echo '</div>';
                 $count=3; break;
            case 3:
                echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                    get_template_part( 'content', get_post_format() );
                echo '</div>';
                echo '</div>';
                $count=1; break;
            }
     endwhile;
     if ($count==2 || $count==3) {
         echo '</div>';
     }
     lotus_by_eagles_paging_nav();
 else :
     get_template_part( 'content', 'none' );
 endif;
}

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'lotus_by_eagles' ),
) );

/*function excerpt_read_more_link($output) {
    global $post;
    return $output . '<a href="'. get_permalink($post->ID) . '"> [...]</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');*/

/*function new_excerpt_more( $more ) {
    return '[...]';
}
add_filter('excerpt_more', 'new_excerpt_more'); */


function new_excerpt_length($length) {
    return 70;
}
add_filter('excerpt_length', 'new_excerpt_length');

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

add_theme_support( 'post-thumbnails' );

