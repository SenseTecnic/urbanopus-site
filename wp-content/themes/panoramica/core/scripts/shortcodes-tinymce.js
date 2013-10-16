(function(){
	tinymce.create('tinymce.plugins.cpotheme_shortcodes', {
		init: function(ed, url){},
		createControl: function(button, e){
			if(button == "cpotheme_shortcodes_button"){
				var current_object = this;	
				var button = e.createSplitButton('cpotheme_button', {
	                title: "Add Shortcode",
					image: cpotheme_shortcodes_vars.toolbar_icon,
					icons: false
	            });
	            button.onRenderMenu.add(function(c, b){
					//Design Elements
					c = b.addMenu({title:"Basic Elements"});
					current_object.render(c, "Button", "button");
					current_object.render(c, "Message Box", "message");
					current_object.render(c, "Progress Bar", "progress");
					current_object.render(c, "Mini Feature", "feature");
					current_object.render(c, "Team Member", "team");
					current_object.render(c, "Testimonial", "testimonial");
					current_object.render(c, "Pricing Table", "pricing");
					
					//Toggles
					c = b.addMenu({title:"Toggles"});
					current_object.render(c, "Accordion", "accordion");
					current_object.render(c, "Tab Group", "tabs");
					current_object.render(c, "Slideshow", "slideshow");
					
					//Separators
					c = b.addMenu({title:"Separators"});
					current_object.render(c, "Separator", "separator");
					
					//Content Lists
					c = b.addMenu({title:"Content Lists"});
					current_object.render(c, "Recent Posts", "recent_posts");
					current_object.render(c, "Recent Portfolio", "recent_portfolio");
					
					//Social
					c = b.addMenu({title:"Social"});
					current_object.render(c, "Facebook Like Button", "like_button");
					current_object.render(c, "Tweet Button", "tweet_button");
					current_object.render(c, "Google +1 Button", "plusone_button");
					
					//Columns
					c = b.addMenu({title:"Columns"});
					current_object.render(c, "2 Columns", "column2");
					current_object.render(c, "3 Columns", "column3");
					current_object.render(c, "4 Columns", "column4");
					current_object.render(c, "5 Columns", "column5");
					
				});
				return button;
			}
			return null;               
		},
		render: function(ed, title, value){
			ed.add({
				title: title,
				onclick: function (){
					
					//Retrieve selected content
					var selected_content = tinyMCE.activeEditor.selection.getContent();
					if(!selected_content)
						var selected_content = 'Content';
					
					
					//Design Elements
					if(value == "button")
						tinyMCE.activeEditor.selection.setContent('[button color="red" url="http://www.url.com" size="medium"]' + selected_content + '[/button]');
					
					if(value == "message")
						tinyMCE.activeEditor.selection.setContent('[message type="info"]' + selected_content + '[/message]');
					
					if(value == "progress")
						tinyMCE.activeEditor.selection.setContent('[progress color="red" icon="" size="" value="" title="Progress Bar"]');
					
					if(value == "feature")
						tinyMCE.activeEditor.selection.setContent('[feature icon="flag" style="horizontal" title="Title"]' + selected_content + '[/feature]');
					
					if(value == "team")
						tinyMCE.activeEditor.selection.setContent('[team image="" name="Member Name" title="Job Title" web="" facebook="" twitter="" gplus=""]' + selected_content + '[/team]');
					
					if(value == "testimonial")
						tinyMCE.activeEditor.selection.setContent('[testimonial image="" name="Testimonial Name" title="Job Title"]' + selected_content + '[/testimonial]');
					
					if(value == "pricing")
						tinyMCE.activeEditor.selection.setContent('[pricing_table]<br><br>[pricing_item title="Title" price="100" coin="$" url="" urltitle="Read More"]' + selected_content + '[/pricing_item]<br><br>[/pricing_table]');
					
					
					//Toggles
					if(value == "accordion")
						tinyMCE.activeEditor.selection.setContent('[accordion title="Title" state="open"]' + selected_content + '[/accordion]');
					
					if(value == "tabs")
						tinyMCE.activeEditor.selection.setContent('[tabs]<br><br>[tab title="Title"]' + selected_content + '[/tab]<br><br>[/tabs]');
					
					if(value == "slideshow")
						tinyMCE.activeEditor.selection.setContent('[slideshow]<br><br>[slide]' + selected_content + '[/slide]<br><br>[/slideshow]');
					
					
					//Separators
					if(value == "separator")
						tinyMCE.activeEditor.selection.setContent('[separator type="top"]' + selected_content + '[/separator]');
					
					
					//Content Lists
					if(value == "recent_posts")
						tinyMCE.activeEditor.selection.setContent('[recent_posts number="5"]');
					
					if(value == "recent_portfolio")
						tinyMCE.activeEditor.selection.setContent('[recent_portfolio number="5"]');
					
					
					//Social
					if(value == "like_button")
						tinyMCE.activeEditor.selection.setContent('[fb_like url="" style="standard" font="arial" action="like" width="450" height="30" position="none"]');
					
					if(value == "tweet_button")
						tinyMCE.activeEditor.selection.setContent('[tweet url="" style="none" font="arial" action="like" width="450" height="30" position="none"]');
					
					if(value == "plusone_button")
						tinyMCE.activeEditor.selection.setContent('[gplus counter="" style="" width="450" height="30" position="none"]');
					
					
					//Columns
					if(value == "column2")
						tinyMCE.activeEditor.selection.setContent('[column_half]First Column[/column_half]<br><br>[column_half_last]Second Column[/column_half_last]');
					
					if(value == "column3")
						tinyMCE.activeEditor.selection.setContent('[column_third]First Column[/column_third]<br><br>[column_third]Second Column[/column_third]<br><br>[column_third_last]Third Column[/column_third_last]');
					
					if(value == "column4")
						tinyMCE.activeEditor.selection.setContent('[column_fourth]First Column[/column_fourth]<br><br>[column_fourth]Second Column[/column_fourth]<br><br>[column_fourth]Third Column[/column_fourth]<br><br>[column_fourth_last]Fourth Column[/column_fourth_last]');
					
					if(value == "column5")
						tinyMCE.activeEditor.selection.setContent('[column_fifth]First Column[/column_fifth]<br><br>[column_fifth]Second Column[/column_fifth]<br><br>[column_fifth]Third Column[/column_fifth]<br><br>[column_fifth]Fourth Column[/column_fifth]<br><br>[column_fifth_last]Fifth Column[/column_fifth_last]');
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("cpotheme_shortcodes", tinymce.plugins.cpotheme_shortcodes);
})();  