<?php
/*
  This template is used to display individual portfolio previews.
 */
?>

<div class="item">
	<a class="thumbnail" href="<?php the_permalink(); ?>">
		<div class="overlay primary_color_bg"></div>
		<div class="icon icon-search"></div>
		<?php the_post_thumbnail('portfolio', array('title' => '')); ?>
	</a>
	<a href="<?php the_permalink(); ?>">
		<h3 class="title primary_color_bg"><?php the_title(); ?></h3>
	</a>
	<?php cpotheme_edit(); ?>
</div>
				