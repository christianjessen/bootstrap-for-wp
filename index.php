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
		<p class="timestamp">By <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?> - <?php the_date() ?> @ <?php the_time() ?> - <?php comments_popup_link('Comment on this &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		<?php /*  - <?php the_category(', ') ?> */?>
		<?php the_content(); ?>


		<hr />
		<?php endwhile; ?>

		<div class="posts_nav pagination">
		<?php posts_nav_link(' &nbsp; ','Previous page','Next page'); ?>
		</div>
	    </div>
	<!-- End list of wordpress posts -->

	<?php else : ?>
	<!-- If no post is found. This is the 404-page -->
		<p>
			Perhaps you should try searching for something else?
		</p>
		<br />
		<form action="<?php bloginfo('home'); ?>/" method="get" class="form-stacked">
			<div class="clearfix">
				<label for="s">Keyword</label>
				<div class="input">
					<input type="text" name="s" id="s" value="" size="40" tabindex="1" class="xlarge" />
				</div>
			</div>
			<input type="submit" value="Search" class="btn primary xlarge" />
		</form>
	<?php endif; ?>
	</div>
	
	  <?php get_sidebar(); ?>
	</div>
      <?php get_footer(); ?>