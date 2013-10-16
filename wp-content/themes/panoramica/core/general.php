<?php

//Displays the blog title and descripion in home or frontpage
function cpotheme_title(){
	global $post, $page, $paged;
	
	$separator = '|';	
	$description = get_bloginfo('description', 'display');
	$title = wp_title($separator, false, 'right');
	$name = get_bloginfo('name');
	$full_title = $title.get_bloginfo('name');
	
	//Homepage title
	if($description && (is_home() || is_front_page()))
		$full_title .= ' '.$separator.' '.$description;
	
	//Page numbers
	if($paged >= 2 || $page >= 2) 
		$full_title .= ' | '.sprintf( __('Page %s', 'cpocore'), max($paged, $page));
	
	echo $full_title;
}


//DEPRECATED: Displays the blog title and descripion in home or frontpage
function cpotheme_title_old(){
	global $post, $page, $paged;
	$title = '';
	if(cpotheme_get_option('cpo_seo_global') == '1'){
		if(is_home() || is_front_page())
			$title = cpotheme_get_option('cpo_general_title');
		else
			$title = get_post_meta($post->ID, 'seo_title', true);
		if($title != '') echo $title;
	}
	
	//Default to normal titles if SEO titles are blank or turned off
	if($title == ''){
		$separator = '';
		if(cpotheme_get_option('cpo_seo_global') == '1')
			$separator = cpotheme_get_option('cpo_title_separator');
		if($separator == '') $separator = '|';
		wp_title($separator, true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if($site_description && (is_home() || is_front_page()))
			echo ' '.$separator.' '.$site_description;
	
		// Page numbers
		if($paged >= 2 || $page >= 2) echo ' | '.sprintf( __('Page %s', 'cpocore'), max($paged, $page));
	}
}


//Display the meta description
function cpotheme_description(){
	global $post;
	$description = '';
	//Check if SEO is enabled
	if(cpotheme_get_option('cpo_seo_global') == '1'){
		if(is_home() || is_front_page()){
			//Check for the homepage value
			$description = cpotheme_get_option('cpo_general_description');
			
			//If not, resort to default values
			if($description == '') 
				$description = cpotheme_get_option('cpo_default_description');
		}else{
			//Check whether custom SEO for individual pages is enabled
			$description = get_post_meta($post->ID, 'seo_description', true);
			
			//If not, resort to default values
			if($description == '')
				$description = cpotheme_get_option('cpo_default_description');
		}
		if($description != '') echo '<meta name="description" content="'.$description.'" />';
	}
}

//Display custom favicon
add_action('wp_head','cpotheme_favicon');
function cpotheme_favicon(){
	$favicon_url = cpotheme_get_option('cpo_general_favicon');
	if($favicon_url != '')
    	echo '<link type="image/x-icon" href="'.esc_url($favicon_url).'" rel="icon" />';
}

//Display custom favicon
add_action('wp_head','cpotheme_viewport');
function cpotheme_viewport(){
	$responsive_styles = get_template_directory_uri().'/style-responsive.css';
	if(cpotheme_get_option('cpo_layout_responsive') != 0 && file_exists($responsive_styles))
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>';
}

//Display meta keywords
function cpotheme_keywords(){
	global $post;
	$keywords = '';
	//Check if SEO is enabled
	if(cpotheme_get_option('cpo_seo_global') == '1'){
		if(is_home() || is_front_page()){
			//Check for the homepage value
			$keywords = cpotheme_get_option('cpo_general_keywords');
			
			//If not, resort to default values
			if($keywords == '') 
				$keywords = cpotheme_get_option('cpo_default_keywords');
		}else{
			//Check whether custom SEO for individual pages is enabled
			$keywords = get_post_meta($post->ID, 'seo_keywords', true);
			
			//If not, resort to default values
			if($keywords == '')
				$keywords = cpotheme_get_option('cpo_default_keywords');
		}
		if($keywords != '') echo '<meta name="keywords" content="'.$keywords.'" />';
	}
}

//Display shortcut edit links for logged in users
function cpotheme_edit(){
	if(cpotheme_get_option('cpo_general_editlinks'))
		edit_post_link(__('<span class="icon-cogs"></span> Edit', 'cpocore'));
}

//Display the site's logo
function cpotheme_logo($width, $height){
	$output = '<div id="logo" class="logo">';
	if(cpotheme_get_option('cpo_general_texttitle') == 0){
		if(cpotheme_get_option('cpo_general_logo') == '')
			$output .= '<a href="'.home_url().'"><img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('name').'" width="'.$width.'" height="'.$height.'"/></a>';
		else
			$output .= '<a href="'.home_url().'"><img src="'.cpotheme_get_option('cpo_general_logo').'" alt="'.get_bloginfo('name').'"/></a>';
	}
	
	$classes = '';
	if(cpotheme_get_option('cpo_general_texttitle') == 0) $classes = ' hidden';
	if(is_singular() && !is_front_page()){
		$output .= '<span class="title'.$classes.'"><a href="'.home_url().'">'.get_bloginfo('name').'</a></span>';
	}else{
		$output .= '<h1 class="title'.$classes.'"><a href="'.home_url().'"><img style="vertical-align:middle" src="'.cpotheme_get_option('cpo_general_logo').'" alt="'.get_bloginfo('name').'"/>'.get_bloginfo('name').'</a></h1>';
	}
	
	$output .= '<span class="description">'.get_bloginfo('description').'</span>';
	$output .= '</div>';
	echo $output;
}


//Display language switcher
function cpotheme_languages(){
	if(cpotheme_get_option('cpo_layout_languages') == 1 && function_exists('icl_get_languages')):
	$output = '<div id="languages">';
	$langs = icl_get_languages('skip_missing=0&orderby=code');
	foreach($langs as $current_lang):
		$output .= '<a href="'.$current_lang['url'].'" id="language-switch-'.$current_lang['language_code'].'">';
		$output .= $current_lang['translated_name'];
		$output .= '</a>';
	endforeach;
	$output .= '</div>';
	echo $output;
	endif;
}

//Display social links
function cpotheme_social(){
	$output = '<div id="social">';
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_facebook'), 'Facebook', 'facebook');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_twitter'), 'Twitter', 'twitter');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_gplus'), 'Google Plus', 'google-plus');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_youtube'), 'YouTube', 'youtube');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_linkedin'), 'LinkedIn', 'linkedin');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_pinterest'), 'Pinterest', 'pinterest');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_foursquare'), 'Foursquare', 'foursquare');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_tumblr'), 'Tumblr', 'tumblr');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_flickr'), 'Flickr', 'flickr');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_instagram'), 'Instagram', 'instagram');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_dribbble'), 'Dribbble', 'dribbble');
	$output .= cpotheme_social_item(cpotheme_get_option('cpo_social_skype'), 'Skype', 'skype');
	$output .= '</div>';
	echo $output;
}

