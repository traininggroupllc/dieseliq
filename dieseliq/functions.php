<?php

define('THEME_URI', get_template_directory_uri() );
define('THEME_PATH', get_template_directory() );
define('BASE_URL', get_site_url() );

require_once( get_template_directory() . '/include/theme-file.php');
require_once( get_template_directory() . '/include/theme-options.php');
require_once( get_template_directory() . '/include/theme-functions.php');
require_once( get_template_directory() . '/include/custom-post-type.php');
add_filter( 'wpcf7_autop_or_not', '__return_false' );

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