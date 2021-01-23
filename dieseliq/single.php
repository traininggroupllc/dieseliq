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

								<?php if(has_post_thumbnail()) : ?>
								<div class="field field-name-field-image field-type-image field-label-hidden">
									<div class="field-items">
										<div class="field-item even">
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
										</div>
									</div>
								</div>
								<?php endif; ?>

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

								<?php if(has_tag()) : ?>
								<div class="field field-name-field-tags field-type-taxonomy-term-reference field-label-above">
									<div class="field-label">Tags:&nbsp;</div>
									<div class="field-items">
										<div class="field-item even">
											<?php the_tags('', '', '<br />'); ?>
										</div>
									</div>
								</div>
								<?php endif; ?>

								<!-- Diesel Block grid-products-ad -->
								<?php get_template_part('include/ads/ads-block-3'); ?>

								<?php 
									if ( comments_open() || get_comments_number() ) :
						    			comments_template();
									endif;
								?>
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