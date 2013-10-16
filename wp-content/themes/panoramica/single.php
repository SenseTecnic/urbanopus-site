<?php get_header(); ?>

<div id="main">
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	
	<?php cpotheme_breadcrumb(); ?>

	<div id="pagetitle">
		<div class="container">
			<h1 class="title"><?php the_title(); ?></h1>
		</div>
	</div>
		
	<div class="container">
		<div id="content">
			<?php get_template_part('element', 'blog'); ?>
			<?php if(get_the_author_meta('description')) cpotheme_post_authorbio(); ?>
			<?php comments_template('', true); ?>
		</div>
		<?php get_sidebar('blog'); ?>
	</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>