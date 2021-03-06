<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 * Template Name: Home Template
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<?php get_header(); ?>

<div id="main" class="clearfix" style="height: auto !important;">
    <div id="primary" style="height: auto !important;">
      	<section id="content" role="main" style="height: auto !important;">
            <div id="slider">
				<div id="slider-wrap" style="position: relative; width: 100%; height: 514px;">
					<?php if(have_rows('slider_items')) : ?>
						<?php while(have_rows('slider_items')) : the_row(); ?>
							<div class="slides">
								<a href="#">
									<img src="<?php the_sub_field('slider_image'); ?>" class="pngfix center">
								</a>
								<div class="featured-text">
									<p><?php the_sub_field('slider_description'); ?></p>
								</div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					<?php endif; ?>
				</div>
				<div id="nav-slider">
					<div class="nav-previous"><img class="pngfix" src="<?php echo THEME_URI; ?>/images/previous.png" alt="next slide"></div>
					<div class="nav-next"><img class="pngfix" src="<?php echo THEME_URI; ?>/images/next.png" alt="next slide"></div>
				</div>
			</div>
                         
            <div id="content-wrap" style="height: auto !important;">
                <div class="region region-content" style="height: auto !important;">
					<div id="block-system-main" class="block block-system"> 
					  	<div class="content">
					  		<?php
					  			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	                            $arys = array(
	                                'post_type'=>'post',
	                                'order'=>'ASC',
	                                'posts_per_page'=>3,
	                                'paged' => $paged

	                            );
	                            $wp_query= new WP_Query($arys);

	                            if($wp_query->have_posts()):
	                            	while($wp_query->have_posts()): $wp_query->the_post();
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
												<?php 
								                    $trimcontent = get_the_content(); 
								                    echo $shortContent = wp_trim_words( $trimcontent, $num_words = 50, $more = '...' );
								                ?>
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
							<?php endwhile; endif; ?>
                        	<?php wp_reset_postdata(); ?>
						</div>
					</div> 
					<!-- /.block -->


					<nav class="pagination-wrap">
		                <?php
		                     $big = 999999999;
		                     $pagination = paginate_links( array(
		                          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		                          'format' => '?paged=%#%',
		                          'current' => max( 1, get_query_var('paged') ),
		                          'total' => $wp_query->max_num_pages,
		                          'prev_text' => '&laquo; Previous',
		                          'next_text' => 'Next &raquo ;'
		                     ) );
		                     echo $pagination;
		                ?>
		            </nav>

		            <!-- Diesel Block grid-products-ad -->
					<?php get_template_part('include/ads/ads-block-3'); ?>

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