jQuery(document).ready(function(){
   //Accordions
	if(jQuery('.accordion').length){
		jQuery('.accordion').each(function(){
			var accordion = jQuery(this);
			accordion.find('.accordion_title').click(function(){
				accordion.find('.accordion_content').slideToggle(300);
				accordion.toggleClass('accordion_open');
			});
		});
	}
	
	//Tabs
	jQuery('.tablist').tabs();
});