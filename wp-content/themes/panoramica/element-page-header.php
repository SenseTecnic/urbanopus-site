<?php
/*
  This template is used to display the heading and banner of most pages.
 */
?>
<?php if(has_post_thumbnail()): ?>
<div id="banner">
	<?php the_post_thumbnail('full', array('class' => 'bannerimage')); ?>
</div>
<?php endif; ?>

<?php cpotheme_breadcrumb(); ?>
	
<?php if(!is_home() && !is_front_page()){ ?>
<div id="pagetitle">
	<div class="container">
		<h1 class="title"><?php the_title(); ?></h1>
	</div>
</div>
<?php } ?>