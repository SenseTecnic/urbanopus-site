<?php if(is_active_sidebar('first-footer-widget-area')): ?>
	<ul class="widget">
		<?php dynamic_sidebar('first-footer-widget-area'); ?>
	</ul>
<?php endif; ?>

<?php if(is_active_sidebar('second-footer-widget-area')): ?>
	<ul class="widget widget_second">
		<?php dynamic_sidebar('second-footer-widget-area'); ?>
	</ul>
<?php endif; ?>

<?php if(is_active_sidebar('third-footer-widget-area')): ?>
	<ul class="widget widget_last">
		<?php dynamic_sidebar('third-footer-widget-area'); ?>
	</ul>
<?php endif; ?>