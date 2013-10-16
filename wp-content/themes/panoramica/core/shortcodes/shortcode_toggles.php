<?php 

/* Accordion Shortcode */
if(!function_exists('cpotheme_shortcode_accordion')){
	function cpotheme_shortcode_accordion($atts, $content = null){
		//Enqueue necessary scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('cpotheme_shortcodes_toggles');
		
		$attributes = extract(shortcode_atts(array(
		'title' => '(No Title)', 
		'icon' => '', 
		'state' => ''),
		$atts));
		
		$content = trim($content);
		$title = trim(htmlentities(strip_tags($title), ENT_QUOTES, "UTF-8"));
		if($icon != '') $icon = '<span class="icon primary_color icon-'.htmlentities($icon).'"></span> ';
		
		$output = '<div class="accordion';
		if($state == 'open') 
			$output .= ' accordion_open';
		$output .= '">';
		$output .= '<h4 class="accordion_title">';
		$output .= $icon;
		$output .= $title.'</h4>';
		$output .= '<div class="accordion_content"';
		if($state != 'open')
			$output .= ' style="display:none;"';
		$output .= '>'.wpautop(cpotheme_remove_autop($content)).'</div>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('accordion', 'cpotheme_shortcode_accordion');
}


/* Tablist Shortcode */
if(!function_exists('cpotheme_shortcode_tablist')){
	function cpotheme_shortcode_tablist($atts, $content = null){
		//Enqueue necessary scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('cpotheme_shortcodes_toggles');
				
		$attributes = extract(shortcode_atts(array('style' => 'horizontal'), $atts));
		$content = trim($content);
		
		$output = '<div class="tablist tablist_'.$style.'">';
		
		//Parse individual tab contents into tabs
		preg_match_all('/tab title="([^\"]+)"/i', $content, $results, PREG_OFFSET_CAPTURE);
		$tab_titles = array();
		if(isset($results[1]))
			$tab_titles = $results[1];
		$output .= '<ul class="tablist_nav">';
		foreach($tab_titles as $tab)
			$output .= '<li><a href="#tab-content-'.sanitize_title($tab[0]).'">'.$tab[0].'</a></li>';
		$output .= '</ul>';
		
		if(count($tab_titles))
		    $output .= do_shortcode(cpotheme_remove_autop($content));
		else
			$output .= do_shortcode($content);
		
		$output .= '</div>';
		return $output;
	}
	add_shortcode('tabs', 'cpotheme_shortcode_tablist');
}


/* Tab Shortcode */
if(!function_exists('cpotheme_shortcode_tab')){
	function cpotheme_shortcode_tab($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
		'title' => '(No Title)', 
		'icon' => '', 
		'state' => ''),
		$atts));
			
		$content = trim($content);
		if($icon != '') $icon = '<span class="icon icon-'.htmlentities($icon).'"></span> ';
		
		return '<div id="tab-content-'.sanitize_title($title).'" class="tab_content">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('tab', 'cpotheme_shortcode_tab');
}


/* Slideshow Wrapper Shortcode */
if(!function_exists('cpotheme_shortcode_slideshow')){
	function cpotheme_shortcode_slideshow($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
		'animation' => '', 
		'navigation' => '', 
		'pager' => '', 
		'state' => ''),
		$atts));		
		$content = trim($content);
		
		
		$output = '<div class="inline_slider">';
		$output .= '<div class="slides">';
		$output .= cpotheme_remove_autop($content);
		$output .= '</div>';
		if($pager != '' && $pager != 'none') $output .= '<div class="pages pages_'.$pager.'"></div>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode('slideshow', 'cpotheme_shortcode_slideshow');
}


/* Slides Shortcode */
if(!function_exists('cpotheme_shortcode_slide')){
	function cpotheme_shortcode_slide($atts, $content = null){
		$attributes = extract(shortcode_atts(array(
		'caption' => '', 
		'state' => ''),
		$atts));
		$content = trim($content);
		
		$output = '<div class="slide">';
		if($caption != '') $output .= '<div class="caption">'.$caption.'</div>';
		$output .= wpautop(cpotheme_remove_autop($content));
		$output .= '</div>';
		return $output;
	}
	add_shortcode('slide', 'cpotheme_shortcode_slide');
}