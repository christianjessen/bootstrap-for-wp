<?php
get_header();
?>
	<!-- Call wordpress posts -->
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

      <div class="content">
	<div class="page-header">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
        </div>
        <div class="row">
          <div class="span9">

		<p class="timestamp"><?php _e('Written by', 'bootstrap-for-wp'); ?> <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?> - <?php the_date() ?> @ <?php the_time() ?></p>
		<?php the_content(); ?>
		<br /><br />
		<p class="postmetadata">
	<?php _e('Filed under&#58;', 'bootstrap-for-wp'); ?> <?php the_category(', ') ?>
		</p>
		<br /><br />
		<!-- View comments -->
		<div class="comments-template">
		<?php comments_template(); ?>
		</div>
	</div>

	<?php endwhile; ?>
	<!-- End list of wordpress posts -->

	<?php else : ?>
	<!-- If no post is found. This is the 404-page -->
      <div class="content">
	<div class="page-header">
		<h1><?php _e('This is a dead end..', 'bootstrap-for-wp'); ?><small> - <?php _e('Looks like somebody ate the post..', 'bootstrap-for-wp'); ?></small></h1>
        </div>
        <div class="row">
          <div class="span9">
		<!-- If no page is found. This is the 404-page -->
			<p class="timestamp"><?php _e('Nothing to see here', 'bootstrap-for-wp'); ?> - <?=date("d/m-Y - H:i:s", time());?></p>
			<p><?php _e('We are very sorry to tell you, that you reached a dead end. There is no content on the adress you typed in. If you followed a link from another page, please tell us where you came from.', 'bootstrap-for-wp'); ?><br />
			<?php _e('We suggest you to try clicking on another link on the site, or use the form below to search for what you where looking for.', 'bootstrap-for-wp'); ?>
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
		</div>
	<?php endif; ?>
	
<?php get_sidebar(); ?>
	</div>
      <?php get_footer(); ?>