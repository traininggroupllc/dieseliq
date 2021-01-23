<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 * 	Template Name: Common Template
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
				<h2 class="page-title"><?php the_title(); ?></h2>                                                  
				<div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system">
						<div class="content">
							<div class="content">
								<div class="field field-name-body field-type-text-with-summary field-label-hidden">
									<div class="field-items">
										<div class="field-item even">
											<?php
												if(have_posts()) : 
													while(have_posts()) : the_post();
														the_content();
													endwhile;
												endif;
											?>
										</div>
									</div>
								</div>  
							</div>
						</div>
					</div>
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