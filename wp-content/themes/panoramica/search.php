<?php get_header(); ?>

<div id="main">
	<div id="pagetitle">
		<div class="container">
			<h1 class="title"><?php _e('Search Results for', 'cpotheme') ?> '<?php echo the_search_query();?>'</h1>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php $current_format = get_post_format(); ?>
			<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>"> 
				<?php if(get_post_type() == 'post'): ?>
				<?php if($current_format == 'gallery'): ?>
				<?php $args = array(
				'post_type' => 'attachment',
				'numberposts' => null,
				'post_status' => null,
				'post_mime_type' => 'image',
				'post_parent' => $post->ID);
				$attachments = get_posts($args);
				$thumb_count = 0;
				if($attachments){ ?>
				<div class="slides">
					<ul>
						<?php foreach($attachments as $attachment): $thumb_count++; ?>
						<li <?php if($thumb_count != 1) echo 'style="display:none;"'; ?>>
							<?php the_attachment_link($attachment->ID, true); ?>
							<?php if($attachment->post_excerpt != ''): ?>
							<div class="content"><?php echo $attachment->post_excerpt; ?></div>
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ul>
					<div class="pages"></div>
				</div>
				<?php } ?>
				<?php elseif(has_post_thumbnail()): ?>
				<div class="thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark">
						<?php the_post_thumbnail('800'); ?>
					</a>
				</div>
				<?php endif; ?>
				
				<div class="byline">
					<div class="date"><?php the_time(get_option('date_format')); ?></div>
					<div class="author"><?php cpotheme_post_author(); ?></div>
					<div class="category"><?php cpotheme_post_categories(); ?></div>
					<div class="comments"><?php cpotheme_post_comments(); ?></div>
					<?php cpotheme_edit(); ?>
				</div>  
				<?php endif; ?>
				<h2 class="title">
					<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<div class="content">
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cpotheme'); ?> &raquo;</a>
				</div>
			</div>
			<?php endwhile; ?>
			<?php cpotheme_pagination(); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
