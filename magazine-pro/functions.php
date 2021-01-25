<?php
/**
 * Magazine Pro.
 *
 * This file adds the functions to the Magazine Pro Theme.
 *
 * @package Magazine
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/magazine/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets Child Theme settings.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

require_once get_stylesheet_directory() . '/include/theme-file.php';
require_once get_stylesheet_directory() . '/include/theme-options.php';
require_once get_stylesheet_directory() . '/include/theme-functions.php';
require_once get_stylesheet_directory() . '/include/custom-post-type.php';

add_action( 'after_setup_theme', 'magazine_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function magazine_localization_setup() {
	load_child_theme_textdomain( 'magazine-pro', get_stylesheet_directory() . '/languages' );
}

// Adds the theme helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds the Customizer options.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Adds the Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the WooCommerce customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Includes notice to install Genesis Connect for WooCommerce.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * Allows plugins to remove support if required.
 *
 * @since 3.3.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once CHILD_DIR . '/lib/gutenberg/init.php';
}

add_action( 'wp_enqueue_scripts', 'magazine_enqueue_scripts' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function magazine_enqueue_scripts() {

	$appearance = genesis_get_config( 'appearance' );

	if ( function_exists( 'genesis_blocks_text_domain' ) ) {
		wp_enqueue_script(
			genesis_get_theme_handle() . '-move-entry-dates',
			get_stylesheet_directory_uri() . '/js/move-entry-dates.js',
			[],
			'1.1.0',
			true
		);
	}

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		genesis_get_theme_handle() . '-responsive-menu',
		get_stylesheet_directory_uri() . '/js/responsive-menus' . $suffix . '.js',
		[ 'jquery' ],
		genesis_get_theme_version(),
		true
	);

	wp_localize_script(
		genesis_get_theme_handle() . '-responsive-menu',
		'genesis_responsive_menu',
		magazine_responsive_menu_settings()
	);

	wp_enqueue_script(
		genesis_get_theme_handle() . '-custom-script-s',
		get_stylesheet_directory_uri() . '/js/custom-script.js',
		[ 'jquery' ],
		genesis_get_theme_version(),
		true
	);

	wp_localize_script(
		genesis_get_theme_handle() . '-custom-script',
		'custom-script-s',
		magazine_responsive_menu_settings()
	);

}

/**
 * Defines responsive menu settings.
 *
 * @since 1.0.0
 */
function magazine_responsive_menu_settings() {

	$settings = [
		'mainMenu'    => __( 'Menu', 'magazine-pro' ),
		'subMenu'     => __( 'Submenu', 'magazine-pro' ),
		'menuClasses' => [
			'combine' => [
				'.nav-primary',
				'.nav-header',
				'.nav-secondary',
			],
		],
	];

	return $settings;

}

// Adds image sizes.
add_image_size( 'large-featured', 750, 420, true );
add_image_size( 'medium-featured', 630, 350, true );
add_image_size( 'sidebar-thumbnail', 100, 100, true );
add_image_size( 'singular-wide', 1140, 420, true );

add_filter( 'image_size_names_choose', 'magazine_media_library_sizes' );
/**
 * Adds image sizes to Media Library.
 *
 * @since 1.0.0
 *
 * @param array $sizes Array of image sizes and their names.
 * @return array The modified list of sizes.
 */
function magazine_media_library_sizes( $sizes ) {

	$sizes['large-featured']  = __( 'Large Featured - 750px by 420px', 'magazine-pro' );
	$sizes['medium-featured'] = __( 'Medium Featured - 630px by 350px', 'magazine-pro' );

	return $sizes;

}


