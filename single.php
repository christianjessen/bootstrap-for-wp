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

		<p class="timestamp">Written by <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?> - <?php the_date() ?> @ <?php the_time() ?></p>
		<?php the_content(); ?>
		<br /><br />
		<p class="postmetadata">
	<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?>
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
		<h1>You reached a dead end..<small> - Oops, so sorry. 404 again!</small></h1>
        </div>
        <div class="row">
          <div class="span9">

		<p class="timestamp">No more to see here - <?=date("d/m-Y - H:i:s", time());?></p>
		<p>We are very sorry to tell you, that you reached a dead end. There is no content on the adress you typed in. If you followed a link from another page, please tell us where you came from.<br />
		We suggest you to try clicking on another link on the site, or use the form below to search for what you where looking for.
		</p>
		<br />
		<form action="/index.php" method="get" class="block">
			<div style="padding-bottom: 5px; font-weight: bold;">Keyword:</div>
			<input type="text" name="s" value="" /><br /><br />
			<input type="submit" value="Search" />
		</form>
	</div>
	<?php endif; ?>
	
<?php get_sidebar(); ?>
	</div>
      <?php get_footer(); ?>