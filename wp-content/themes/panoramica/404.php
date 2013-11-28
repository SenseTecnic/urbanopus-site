<?php get_header(); ?>

<div id="main">
	<div id="pagetitle">
		<div class="container">
			<h1 class="title"><?php _e('Error 404 - Page Not Found', 'cpotheme'); ?></h1>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="entry">
				<div class="content page">
					<?php _e('The requested page could not be found. It could have been deleted or changed location. Try searching for it using the search function.', 'cpotheme'); ?>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>