function cpotheme_social_item($url, $title = '', $icon = ''){
	if($url != ''):
		$output = '<a class="social_profile" href="'.$url.'" title="'.$title.'">';
		if($icon != '') $output .= '<span class="social_icon icon-'.$icon.'"></span>';
		if($title != '') $output .= '<span class="social_title">'.$title.'</span>';
		$output .= '</a>';
		return $output;
	endif;
}

//Display custom font stylesheets from Google Fonts
function cpotheme_fonts($font_name){
	echo '<link href="http://fonts.googleapis.com/css?family='.$font_name.'" rel="stylesheet" type="text/css">';
}

//Adds custom analytics code in the footer
add_action('wp_footer','cpotheme_layout_analytics');
function cpotheme_layout_analytics(){
	$output = cpotheme_get_option('cpo_general_analytics');
	$output = stripslashes($output);
	echo $output;
}

//Adds custom javascript code in the footer
add_action('wp_footer', 'cpotheme_layout_js');
function cpotheme_layout_js(){
	$output = cpotheme_get_option('cpo_general_js');
	if($output != ''){
		$output = '<script type="text/javascript">'.stripslashes($output).'</script>';
		echo $output;
	}
}

//Adds custom css code in the footer
add_action('wp_head','cpotheme_layout_css', 25);
function cpotheme_layout_css(){
	$output = cpotheme_get_option('cpo_general_css');
	if($output != ''){
		$output = '<style type="text/css">'.stripslashes($output).'</style>';
		echo $output;
	}
}

//Abstracted function for retrieving specific options inside option arrays
function cpotheme_get_option($option_name = '', $option_array = 'cpotheme_settings'){
	$option_list_name = $option_array.cpotheme_wpml_current_language();
	$option_list = get_option($option_list_name, false);
	if($option_list && isset($option_list[$option_name]))
		$option_value = $option_list[$option_name];
	else
		$option_value = false;
	return $option_value;
}

