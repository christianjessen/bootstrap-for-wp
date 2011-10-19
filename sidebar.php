			<div id="sidebar" class="span6">
				<ul>
					<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>
	<?php endif; ?>
				</ul>
			</div>
<?php get_footer(); ?>