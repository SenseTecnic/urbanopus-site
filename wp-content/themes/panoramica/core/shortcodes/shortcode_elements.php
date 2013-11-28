<?php 

/* Button Shortcode */
if(!function_exists('cpotheme_shortcode_button')){
	function cpotheme_shortcode_button($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'url' => '',
			'size' => '',
			'icon' => '',
			'color' => ''
			), 
			$atts));
		
		$content = trim(strip_tags($content));
		$url = htmlentities($url);
		
		$size = trim(strip_tags($size));
		switch($size){
			case 'small': $button_size = ' button_small'; break;
			case 'medium': $button_size = ' button_medium'; break;
			case 'large': $button_size = ' button_large'; break;
			default: $button_size = ' button_normal'; break;
		}
		switch($color){
			case 'red': $button_color = ' button_red'; break;
			case 'blue': $button_color = ' button_blue'; break;
			case 'green': $button_color = ' button_green'; break;
			case 'gray': $button_color = ' button_gray'; break;
			case 'pink': $button_color = ' button_pink'; break;
			case 'orange': $button_color = ' button_orange'; break;
			case 'purple': $button_color = ' button_purple'; break;
			case 'teal': $button_color = ' button_teal'; break;
			case 'yellow': $button_color = ' button_yellow'; break;
			case 'black': $button_color = ' button_black'; break;
			case 'white': $button_color = ' button_white'; break;
			default: $button_color = ' primary_color_bg button_default'; break;
		}
		if($icon != '') $icon = '<span class="icon icon-'.htmlentities($icon).'"></span> ';
		
		return '<a class="button '.$button_size.$button_color.'" href="'.$url.'">'.$icon.$content.'</a>';
	}
	add_shortcode('button', 'cpotheme_shortcode_button');
}


/* Message Shortcode */
if(!function_exists('cpotheme_shortcode_message')){
	function cpotheme_shortcode_message($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'type' => ''), 
			$atts));
		
		$content = trim(strip_tags($content));	
		$type = trim(strip_tags($type));
		switch($type){
			case 'ok': $type = 'message_ok'; break;
			case 'error': $type = 'message_error'; break;
			case 'warning': $type = 'message_warn'; break;
			case 'info': $type = 'message_info'; break;
			default: $type = ''; break;
		}
		
		return '<span class="message_box '.$type.'">'.$content.'</span>';
	}
	add_shortcode('message', 'cpotheme_shortcode_message');
}


/* Notice Shortcode */
if(!function_exists('cpotheme_shortcode_notice')){
	function cpotheme_shortcode_notice($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'type' => ''), 
			$atts));
		
		$content = trim($content);	
		$type = trim(strip_tags($type));
		switch($type){
			case 'highlight': $type = 'notice_highlight'; break;
			default: $type = ''; break;
		}
		
		return '<div class="notice_box '.$type.'">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('notice', 'cpotheme_shortcode_notice');
}


/* Progress Bar Shortcode */
if(!function_exists('cpotheme_shortcode_bar')){
	function cpotheme_shortcode_bar($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'title' => '',
			'value' => '100',
			'size' => '',
			'icon' => '',
			'color' => ''
			), 
			$atts));
		
		$content = trim(strip_tags($content));
		
		$value = htmlentities($value);
		if($value < 0) $value = 0;
		if($value > 100) $value = 100;
		
		$size = trim(strip_tags($size));
		switch($size){
			case 'small': $bar_size = ' bar_small'; break;
			case 'medium': $bar_size = ' bar_medium'; break;
			case 'large': $bar_size = ' bar_large'; break;
			default: $bar_size = ' bar_normal'; break;
		}
		switch($color){
			case 'red': $bar_color = ' gradient_red'; break;
			case 'blue': $bar_color = ' gradient_blue'; break;
			case 'green': $bar_color = ' gradient_green'; break;
			case 'gray': $bar_color = ' gradient_gray'; break;
			case 'pink': $bar_color = ' gradient_pink'; break;
			case 'orange': $bar_color = ' gradient_orange'; break;
			case 'purple': $bar_color = ' gradient_purple'; break;
			case 'teal': $bar_color = ' gradient_teal'; break;
			case 'yellow': $bar_color = ' gradient_yellow'; break;
			case 'black': $bar_color = ' gradient_black'; break;
			case 'white': $bar_color = ' gradient_white'; break;
			default: $bar_color = ' primary_color_bg'; break;
		}
		if($icon != '') $icon = '<span class="icon icon-'.htmlentities($icon).'"></span> ';
		
		$output = '';
		$output .= '<div class="progress_bar">';
		$output .= '<div class="bar_content '.$bar_color.'" style="width:'.$value.'%;">';
		if($title != '') $output .= '<div class="bar_title">'.$icon.' '.$title.'</div>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode('progress', 'cpotheme_shortcode_bar');
}


