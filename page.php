<?php
get_header();
?>
	<!-- Call wordpress page -->
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

	<div class="page-header">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
	</div>
	<div class="row">
		<div class="span10">
		<?php the_content(); ?>

		<?php endwhile; ?>

		<div class="posts_nav">
		<?php posts_nav_link(' &nbsp; ','Previous page','Next page'); ?>
		</div>
		<!-- End list of wordpress posts -->
	</div>
	<?php else : ?>
	<div class="page-header">
		<h1>You reached a dead end..</h1>
	</div>
	<div class="row">
		<div class="span10">
		<!-- If no post is found. This is the 404-page -->
			<h2></h2>
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
	</div>


	<?php endif; ?>
<?php get_sidebar(); ?>