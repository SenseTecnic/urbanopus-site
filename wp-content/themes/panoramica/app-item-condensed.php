<?php $post_meta = get_post_custom(); ?>
<div class="app-item-condensed">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'panoramica' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<div class='app-icon'>
		<?php if ( has_post_thumbnail() ) {
			set_post_thumbnail_size( 80, 80, false );
			the_post_thumbnail();
		} else { ?>
			<img src="<?php echo get_site_url(); ?>/wp-content/themes/panoramica/images/app-icon-none.png" />
		<?php } ?>
		</div>
	</a>
	<div class="app-info">
		<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'panoramica' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if ( get_the_title() == '' ) { _e( '(No title)', 'panoramica' ); } else { the_title(); } ?></a></h4>
		<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>

		<div class='app-details'>
			<div class='app-details-item app-developer'>
				<?php if(isset($post_meta["app_developer_url"][0])): ?>
				<a href="<?php echo $post_meta["app_developer_url"][0]; ?>">
					<?php echo isset($post_meta["app_developer"][0]) ? $post_meta["app_developer"][0] : ""; ?>
				</a>
				<?php else: ?>
					<?php echo isset($post_meta["app_developer"][0]) ? $post_meta["app_developer"][0] : ""; ?>
				<?php endif ?>
			</div>
			<div class='app-details-item app-price'>
				<?php echo isset($post_meta["app_price"][0]) ? $post_meta["app_price"][0] : ""; ?>
			</div>
		</div>

		<?php the_tags("<div class='app-tags'>", "", "</div>" ); ?> 
		<div class="clear"></div>
	</div>
</div><!--post-entry end-->
	