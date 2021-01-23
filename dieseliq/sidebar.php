<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<!-- Diesel Block sideNav-ad -->
<?php get_template_part('include/ads/ads-block-2'); ?>
	
<div id="block-menu-menu-diesel-articles" class="block block-menu">
	<h2>Diesel Articles</h2>
	<div class="content">
		<ul class="menu">
			<?php
                $blog_arys = array(
                    'post_type'=>'post',
                    'order'=>'ASC',
                    'status'=>'publish',
                    'posts_per_page'=>25

                );
                $blogQuery= new WP_Query($blog_arys);
                while($blogQuery->have_posts()): $blogQuery->the_post();
            ?>
				<li class="leaf"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>  
	</div>
</div>
<!-- /.block -->

<div id="block-search-form" class="block block-search">  
	<div class="content">

		<form method="get" action="<?php bloginfo('home'); ?>/" id="search-block-form">
			<div>
				<div class="container-inline">
					<h2 class="element-invisible">Search form</h2>
					<div class="form-item form-type-textfield form-item-search-block-form">
						<label class="element-invisible" for="edit-search-block-form--2">Search </label>
						<input  type="text" title="Enter the terms you wish to search for." name="s" placeholder="Search" id="search" value="<?php the_search_query(); ?>" size="15" maxlength="128" class="form-text">
					</div>
					<div class="form-actions form-wrapper" id="edit-actions">
						<input name="post_type" type="hidden" value="blog">
						<input type="submit" id="edit-submit" class="form-submit">
					</div>
				</div>
			</div>
		</form> 

	</div>
</div> 
<!-- /.block -->

<div id="block-book-navigation" class="block block-book">
	<h2>Diesel Categories</h2>
	<div class="content">
		<div id="book-block-menu-4" class="book-block-menu">
			<ul class="menu">
				<li class="first last collapsed"><a href="#">Cummins Diesel 5.9 Liter B Series Engines</a></li>
			</ul>  
		</div>
		<div id="book-block-menu-30" class="book-block-menu">
			<ul class="menu">
				<li class="first last collapsed"><a href="#">Troubleshooting Cummins Diesel Engines</a></li>
			</ul>  
		</div>
		<div id="book-block-menu-6" class="book-block-menu">
			<ul class="menu">
				<li class="first last collapsed"><a href="#">Cummins Diesel Engine Service</a></li>
			</ul>  
		</div>
		<div id="book-block-menu-41" class="book-block-menu">
			<ul class="menu">
				<li class="first last collapsed"><a href="#">Power Stroke 7.3 Liter Diesel Engines</a></li>
			</ul>  
		</div>
	</div>
</div> 
<!-- /.block -->