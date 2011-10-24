          <div id="sidebar" class="span4">
				<ul>
					<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>
	<?php endif; ?>
				</ul>
	  </div>
<?php get_footer(); ?>