<?php get_header(); ?>

<div id="main">

	<?php if ( !is_category( "Apps" ) ){ cpotheme_breadcrumb(); } ?>
	
	<div id="pagetitle">
		<div class="container">
			<?php if(is_category()){ ?>

				<?php if ( is_category( "Apps" ) ): ?>
					<dl class="app-tabs">
						<dd><a href="<?php echo get_site_url(); ?>/app-browse">Search Apps</a></dd>
						<dd class="active"><a href="#">Browse Apps</a></dd>
					</dl>
				<?php else: ?>
					<h1 class="title"><?php echo single_cat_title(); ?></h1>
				<?php endif; ?>

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
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php if ( in_category( "Apps" ) ): ?>
				<div id="content" class="wide">
					<?php get_template_part( 'app-item-large', 'index' ); ?>
					<?php cpotheme_pagination(); ?>
				</div>
			<?php else: ?>
				<div id="content">
					<?php get_template_part('element', 'blog'); ?>
					<?php cpotheme_pagination(); ?>
				</div>
				<?php get_sidebar('blog'); ?>
			<?php endif; ?>

		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>