add_action( 'after_setup_theme', 'magazine_theme_support', 1 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.4.0
 */
function magazine_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'magazine_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function magazine_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

add_filter( 'genesis_singular_image_size', 'magazine_singular_image_size' );
/**
 * Overrides the singular image size, based on chosen layout.
 *
 * @since 3.4.0
 *
 * @return string $size The image size to use for the singular image.
 */
function magazine_singular_image_size() {

	$current = genesis_site_layout( false );

	$layouts = [
		'no-sidebar' => [
			'full-width-content',
		],
		'sidebars'   => [
			'content-sidebar',
			'sidebar-content',
			'content-sidebar-sidebar',
			'sidebar-content-sidebar',
			'sidebar-sidebar-content',
		],
	];

	if ( in_array( $current, $layouts['no-sidebar'], true ) ) {
		return 'singular-wide';
	} elseif ( in_array( $current, $layouts['sidebars'], true ) ) {
		return 'large-featured';
	}

}

add_filter( 'genesis_skip_links_output', 'magazine_skip_links_output' );
/**
 * Removes skip link for primary navigation and adds one for the secondary navigation.
 *
 * @since 1.0.0
 *
 * @param array $links The list of skip links.
 * @return array $links The modified list of skip links.
 */
function magazine_skip_links_output( $links ) {

	if ( isset( $links['genesis-nav-primary'] ) ) {
		unset( $links['genesis-nav-primary'] );
	}

	$new_links = $links;
	array_splice( $new_links, 1 );

	if ( has_nav_menu( 'secondary' ) ) {
		$new_links['genesis-nav-secondary'] = __( 'Skip to secondary menu', 'magazine-pro' );
	}

	return array_merge( $new_links, $links );

}

add_filter( 'genesis_attr_nav-secondary', 'magazine_add_nav_secondary_id' );
/**
 * Adds custom attributes for the secondary navigation.
 *
 * @since 1.0.0
 *
 * @param array $attributes The element attributes.
 * @return array $attributes The element attributes.
 */
function magazine_add_nav_secondary_id( $attributes ) {

	$attributes['id'] = 'genesis-nav-secondary';

	return $attributes;

}

// Repositions the primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

add_filter( 'body_class', 'magazine_no_nav_class' );
/**
 * Defines the primary-nav body class.
 * Adds class if primary navigation is used.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes array.
 * @return array $classes Updated class array.
 */
function magazine_no_nav_class( $classes ) {

	$menu_locations = get_theme_mod( 'nav_menu_locations' );

	if ( ! empty( $menu_locations['primary'] ) ) {
		$classes[] = 'primary-nav';
	}

	return $classes;

}

add_filter( 'genesis_search_text', 'magazine_search_text' );
/**
 * Changes search form placeholder text.
 *
 * @since 1.0.0
 *
 * @param string $text The search form placeholder text.
 * @return string The modified search form placeholder text.
 */
function magazine_search_text( $text ) {
	return esc_attr( __( 'Search the site ...', 'magazine-pro' ) );
}

add_action( 'genesis_before_entry', 'magazine_remove_entry_meta' );
/**
 * Removes entry meta in entry footer on archives.
 *
 * @since 1.0.0
 */
function magazine_remove_entry_meta() {

	// Removes if not single post.
	if ( ! is_single() ) {
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	}

}

// Relocates after entry widget.
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_entry_footer', 'genesis_add_id_to_global_exclude', 9 );
add_action( 'genesis_entry_footer', 'genesis_after_entry_widget_area' );



// custom post type search result template
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'stroke-parts' )   
  {
    return locate_template('search-stroke-parts.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');    



// custom functions
add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');
 
function misha_filter_function(){
	$args = array(
		'orderby' => 'date',
		'order'	=> $_POST['date']
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'engine-cat',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['partfilter'] ) && $_POST['partfilter'] == 'on' )
		$args['meta_query'] = array( 'relation'=>'AND' );
		$args['tax'] = array( 'relation'=>'AND' );
 
	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] && isset( $_POST['partfilter'] ) && $_POST['partfilter'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);
 
		// if only max price is set
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);

		// if only min price is set
		if( isset( $_POST['partfilter'] ) && $_POST['partfilter'] )
			$args['tax_query'][] = array(
				'taxonomy' => 'part-cat',
				'field' => 'id',
				'terms' => $_POST['partfilter']
			);
	}
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) : ?>
		<h3>6.0L Power Stroke CONNECTING ROD </h3>
		<ul>
			<?php while( $query->have_posts() ): $query->the_post(); ?>
				<li style="font-weight:bold;">
					<a href="<?php the_permalink();?>"><?php the_title(); ?></a>  
					Motorcraft Part Number: <?php the_field('motorcraft_part_number', false, false);?><br>
					Application: <?php the_field('application', false, false);?>
					
				</li>
			<?php endwhile; wp_reset_postdata(); ?>
			<?php else : echo '<p class="noresult">No Power Stroke Parts Found</p>';?>
		</ul>
	<?php endif;
	die();
}