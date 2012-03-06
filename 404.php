<?php
get_header();
?>
	<!-- If no post is found. This is the 404-page -->
      <div class="content">
	<div class="page-header">
		<h1><?php _e('404 Error', 'bootstrap-for-wp'); ?><small> - <?php _e('Houston, we have a problem', 'bootstrap-for-wp'); ?></small></h1>
        </div>
        <div class="row">
          <div class="span9">
		<p class="timestamp"><?php _e('Nothing to see here', 'bootstrap-for-wp'); ?> - <?php echo date("d/m-Y - H:i:s", time()); ?></p>
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
<?php get_sidebar(); ?>
	</div>
      <?php get_footer(); ?>