//Abstracted function for updating specific options inside arrays
function cpotheme_update_option($option_name, $option_value, $option_array = 'cpotheme_settings'){
	$option_list_name = $option_array.cpotheme_wpml_current_language();
	$option_list = get_option($option_list_name, false);
	if(!$option_list)
		$option_list = array();
	$option_list[$option_name] = $option_value;
	if(update_option($option_list_name, $option_list))
		return true;
	else
		return false;
}

//Returns the current language's code in the event that WPML is active
function cpotheme_wpml_current_language(){
	$language_code = '';
	if(cpotheme_custom_wpml_active()){		
		$default_language = cpotheme_custom_wpml_default_language();
		$active_language = ICL_LANGUAGE_CODE;
		if($active_language != $default_language)
			$language_code = '_'.$active_language;
	}
	return $language_code;
}

function cpotheme_sidebar_position(){
	if(cpotheme_get_option('cpo_sidebar_position') == 'left') echo 'class="right"';
}

// Generates breadcrumb navigation 
function cpotheme_breadcrumb(){
	if(cpotheme_get_option('cpo_layout_breadcrumbs') && !is_home() && !is_front_page()):
		if(function_exists('yoast_breadcrumb')):
			$result = yoast_breadcrumb('','', false);
		else:
			global $post;
			if(is_object($post)) $pid = $post->ID; else $pid = '';
			$result = '';
			
			if($pid != ''):
				if(is_singular()):
					$post_data = get_post($pid);
					$result = "<span>".apply_filters('the_title', $post_data->post_title)."</span>\n";
					
					if(is_singular('cpo_portfolio') && cpotheme_get_option('cpo_postpage_portfolio') != 0):
					$selected_page = get_post(cpotheme_get_option('cpo_postpage_portfolio'));
					$result = '<a href="'.get_permalink(cpotheme_get_option('cpo_postpage_portfolio')).'">'.$selected_page->post_title.'</a>'.$result;
					endif;

					if(is_singular('post') && cpotheme_get_option('cpo_postpage_blog') != 0):
					$selected_page = get_post(cpotheme_get_option('cpo_postpage_blog'));
					$result = '<a href="'.get_permalink(cpotheme_get_option('cpo_postpage_blog')).'">'.$selected_page->post_title.'</a>'.$result;
					endif;
					
					while($post_data->post_parent):
						$post_data = get_post($post_data->post_parent);
						$result = "<a href='".get_permalink($post_data->ID)."'>".apply_filters('the_title', $post_data->post_title)."</a>\n".$result;
					endwhile;
			
				elseif(is_category()):			
					if(is_singular('post') && cpotheme_get_option('cpo_postpage_blog') != 0):
					$selected_page = get_post(cpotheme_get_option('cpo_postpage_blog'));
					$result = '<a href="'.get_permalink(cpotheme_get_option('cpo_postpage_blog')).'">'.$selected_page->post_title.'</a>'.$result;
					endif;
					
					$post_data = get_the_category($pid);
					if(isset($post_data[0])):
						$data = get_category_parents($post_data[0]->cat_ID, TRUE, ' &raquo; ');
						if(!is_object($data)):
							$result = ''.substr($data, 0, -8).$result;
						endif;
					endif;
				endif;
			endif;
			
			$result = '<a href="'.home_url().'">'.__('Home', 'cpocore').'</a>'.$result;
			
		endif; ?>   
		<div id='breadcrumb'>
			<div class='container'>
				<?php echo $result; ?>
			</div>
		</div>
		<?php
	endif;
}

//Displays the post date
function cpotheme_postpage_date($format = ''){
    if(cpotheme_get_option('cpo_postpage_dates') != 0){
		if($format = '') $format = get_option('date_format');
		echo '<div class="date">'.get_the_date($format).'</div>';
	}
}

