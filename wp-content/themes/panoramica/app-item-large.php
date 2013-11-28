<?php $post_meta = get_post_custom(); ?>
<div class="post-entry app-item">
	<a href="<?php the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) {
		echo "<div class='app-icon'>";
		set_post_thumbnail_size( 80, 80, false );
		the_post_thumbnail();
		echo "</div>";
	} ?>
	</a>

	<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>
	<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'panoramica' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if ( get_the_title() == '' ) { _e( '(No title)', 'panoramica' ); } else { the_title(); } ?></a></h1>			
	<?php the_tags("<div class='app-tags'>", "", "</div>" ); ?> 

	<div class='app-overview'>
		<div class='app-description'>
			<p><?php echo isset($post_meta["app_description"][0]) ? $post_meta["app_description"][0] : "no description" ?></p>
			<?php the_content() ?>
		</div>
	</div>
	<div class='app-details'>
		<div class='app-details-item app-developer'>
			<span>Developer</span>
			<?php if(isset($post_meta["app_developer_url"][0])): ?>
			<a href="<?php echo $post_meta["app_developer_url"][0]; ?>">
				<?php echo isset($post_meta["app_developer"][0]) ? $post_meta["app_developer"][0] : ""; ?>
			</a>
			<?php else: ?>
				<?php echo isset($post_meta["app_developer"][0]) ? $post_meta["app_developer"][0] : ""; ?>
			<?php endif ?>
		</div>
		<div class='app-details-item app-version'>
			<span>Version</span>
			<?php echo isset($post_meta["app_version"][0]) ? $post_meta["app_version"][0] : "" ?>
		</div>
		<div class='app-details-item app-updated'>
			<span>Last updated</span>
			<?php echo isset($post_meta["app_updated"][0]) ? $post_meta["app_updated"][0] : "" ?>
		</div>
		<div class='app-details-item app-size'>
			<span>Size</span>
			<?php echo isset($post_meta["app_size"][0]) ? $post_meta["app_size"][0] : "N/A"; ?>
		</div>
		<div class='app-details-item app-price'>
			<span>Price Model</span>
			<?php echo isset($post_meta["app_price"][0]) ? $post_meta["app_price"][0] : ""; ?>
		</div>
		<div style='clear:both'></div>
	</div>
	<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'panoramica' ), 'after' => '' ) ); ?>
</div>
