<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 * Template Name: Parts Finder Template
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<?php get_header(); ?>
<div id="main" class="clearfix" style="height: auto !important;">
    <div id="primary" style="height: auto !important;">
      	<section id="content" role="main" style="height: auto !important;">
      		<div id="breadcrumbs">
            	<nav class="breadcrumb">
            		<a href="<?php echo esc_url(home_url());?>">Home</a> » <?php the_title(); ?>
            	</nav>
            </div>

            <div id="content_top" style="height: auto !important;">
				<div class="region region-content-top" style="height: auto !important;">
					<!-- Diesel Block Banner-top-ad -->
					<?php get_template_part('include/ads/ads-block-1'); ?>
				</div>
			</div>
                         
            <div id="content-wrap" style="height: auto !important;">
            	<h2 class="page-title filtertitle"><?php the_title(); ?></h2>  
                <div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system"> 
					  	<div class="content">
					  		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
								<?php
									if( $terms = get_terms( array( 'taxonomy' => 'engine-cat', 'orderby' => 'name' ) ) ) : 
							 
										echo '<select id="enginecat" name="categoryfilter" onchange="getFilter()" required><option value="">Select engine</option>';
										foreach ( $terms as $term ) :
											echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
										endforeach;
										echo '</select>';
									endif;
								?>
								<?php
									if( $terms = get_terms( array( 'taxonomy' => 'part-cat', 'orderby' => 'name' ) ) ) : 
							 
										echo '<select id="partcat" name="partfilter" class="d-none" required><option value="">Select part</option>';
										foreach ( $terms as $term ) :
											echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
										endforeach;
										echo '</select>';
									endif;
								?>
								<button>Find Part Numbers</button>
								<input type="hidden" name="action" value="myfilter">
							</form>
							<div id="response"></div>

							<div class="resultpart">
								<p>Find parts for which Power Stroke engine?</p> 
								<ul>
									<li><a href="javascript:void(0);"><strong>7.3 Liter</strong></a></li>
									<li><a href="javascript:void(0);"><strong>6.7 Liter</strong></a></li>
									<li><a href="javascript:void(0);"><strong>6.4 Liter</strong></a></li>
									<li><a href="javascript:void(0);"><strong>6.0 Liter</strong></a></li>
								</ul>
							</div>
						</div>

						<!-- <?php

							$args = array(
							    'post_type' => 'stroke-parts',
							    'tax_query' => array(
							        array(
							            'tax_query' => array(
								        'relation' => 'AND',
								        array(
								            'taxonomy' => 'engine-cat',
								            'field'    => 'slug',
								            'terms'    => '7-0l',
								        ),
								        array(
								            'taxonomy' => 'part-cat',
								            'field'    => 'slug',
								            'terms'    => 'breather-filter',
								        ),
								    	),
							        ),
							    ),
							);
							$query = new WP_Query( $args );
							if($query->have_posts()):
	                            	while($query->have_posts()): $query->the_post();

						?>
						<p><?php the_title(); ?></p>
						<?php endwhile; endif; ?>
                        	<?php wp_reset_postdata(); ?> -->
					</div> 
					<!-- /.block -->

				</div>
				<!-- Diesel Block grid-products-ad -->
				<?php get_template_part('include/ads/ads-block-3'); ?> 
        	</div>
    	</section> 
    </div>

    <aside id="sidebar" role="complementary">
		<div class="region region-sidebar-first">
			<!-- Left sidebar here -->
			<?php get_sidebar(); ?>
		</div>
	</aside>

</div>

<?php get_footer(); ?>