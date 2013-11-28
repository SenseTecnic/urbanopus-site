<?php 

/* Half Column Shortcode */
if(!function_exists('cpotheme_shortcode_column2')){
	function cpotheme_shortcode_column2($atts, $content = null){
		$content = $content;	
		return '<div class="column col2">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_half', 'cpotheme_shortcode_column2');
}

/* Half Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column2_last')){
	function cpotheme_shortcode_column2_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col2 col2_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_half_last', 'cpotheme_shortcode_column2_last');
}



/* Third Column Shortcode */
if(!function_exists('cpotheme_shortcode_column3')){
	function cpotheme_shortcode_column3($atts, $content = null){
		$content = $content;	
		return '<div class="column col3">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_third', 'cpotheme_shortcode_column3');
}

/* Two-Thirds Column Shortcode */
if(!function_exists('cpotheme_shortcode_column3x2')){
	function cpotheme_shortcode_column3x2($atts, $content = null){
		$content = $content;	
		return '<div class="column col3x2">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_two_thirds', 'cpotheme_shortcode_column3x2');
}

/* Third Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column3_last')){
	function cpotheme_shortcode_column3_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col3 col3_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_third_last', 'cpotheme_shortcode_column3_last');
}

/* Two-Thirds Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column3x2_last')){
	function cpotheme_shortcode_column3x2_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col3x2 col3x2_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_two_thirds_last', 'cpotheme_shortcode_column3x2_last');
}



/* Quarter Column Shortcode */
if(!function_exists('cpotheme_shortcode_column4')){
	function cpotheme_shortcode_column4($atts, $content = null){
		$content = $content;	
		return '<div class="column col4">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_fourth', 'cpotheme_shortcode_column4');
}

/* Three-Quarters Column Shortcode */
if(!function_exists('cpotheme_shortcode_column4x3')){
	function cpotheme_shortcode_column4x3($atts, $content = null){
		$content = $content;	
		return '<div class="column col4x3">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_three_fourths', 'cpotheme_shortcode_column4x3');
}

/* Quarter Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column4_last')){
	function cpotheme_shortcode_column4_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col4 col4_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_fourth_last', 'cpotheme_shortcode_column4_last');
}

/* Three-Quarters Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column4x3_last')){
	function cpotheme_shortcode_column4x3_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col4x3 col4x3_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_three_fourths_last', 'cpotheme_shortcode_column4x3_last');
}



/* Fifth Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5')){
	function cpotheme_shortcode_column5($atts, $content = null){
		$content = $content;	
		return '<div class="column col5">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_fifth', 'cpotheme_shortcode_column5');
}

/* Two-Fifths Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x2')){
	function cpotheme_shortcode_column5x2($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x2">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_two_fifths', 'cpotheme_shortcode_column5x2');
}

/* Three-Fifths Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x3')){
	function cpotheme_shortcode_column5x3($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x3">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_three_fifths', 'cpotheme_shortcode_column5x3');
}

/* Four-Fifths Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x4')){
	function cpotheme_shortcode_column5x4($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x4">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_four_fifths', 'cpotheme_shortcode_column5x4');
}

/* Fifth Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5_last')){
	function cpotheme_shortcode_column5_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col5 col5_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div><div class="col_divide"></div>';
	}
	add_shortcode('column_fifth_last', 'cpotheme_shortcode_column5_last');
}

/* Two-Fifths Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x2_last')){
	function cpotheme_shortcode_column5x2_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x2 col5x2_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_two_fifths_last', 'cpotheme_shortcode_column5x2_last');
}

/* Three-Fifths Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x3_last')){
	function cpotheme_shortcode_column5x3_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x3 col5x3_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_three_fifths_last', 'cpotheme_shortcode_column5x3_last');
}

/* Four-Fifths Last Column Shortcode */
if(!function_exists('cpotheme_shortcode_column5x4_last')){
	function cpotheme_shortcode_column5x4_last($atts, $content = null){
		$content = $content;	
		return '<div class="column col5x4 col5x4_last col_last">'.wpautop(cpotheme_remove_autop($content)).'</div>';
	}
	add_shortcode('column_four_fifths_last', 'cpotheme_shortcode_column5x4_last');
}


/* Divider Shortcode */
if(!function_exists('cpotheme_shortcode_divide')){
	function cpotheme_shortcode_divide($atts, $content = null){
		return '<hr/>';
	}
	add_shortcode('divide', 'cpotheme_shortcode_divide');
}


/* Separator Shortcode */
if(!function_exists('cpotheme_shortcode_separator')){
	function cpotheme_shortcode_separator($atts, $content = null){
		$attributes = extract(shortcode_atts(array('type' => ''), $atts));
		$content = trim(strip_tags($content));
		
		$output = '<div class="pageseparator">';
		$output .= '<div class="line"></div>';
		if($type == 'top')
			$output .= '<a class="skip-to top primary_color_bg" href="#top" rel="top"></a>';
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode('separator', 'cpotheme_shortcode_separator');
}

/* Clearing Shortcode */
if(!function_exists('cpotheme_shortcode_clear')){
	function cpotheme_shortcode_clear($atts, $content = null){
		return '<div style="clear:both;width:100%;"></div>';
	}
	add_shortcode('clear', 'cpotheme_shortcode_clear');
}