<?php
/*
Template Name Posts: Apps
*/
	get_header(); 
?>

<div id="main">	
	<!--content-->
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
		$post_meta = get_post_custom(); ?>

		<div class="container">
			<div id="content" class="wide">
				<div class="post-entry app-item">
					<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>
					<?php if ( has_post_thumbnail() ) {
						echo "<div class='app-icon'>";
						set_post_thumbnail_size( 80, 80, false );
						the_post_thumbnail();
						echo "</div>";
					} ?>

					<h1><?php the_title(); ?></h1>
					<?php the_tags("<div class='app-tags'>", "", "</div>" ); ?> 

					<div class='app-overview'>
						<div class='app-description'>
							<p><?php echo isset($post_meta["app_description"][0]) ? $post_meta["app_description"][0] : "no description" ?></p>
							<?php the_content() ?>
						</div>
						<div class='app-links'>
							<?php if (isset($post_meta["app_link_web"])): ?>
							<div class='app-link-item'>
								<a class='button' href='<?php echo $post_meta["app_link_web"][0] ?>'>Try it on your browser</a>
							</div>
							<?php endif ?>
							<?php if (isset($post_meta["app_link_ios"])): ?>
							<div class='app-link-item'>
								<a href='<?php echo $post_meta["app_link_ios"][0] ?>'>
									<img src='<?php get_site_url() ?>/wp-content/themes/panoramica/images/app-badge-ios.png' />
								</a>
							</div>
							<?php endif ?>
							<?php if (isset($post_meta["app_link_android"])): ?>
							<div class='app-link-item'>
								<a href='<?php echo $post_meta["app_link_android"][0] ?>'>
									<img src='<?php get_site_url() ?>/wp-content/themes/panoramica/images/app-badge-android.png' />
								</a>
							</div>
							<?php endif ?>
						</div>
						<?php if (count($post_meta["app_screenshot"]) > 0): ?>
						<div class='app-gallery'>
							<div class='app-screenshots'>
								<ul>
									<?php foreach($post_meta["app_screenshot"] as $screenshot){ ?>
										<li>
											<a href="<?php echo $screenshot ?>" rel="prettyPhoto">
												<img src="<?php echo $screenshot ?>" alt="Screenshot for <?php the_title(); ?>" />
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<?php endif ?>
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
				</div><!--post-entry end-->
				<?php if (function_exists('synved_social_share_markup')) echo synved_social_share_markup(); ?>
				<?php comments_template( '', true );?>
			</div> 
		</div>
	<?php endwhile; ?>

</div>
<?php get_footer(); ?>
