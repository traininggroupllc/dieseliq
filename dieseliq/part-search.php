<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
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
      				<a href="<?php echo esc_url(home_url());?>">Home</a> » 
      				<a href="<?php echo get_page_link(69);?>" title="Power Stroke part and part number finder">Power Stroke Parts Finder</a> » 
      				Ford Power Stroke to International Part Number Cross Reference
      			</nav>
            </div>
      		<div id="content_top" style="height: auto !important;">
				<div class="region region-content-top" style="height: auto !important;">
					<!-- Diesel Block Banner-top-ad -->
					<?php get_template_part('include/ads/ads-block-1'); ?>
				</div>
			</div>
                         
            <div id="content-wrap" style="height: auto !important;">
            	<h2 class="page-title">Ford Power Stroke to International Part Number Cross Reference</h2>
                <div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system"> 
					  	<div class="content">
					  		<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
								Enter Ford Part Number: 
								<input id="s" maxlength="150" name="s" size="20" type="text" value="" class="txt" required>
								<input name="post_type" type="hidden" value="stroke-parts" />
								<input id="searchsubmit" class="btn" type="submit" value="Find International Part Number" />
							</form>
					  		<?php 
							    $args = array(
							        'post_type'=> 'stroke-parts',
					                's'    => $s,
					                'paged' => $paged,
					                );
							    query_posts($args);
							    if(have_posts()):
	                            	while(have_posts()): the_post(); ?>

	                           	<?php if(get_field('international_part_number')): ?>
								<p>
									<strong>International Part Number: <?php the_field('international_part_number'); ?></strong><br>
									<strong>Ford Service Number: <a href="javascript:void(0);"><?php the_title(); ?></a></strong><br>
									<strong>Ford Engineering Number:</strong> <?php the_field('ford_engineering_number'); ?> <br> 
									<strong>Description:</strong> <?php the_field('description'); ?>
								</p>
								<?php endif; ?>
								<?php endwhile; wp_reset_query(); ?>
									<?php else: ?>
                                		<p class="no-result-found"><?php echo "No International part number found!!"; ?></p>
							<?php endif;?>
								<div class="nav-previous alignleft"><?php previous_posts_link( 'Older results' ); ?></div>
                            	<div class="nav-next alignright"><?php next_posts_link( 'Newer results' ); ?></div>
						</div>
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