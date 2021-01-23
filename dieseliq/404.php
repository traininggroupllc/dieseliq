<?php get_header(); ?>

<div id="main" class="clearfix" style="height: auto !important;">
    <div id="primary" style="height: auto !important;">
      	<section id="content" role="main" style="height: auto !important;">
                         
            <div id="content-wrap" style="height: auto !important;">
            	<h2 class="page-title"><?php the_title(); ?></h2>  
                <div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system"> 
					  	<div class="content">
					  		<div id="notfound">
								<h4>Oops! This Page Could Not Be Found</h4>
				                <p>SORRY BUT THE PAGE YOU ARE LOOKING FOR DOES NOT EXIST, HAVE BEEN REMOVED. NAME CHANGED OR IS TEMPORARILY UNAVAILABLE</p>
							</div>
						</div>
					</div> 
					<!-- /.block -->

				</div>
        	</div>
        	<div id="content_top" style="height: auto !important;">
				<div class="region region-content-top" style="height: auto !important;">
					<!-- Diesel Block Banner-top-ad -->
					<?php get_template_part('include/ads/ads-block-1'); ?>
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