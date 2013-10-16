<?php
/*
  Template Name: Full-width Page
 */
?>
<?php get_header(); ?>

<div id="main">	
	<?php if(have_posts()) while(have_posts()): the_post(); ?>

	<?php get_template_part('element', 'page-header'); ?>
		
	<div class="container">
		<div id="content" class="wide">
			<div id="post-<?php the_ID(); ?>" class="entry">
				<div class="content page">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">'.__('Pages', 'cpotheme').':', 'after' => '</div>')); ?>
				</div>
			</div>
			<?php comments_template('', true); ?>
		</div>
	</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>