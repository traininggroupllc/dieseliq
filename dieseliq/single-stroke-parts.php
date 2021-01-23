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
            		<a href="<?php echo esc_url(home_url());?>">Home</a> » Power Stroke Parts Finder
            	</nav>
            </div>

			<div id="content_top" style="height: auto !important;">
				<div class="region region-content-top" style="height: auto !important;">
					<!-- Diesel Block Banner-top-ad -->
					<?php get_template_part('include/ads/ads-block-1'); ?>
				</div>
			</div>

			<div id="content-wrap" style="height: auto !important;">
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
				<p class="mt-20"><?php the_field('application'); ?></p>                                                  
				<div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system">
						<div class="content"> 
							<div class="content">
								<div class="field field-name-body field-type-text-with-summary field-label-hidden">
									<div class="field-items">
										<div class="field-item even">
											<div id="rssOutput">
												<?php if(have_rows('products_items')) : ?>
													<?php while(have_rows('products_items')) : the_row(); ?>
													    <a href="<?php the_sub_field('product_link'); ?>">
													    	<img src="<?php the_sub_field('product_image'); ?>"><br>
													    	<?php the_sub_field('product_name'); ?>
														</a><br>
													    <span style="font-size:14px;color:#b12704;">
													    	<?php the_sub_field('product_price'); ?>	
													    </span><br>
													    <br>
													<?php endwhile; wp_reset_query(); ?>
												<?php endif; ?>
											  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="block-block-5" class="block block-block">
						<div class="content">
							<div id="shareBox" class="">
								<?php echo do_shortcode('[apss_share]');?>
							</div>  
						</div>
					</div> 

				</div>
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