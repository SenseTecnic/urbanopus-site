			<div class="clear"></div>
			
			<div id='footersidebar'>
				<div class="container">
				<?php get_sidebar('footer'); ?>
				</div>
			</div>
			
			<div id='footer'>
				<div class="container">
					<div id='footermenu'>
						<?php wp_nav_menu(array('menu_class' => 'nav_footer', 'theme_location' => 'footer_menu', 'depth' => '2', 'fallback_cb' => false)); ?>
					</div>
					&copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?>. Website provided by <a href="http://sensetecnic.com">Sense Tecnic</a>.
				</div>
			</div>
			<div class="clear"></div>
		</div><!-- wrapper -->
	</div><!-- outer -->
	<?php wp_footer(); ?>
</body>
</html>
