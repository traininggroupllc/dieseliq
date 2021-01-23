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
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');


function my_logged_in_redirect() {     
    if ( is_page( 48 ) ) 
    {
        wp_redirect( get_permalink( 45 ) );
       die;
    }
}
add_action( 'template_redirect', 'my_logged_in_redirect' );

function my_plugin_body_class($classes) {
    $classes[] = 'left-sidebar';
    return $classes;
}
add_filter('body_class', 'my_plugin_body_class');