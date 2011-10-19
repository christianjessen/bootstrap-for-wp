<?php
get_header();
?>
	<!-- If no post is found. This is the 404-page -->
	<div class="page-header">
		<h1>I didn't write about that...</h1>
	</div>
	<div class="row">
		<div class="span10">
		<p class="timestamp">No more to see here - <?=date("d/m-Y - H:i:s", time());?></p>
		<p>We are very sorry to tell you, that you reached a dead end. There is no content on the adress you typed in. If you followed a link from another page, please tell us where you came from.<br />
		We suggest you to try clicking on another link on the site, or use the form below to search for what you where looking for.
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
	</div>
<?php get_sidebar(); ?>