//Displays the author link
function cpotheme_postpage_author(){
    if(cpotheme_get_option('cpo_postpage_authors') != 0){
		$author_alt = sprintf(esc_attr__('View all posts by %s', 'cpotheme'), get_the_author());
		$author = sprintf('<a href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), $author_alt, get_the_author());
		echo '<div class="author">'.$author.'</div>';
	}
}

//Displays the category list for the current post
function cpotheme_postpage_categories(){
    if(cpotheme_get_option('cpo_postpage_categories') != 0){
		echo '<div class="category">'.get_the_category_list(', ').'</div>';
	}
}

//Displays the number of comments for the post
function cpotheme_postpage_comments(){
	if(cpotheme_get_option('cpo_postpage_comments') != 0){
		$comments_num = get_comments_number();
		if($comments_num == 0)
			$comments = __('No Comments', 'cpotheme');
		elseif($comments_num == 1)
			$comments = __('One Comment', 'cpotheme');
		else
			$comments = sprintf(__('%1$s Comments', 'cpotheme'), number_format_i18n($comments_num));
		
		echo '<div class="comments">'.sprintf('<a href="%1$s">%2$s</a>', get_permalink(get_the_ID()).'#comments', $comments).'</div>';
	}
}

//Displays the post tags
function cpotheme_postpage_tags(){
	if(cpotheme_get_option('cpo_postpage_tags') != 0){
		$tag_list = get_the_tag_list('<ul class="tags"><li class="primary_color_bg">','</li> <li class="primary_color_bg">','</li></ul>');
		if($tag_list):
			echo $tag_list;		
		endif;
	}
}

//Displays a slideshow of the given query
function cpotheme_post_slideshow($args, $options = null){
	$attachments = get_posts($args);
	$thumb_count = 0;
	if($attachments){ ?>
	<div class="inline_slider">
		<div class="slides">
			<?php foreach($attachments as $attachment): $thumb_count++; ?>
			<div class="slide" <?php if($thumb_count != 1) echo 'style="display:none;"'; ?>>
				<?php the_attachment_link($attachment->ID, true); ?>
				<?php if($attachment->post_excerpt != ''): ?>
				<div class="content"><?php echo $attachment->post_excerpt; ?></div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="pages"></div>
	</div>
	<?php }
}

//Displays a gallery of the given query
function cpotheme_post_gallery($args, $columns){
	$attachments = get_posts($args);
	$feature_count = 0;
	if($attachments){ ?>
	<div class="gallery">
		<?php foreach($attachments as $attachment): ?>
		<?php if($feature_count % $columns == 0 && $feature_count != 0) echo '<div class="col_divide"></div>'; ?>
		<?php $feature_count++; ?>
		<div class="column col<?php echo $columns; if($feature_count % $columns == 0 && $feature_count != 0) echo ' col_last'; ?>">
			<?php if($attachment->post_excerpt != ''): ?>
			<div class="content"><?php echo $attachment->post_excerpt; ?></div>
			<?php endif; ?>
			<?php $source = wp_get_attachment_image_src($attachment->ID, 'portfolio_large'); ?>
			<?php $original_source = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
			<a href="<?php echo $original_source[0]; ?>" rel="gallery[portfolio]">
				<img src="<?php echo $source[0]; ?>"/>
			</a>
		</div>
		<?php endforeach; ?>
		<div class="clear"></div>
	</div>
	<?php }
}


//Displays a video of the given query
function cpotheme_post_video($video_url){
	if($video_url != ''){ ?>
	<div class="video">
		<iframe src="<?php echo $video_url; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	</div>
	<?php }
}

//Paginates a single post's content by using a numbered list
function cpotheme_pagination(){
	$query = $GLOBALS['wp_query'];
	$posts_per_page = 7;
	$current_page = max(1, absint($query->get('paged')));
	$total_pages = max(1, absint($query->max_num_pages));

	if(1 == $total_pages) return;

	$request = $query->request;
	$numposts = $query->found_posts;

	$pages_to_show = 8;
	$larger_page_to_show = 10;
	$larger_page_multiple = 2;
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor( $pages_to_show_minus_1/2 );
	$half_page_end = ceil( $pages_to_show_minus_1/2 );
	$start_page = $current_page - $half_page_start;

	$end_page = $current_page + $half_page_end;
	
	if(($end_page - $start_page) != $pages_to_show_minus_1)
		$end_page = $start_page + $pages_to_show_minus_1;

	if($end_page > $total_pages){
		$start_page = $total_pages - $pages_to_show_minus_1;
		$end_page = $total_pages;
	}

	if($start_page < 1)
		$start_page = 1;

	$out = '';

	//First Page Link
	if(1 == $current_page)
		$out .= '<span class="first_page">'.__('First', 'cpocore').'</span>';
	else
		$out .= '<a class="page first_page" href="'.esc_url(get_pagenum_link(1)).'">'.__('First', 'cpocore').'</a>';

	//Show each page
	foreach(range($start_page, $end_page) as $i){
		if($i == $current_page){
			$out .= "<span>$i</span>";
		}else{ 
			$out .= '<a class="page" href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a>';
		}
	}
	
	//Last Page Link
	if($total_pages == $current_page)
		$out .= '<span class="first_page">'.__('Last', 'cpocore').'</span>';
	else
		$out .= '<a class="page last_page" href="'.esc_url(get_pagenum_link($total_pages)).'">'.__('Last', 'cpocore').'</a>';
	
	$out = '<div id="pagination">'.$out.'</div>';

	echo $out;
}

//Prints the main navigation menu
function cpotheme_menu(){
	echo '<nav id="menu">';
	if(has_nav_menu('main_menu'))
		wp_nav_menu(array('menu_class' => 'nav_main', 'theme_location' => 'main_menu', 'depth' => '4', 'container' => false, 'walker' => new Cpotheme_Menu_Walker()));
	else
		wp_nav_menu(array('menu_class' => 'nav_main', 'depth' => '4', 'container' => false));
	echo '<div class="clear"></div>';
	echo '</nav>';
}

//Displays a dropdown list of the main menu items
function cpotheme_mobile_menu(){
	if(has_nav_menu('main_menu') && cpotheme_get_option('cpo_layout_responsive') != 0){
		//Get all custom menus, then retrieve the one set to the main menu
		$menu_locations = get_nav_menu_locations();
		$menu_object = wp_get_nav_menu_object($menu_locations['main_menu']);
		
		if($menu_object){
			$menu_items = wp_get_nav_menu_items($menu_object->term_id);
			$current_parent = array();
			$current_level = 0;
			$last_id = 'root';
			$output = '';
			$output .= '<select id="mobilemenu">';
			$output .= '<option value="#">'.__('Go To...', 'cpocore').'</option>';
			foreach($menu_items as $current_item){
				$item_title = '';
				//Go down a level
				if($current_item->menu_item_parent == $last_id){
					$current_level++;
					array_push($current_parent, $last_id);
				//Go back up a level, check if going up more than once
				}elseif($current_level > 0 && $current_item->menu_item_parent != end($current_parent)){
					while($current_item->menu_item_parent != end($current_parent)){
						$current_level--;
						array_pop($current_parent);
					}
				}
				
				$item_title .= str_repeat('-', $current_level).' ';
				$item_title .= $current_item->title;
				$item_url = $current_item->url;
				$last_id = $current_item->ID;
				$output .= '<option value="'.$item_url.'">'.$item_title.'</option>';
			}
			$output .= '<select>';
			echo $output;
		}
	}
}


//Removes WordPress automatic paragraphs
function cpotheme_submenu(){ 
	$page_navigation = get_post_meta(get_the_ID(), 'page_navigation', true);
	global $post;
	$output = '';
	
	//Submenu of children
	if($page_navigation == 'children'):
	$output = '<ul class="nav_sub">';
	$output .= '<li class="page_item page-item-'.get_the_ID().' current_page_item">';
	$output .= '<a href="'.get_permalink().'">'.get_the_title().'</a>';
	$output .= '</li>';
	$output .= wp_list_pages("echo=0&title_li=&child_of=".$post->ID);
	$output .= '</ul>';
	endif;
	
	//Submenu of siblings
	if($page_navigation == 'siblings'):
	$parent_post = get_post($post->post_parent);
	$output = '<ul class="nav_sub">';
	$output .= '<li class="page_item page-item-'.$post->post_parent.' current_page_item">';
	$output .= '<a href="'.get_permalink($parent_post->ID).'">'.$parent_post->post_title.'</a>';
	$output .= '</li>';
	$output .= wp_list_pages("echo=0&title_li=&child_of=".$post->post_parent);
	$output .= '</ul>';
	endif;
	
	echo $output;
}


//Removes WordPress automatic paragraphs
function cpotheme_remove_autop($content){ 
	$content = do_shortcode(shortcode_unautop($content)); 
	$content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
	return $content;
}


//Changes the brighness of a HEX color
function cpotheme_alter_brightness($colourstr, $steps) {
	$colourstr = str_replace('#','',$colourstr);
	$rhex = substr($colourstr,0,2);
	$ghex = substr($colourstr,2,2);
	$bhex = substr($colourstr,4,2);

	$r = hexdec($rhex);
	$g = hexdec($ghex);
	$b = hexdec($bhex);

	$r = max(0,min(255,$r + $steps));
	$g = max(0,min(255,$g + $steps));  
	$b = max(0,min(255,$b + $steps));
  
	$r = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
	$g = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);  
	$b = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
	return '#'.$r.$g.$b;
}