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

      		<div id="content_top" style="height: auto !important;">
				<div class="region region-content-top" style="height: auto !important;">
					<!-- Diesel Block Banner-top-ad -->
					<?php get_template_part('include/ads/ads-block-1'); ?>
				</div>
			</div>
                         
            <div id="content-wrap" style="height: auto !important;">
                <div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system"> 
					  	<div class="content">
					  		<?php
	                            if(have_posts()):
	                            	while(have_posts()): the_post();
	                        ?>
							<article id="node-<?php the_id();?>" class="node node-teaser clearfix">
								<header>
									<h2 class="title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>
								</header>
								<div class="content">
									<?php if(has_post_thumbnail()) : ?>
										<div class="field field-name-field-image field-type-image field-label-hidden">
											<div class="field-items">
												<div class="field-item even">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php the_post_thumbnail_url(); ?>" width="220" height="165" alt="<?php the_title(); ?>">
													</a>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<div class="field field-name-body field-type-text-with-summary field-label-hidden">
										<div class="field-items">
											<div class="field-item even">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
									<?php if(has_tag()) : ?>
									<div class="field field-name-field-tags field-type-taxonomy-term-reference field-label-above">
										<div class="field-label">Tags:&nbsp;</div>
										<div class="field-items">
											<div class="field-item even">
												<?php the_tags(); ?>
											</div>
										</div>
									</div>
									<?php endif; ?>
								</div>
								<footer>
									<ul class="links inline">
										<li class="node-readmore first">
											<a href="<?php the_permalink(); ?>" rel="tag" title="<?php the_title(); ?>">Read more</a>
										</li>
										<li class="disqus_comments_num last">
											<a href="<?php the_permalink(); ?>"><?php comments_number( '0 comment', 'one comment', '% comments' ); ?></a>
										</li>
									</ul>    
								</footer>
							</article>
							<?php endwhile; wp_reset_query(); ?>
							<?php endif;?>
						</div>
					</div> 
					<!-- /.block -->

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