<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<?php
function dieseliq_script(){

	//THEME'S CSS 
	wp_enqueue_style( 'theme-styles', get_stylesheet_uri() );

}

add_action('wp_enqueue_scripts', 'dieseliq_script');

function dieseliq_setup() {
	 
	load_theme_textdomain( 'dieseliq' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support('woocommerce'); 
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'dieseliq-featured-image', 2000, 1200, true );
	add_image_size( 'dieseliq-thumbnail-avatar', 100, 100, true ); 

	$GLOBALS['content_width'] = 525;

	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'dieseliq' ),
		'footer' => __( 'Footer Menu', 'dieseliq' ),
		'mobile'=> __( 'Mobile Menu', 'dieseliq'),
	) ); 

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) ); 

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) ); 

}
add_action( 'after_setup_theme', 'dieseliq_setup' );

function dieseliq_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar 1', 'dieseliq' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in area.', 'dieseliq' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Facebook API', 'dieseliq' ),
			'id'            => 'facebook-api',
			'description'   => __( 'Add widgets here to appear in area.', 'dieseliq' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Twitter API', 'dieseliq' ),
			'id'            => 'twitter-api',
			'description'   => __( 'Add widgets here to appear in area.', 'dieseliq' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'dieseliq_widgets_init' );