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
		<div id="content" class="wide">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php $args = array(
				'post_type' => 'attachment',
				'posts_per_page' => -1,
				'post_status' => null,
				'post_mime_type' => 'image',
				'post_parent' => $post->ID);
				$attachments = get_posts($args);
				$feature_count = 0;
				if($attachments): ?>
				<div class="slides">
					<ul>
						<?php foreach($attachments as $attachment): $feature_count++; ?>
						<li>
							<?php the_attachment_link($attachment->ID, true); ?>
							<?php if($attachment->post_excerpt != ''): ?>
							<div class="content"><?php echo $attachment->post_excerpt; ?></div>
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ul>
					<div class="pages"></div>
				</div>
				<?php endif; ?>

				<div class="content">
					<?php the_content(); ?>
				</div>
				<?php wp_link_pages(array('before' => '<div id="postpagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>


<?php get_footer(); ?>