/* Feature Block Shortcode */
if(!function_exists('cpotheme_shortcode_feature')){
	function cpotheme_shortcode_feature($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
		'title' => '(No Title)', 
		'icon' => '', 
		'style' => ''),
		$atts));
		
		$content = trim($content);
		$title = trim(htmlentities(strip_tags($title), ENT_QUOTES, "UTF-8"));
		
		$output = '<div class="inline_feature inline_feature_'.$style.'">';
		if($icon != ''){
			wp_enqueue_style('style_fontawesome');
			$output .= '<div class="feature_icon primary_color icon-'.$icon.'"></div>';
		}
		$output .= '<h4 class="feature_title">'.$title.'</h4>';
		$output .= '<div class="feature_content">'.wpautop(cpotheme_remove_autop($content)).'</div>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('feature', 'cpotheme_shortcode_feature');
}


/* Accordion Shortcode */
if(!function_exists('cpotheme_shortcode_testimonial')){
	function cpotheme_shortcode_testimonial($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'name' => '(No Name)', 
			'image' => '', 
			'title' => ''),
			$atts));
		
		$content = trim($content);
		$name = trim(htmlentities(strip_tags($name), ENT_QUOTES, "UTF-8"));
		
		$classes = '';
		if($image == '') $classes .= 'noimage';
		$output = "<div class='testimonial $classes'>";
		if($image != '')
			$output .= "<img class='testimonial_thumbnail' src='$image' alt='$title'/>";
		$output .= '<div class="testimonial_content">';
		$output .= $content;
		$output .= '</div>';
		$output .= '<div class="testimonial_meta">';
		$output .= '<h4 class="testimonial_name">'.$name.'</h4>';
		if($title != '') $output .= "<span class='testimonial_title'>$title</span>";
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('testimonial', 'cpotheme_shortcode_testimonial');
}


/* Team Member Shortcode */
if(!function_exists('cpotheme_shortcode_team')){
	function cpotheme_shortcode_team($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'name' => '(No Name)', 
			'image' => '', 
			'title' => '', 
			'facebook' => '', 
			'twitter' => '', 
			'gplus' => '', 
			'linkedin' => '', 
			'pinterest' => '', 
			'tumblr' => '', 
			'web' => '', 
			'state' => ''),
			$atts));
		
		$content = trim($content);
		$name = trim(htmlentities(strip_tags($name), ENT_QUOTES, "UTF-8"));
		
		$classes = '';
		if($image == '') $classes .= 'noimage';
		$output = "<div class='team_member $classes'>";
		if($image != '')
			$output .= "<img class='member_thumbnail' src='$image' alt='$title'/>";
		$output .= '<div class="member_content">';
		$output .= '<h3 class="member_name">'.$name.'</h3>';
		if($title != '') $output .= "<span class='member_title'>$title</span>";
		$output .= $content;
		$output .= '<div class="member_meta">';
		if($web != '') $output .= "<a href='$web'><span class='icon-link'></span></a>";
		if($facebook != '') $output .= "<a href='$facebook'><span class='icon-facebook-sign'></span></a>";
		if($twitter != '') $output .= "<a href='$twitter'><span class='icon-twitter-sign'></span></a>";
		if($gplus != '') $output .= "<a href='$gplus'><span class='icon-google-plus-sign'></span></a>";
		if($linkedin != '') $output .= "<a href='$linkedin'><span class='icon-linkedin-sign'></span></a>";
		if($pinterest != '') $output .= "<a href='$pinterest'><span class='icon-pinterest-sign'></span></a>";
		if($tumblr != '') $output .= "<a href='$tumblr'><span class='icon-tumblr-sign'></span></a>";
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('team', 'cpotheme_shortcode_team');
}


/* Pricing Table Shortcode */
if(!function_exists('cpotheme_shortcode_pricing_table')){
	function cpotheme_shortcode_pricing_table($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
			'columns' => 1, 
			'state' => ''),
			$atts));
		
		$content = cpotheme_remove_autop($content);
		
		$output = '<div class="pricing_table pricing_col'.$columns.'">';
		$output .= do_shortcode($content);
		$output .= '<div class="clear"></div>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('pricing_table', 'cpotheme_shortcode_pricing_table');
}

/* Pricing Item Shortcode */
if(!function_exists('cpotheme_shortcode_pricing_cell')){
	function cpotheme_shortcode_pricing_cell($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
		'type' => 'none',
		'title' => '',
		'price' => '',
		'url' => '',
		'urltitle' => '',
		'urlcolor' => '',
		'coin' => '$'
		), $atts));
		
		$output = '<div class="pricing_column pricing_column_'.$type.'">';
		$output .= '<ul class="item item_'.$type.'">';
		if($title != '') $output .= '<li class="title">'.$title.'</li>';
		if($price != '') $output .= '<li class="price primary_color_bg">'.$price.'<span class="coin">'.$coin.'</span></li>';
		$output .= '<li class="content">';
		$output .= do_shortcode(cpotheme_remove_autop($content));
		$output .= '</li>';
		if($url != ''){
			if($urlcolor == '') $urlcolor = 'default';
			$output .= '<li class="url">';
			$output .= '<a class="button button_'.$urlcolor.'" href="'.$url.'">';
			if($urltitle == '') $output .= __('Read More', 'cpocore'); else $output .= $urltitle;
			$output .= '</a>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode('pricing_item', 'cpotheme_shortcode_pricing_cell');
}