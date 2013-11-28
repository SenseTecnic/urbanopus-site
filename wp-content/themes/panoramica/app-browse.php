<?php
/*
Template Name: App Browse
*/
	get_header(); 
?>
<div id="main">	
	<div class="container">
		<dl class="app-tabs">
		  <dd class="active"><a href="#">Search Apps</a></dd>
		  <dd><a href="<?php echo get_site_url(); ?>/category/Apps">Browse Apps</a></dd>
		</dl>
		<div class="app-count-container">
			<span class="app-count">
				<?php echo get_term_by('name','Apps','category')->count; ?>
			</span>
			Apps
		</div>
		<div class="app-search-container">
			<form method="get" action="<?php bloginfo('url'); ?>">
				<fieldset>
					<input type="text" name="s" value="" placeholder="Search for apps&hellip;" maxlength="50" required="required" />
					<input name="category_name" value="Apps" type="hidden" />
					<button type="submit" class="button"><i class="icon-search"></i></button>
				</fieldset>
			</form>
		</div>
		<div class="clear"></div>
	</div>

	<div class="container app-featured-container">
		<h3>Featured Apps</h3>
		<ul>
			<li class="app-featured">
				<?php 
					$featured_post = get_post(FEATURED_APP_1);
					$post_meta = get_post_custom(FEATURED_APP_1); 
				?>
				<a class="featured-app-item" 
					href="<?php echo get_permalink(FEATURED_APP_1) ?>"
				<?php if (count($post_meta["app_screenshot"]) > 0): ?> 
					style="background:url('<?php echo $post_meta["app_screenshot"]["0"] ?>');"
				<?php endif; ?> >
					<div class="featured-app-item-details">
						<h4><?php echo $featured_post->post_title; ?></h4>
						<p><?php echo isset($post_meta["app_description"][0]) ? $post_meta["app_description"][0] : "no description" ?></p>
					</div>
				</a>
			</li>
			<li class="app-featured">
				<?php 
					$featured_post = get_post(FEATURED_APP_2);
					$post_meta = get_post_custom(FEATURED_APP_2); 
				?>
				<a class="featured-app-item" 
					href="<?php echo get_permalink(FEATURED_APP_2) ?>"
				<?php if (count($post_meta["app_screenshot"]) > 0): ?> 
					style="background:url('<?php echo $post_meta["app_screenshot"]["0"] ?>');"
				<?php endif; ?> >
					<div class="featured-app-item-details">
						<h4><?php echo $featured_post->post_title; ?></h4>
						<p><?php echo isset($post_meta["app_description"][0]) ? $post_meta["app_description"][0] : "no description" ?></p>
					</div>
				</a>
			</li>
			<li class="app-featured">
				<?php 
					$featured_post = get_post(FEATURED_APP_3);
					$post_meta = get_post_custom(FEATURED_APP_3); 
				?>
				<a class="featured-app-item" 
					href="<?php echo get_permalink(FEATURED_APP_3) ?>"
				<?php if (count($post_meta["app_screenshot"]) > 0): ?> 
					style="background:url('<?php echo $post_meta["app_screenshot"]["0"] ?>');"
				<?php endif; ?> >
					<div class="featured-app-item-details">
						<h4><?php echo $featured_post->post_title; ?></h4>
						<p><?php echo isset($post_meta["app_description"][0]) ? $post_meta["app_description"][0] : "no description" ?></p>
					</div>
				</a>
			</li>
		</ul>
		<div class="clear"></div>
	</div>

	<div class="container app-list-container">
		<div class="app-latest">
			<h3>Latest Apps</h3>
			<?php 
			 $posts = query_posts("category_name=Apps&limit=8'");
			 while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'app-item-condensed' ); ?>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'panoramica' ), 'after' => '' ) ); ?>
			<?php endwhile; ?>
		</div>
		<div class="app-top-rated">
			<h3>Top Rated Apps</h3>
			<?php //Get posts sort by average rating (kk star plugin required)
				$posts = query_posts("category_name=Apps&meta_key=_kksr_avg&orderby=meta_value&order=DESC&limit=8'");
			while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'app-item-condensed' ); ?>
			<?php endwhile; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
