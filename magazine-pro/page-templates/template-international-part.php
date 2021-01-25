<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 * Template Name: International Parts Template
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
			
			<?php get_sidebar(); ?>

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
					  		<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
								Enter Ford Part Number: 
								<input id="s" maxlength="150" name="s" size="20" type="text" value="" class="txt" required>
								<input name="post_type" type="hidden" value="stroke-parts" />
								<input id="searchsubmit" class="btn" type="submit" value="Find International Part Number" />
							</form>
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