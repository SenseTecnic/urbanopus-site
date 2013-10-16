<div id="sidebar" <?php if(cpotheme_get_option('cpo_sidebar_position') == 'left') echo 'class="sidebar_left"'; ?>>
    <?php if(is_active_sidebar('primary-widget-area')): ?>
	<ul class="widget">
        <?php dynamic_sidebar('primary-widget-area'); ?>
    </ul>
	<?php endif; ?>
</div>