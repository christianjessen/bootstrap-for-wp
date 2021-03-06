<?php
get_header();
?>
      <div class="content">
	<div class="page-header">
		<h1><?php bloginfo('name'); ?><small> - <?php bloginfo('description'); ?></small></h1>
        </div>
        <div class="row">
          <div class="span9">

	<!-- Call wordpress posts -->
	<?php if(have_posts()) : ?>
	    <div id="wp-post-list">
		<?php while(have_posts()) : the_post(); ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
		<p class="timestamp"><?php _e('Written by', 'bootstrap-for-wp'); ?> <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?> - <?php the_date() ?> @ <?php the_time() ?> - <?php comments_popup_link(__('Comment on this &#187;', 'bootstrap-for-wp'), __('1 Comment &#187;', 'bootstrap-for-wp'), __('% Comments &#187;', 'bootstrap-for-wp')); ?></p>
		<?php /*  - <?php the_category(', ') ?> */?>
		<?php the_excerpt(); ?>


		<hr />
		<?php endwhile; ?>

		<div class="posts_nav pagination">
		<?php posts_nav_link(' &nbsp; ', __('Previous page', 'bootstrap-for-wp'), __('Next page', 'bootstrap-for-wp')); ?>
		</div>
	    </div>
	<!-- End list of wordpress posts -->

	<?php else : ?>
	<!-- If no post is found. This is the 404-page -->
		<p>
			<?php _e('Perhaps you should try searching for something else?', 'bootstrap-for-wp'); ?>
		</p>
		<br />
		<form action="<?php bloginfo('home'); ?>/" method="get" class="form-stacked">
			<div class="clearfix">
				<label for="s"><?php _e('Keyword', 'bootstrap-for-wp'); ?></label>
				<div class="input">
					<input type="text" name="s" id="s" value="" size="40" tabindex="1" class="xlarge" />
				</div>
			</div>
			<input type="submit" value="<?php _e('Search', 'bootstrap-for-wp'); ?>" class="btn primary xlarge" />
		</form>
	<?php endif; ?>
	</div>
	
	  <?php get_sidebar(); ?>
	</div>
      <?php get_footer(); ?>