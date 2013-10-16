<?php get_header(); ?>

<div id="main">

	<?php cpotheme_breadcrumb(); ?>
	
	<div id="pagetitle">
		<div class="container">
			<?php if(is_category()){ ?>
			<h1 class="title"><?php echo single_cat_title(); ?></h1>
			<?php }elseif(is_day()){ ?>
			<h1 class="title"><?php _e('Daily Archive', 'cpotheme'); ?></h1>

			<?php }elseif(is_month()){ ?>
			<h1 class="title"><?php _e('Monthly Archive', 'cpotheme'); ?></h1>

			<?php }elseif(is_year()){ ?>
			<h1 class="title"><?php _e('Yearly Archive', 'cpotheme'); ?></h1>

			<?php }elseif(is_author()){ ?>
			<h1 class="title"><?php _e('Author Archive', 'cpotheme'); ?></h1>

			<?php }elseif(is_tag()){ ?>
			<h1 class="title"><?php echo single_tag_title('', true); ?></h1>
			<?php } ?>
		</div>
	</div>
		
	<div class="container">		
		<div id="content">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php get_template_part('element', 'blog'); ?>
			<?php endwhile; ?>
			<?php cpotheme_pagination(); ?>
			<?php endif; ?>
			
		</div>
		<?php get_sidebar('blog'); ?>
	</div>
</div>

<?php get_footer(); ?>