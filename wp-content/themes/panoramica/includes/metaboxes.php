<?php
//Inserts custom metabox as per the theme's features
add_action('add_meta_boxes', 'cpotheme_metabox');
function cpotheme_metabox(){
	add_meta_box('cpotheme_slides', __('Slide Options', 'cpotheme'), 'cpotheme_metabox_slides', 'cpo_slide', 'normal', 'high');
}


function cpotheme_metabox_slides($post){
	cpotheme_meta_fields($post, cpotheme_metadata_slides());
}
add_action('edit_post', 'cpotheme_metabox_slides_save');
function cpotheme_metabox_slides_save($post){
	cpotheme_meta_save(cpotheme_metadata_slides());
}