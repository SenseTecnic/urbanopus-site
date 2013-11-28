<?php
/*
  This template is used to display individual blog entries.
 */
?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

	<?php if(!is_singular()): ?>
	<h2 class="title">
		<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>
	<?php endif; ?>
	<?php if(has_post_thumbnail()): ?>
	<div class="thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<?php endif; ?>
	<div class="byline">
		<div class="date">
			<?php the_time('M d'); ?>
			<span class="icon icon-time"></span>
		</div>
		<?php cpotheme_post_author(); ?>
		<?php cpotheme_post_categories(); ?>
		<?php cpotheme_post_comments(); ?>
		<?php cpotheme_edit(); ?>
	</div>
	<div class="content">
		<?php if(is_singular()) 
			the_content();
		else 
			the_excerpt(); ?>
		<?php if(!is_singular()): ?>
		<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cpotheme'); ?> &raquo;</a>
		<?php else: ?>
		<?php cpotheme_post_tags(); ?>
		<?php endif; ?>
	</div>
</div>
