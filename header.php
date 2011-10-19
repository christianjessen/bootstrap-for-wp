<!DOCTYPE html>
<html lang="en">
  <head>
	<title>
<?php
// Thanks to "Indomagz 2" theme for snippet (Making sure SEO titles is allright)
if (is_home()) {
	echo bloginfo('name'); echo ' | '; echo bloginfo('description');
} elseif (is_404()) {
	echo '404 Not Found'; echo ' | '; echo bloginfo('name');
} elseif (is_category()) {
	echo 'Category:'; wp_title(''); echo ' | '; echo bloginfo('name');
} elseif (is_tag()) {
	echo 'Tags:'; wp_title(''); echo ' | '; echo bloginfo('name');
} elseif (is_search()) {
	echo 'Search Results'; echo ' | '; echo bloginfo('name');
} elseif (is_day() || is_month() || is_year() ) {
	echo 'Archives:'; wp_title(''); echo ' | '; echo bloginfo('name');
} else {
	echo wp_title('');
	$subtitle = get_post_meta($post->ID, 'Subtitle', $single = true);
	if($subtitle !== '') { echo ': ' . $subtitle; }
	echo ' | '; echo bloginfo('name');
} ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo bloginfo(stylesheet_directory) .'/bootstrap-1.1.0.min.css'; ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body>
    <div class="topbar">
      <div class="fill">
        <div class="container fixed">
          <h3><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h3>
          <!-- Search box -->
          <form method="get" action="<?php bloginfo('home'); ?>/">
          	<input type="text" name="s" id="s" placeholder="Search" />
          </form>
          <ul class="nav secondary-nav">
			<li><a href="<?php echo get_settings('home'); ?>/">Home</a></li>
			<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
			<?php  /* Old example
            <li class="active"><a href="<?php bloginfo('url'); ?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            */ ?>
          </ul>
        </div>
      </div>
    </div>
	<div style="margin: 60px 0 0 0;"><!-- We need some margin from the stupid top-bar --></div>
	<div class="container" id="content">
		<!-- Main hero unit for a primary marketing message or call to action -->
		<!--
		<div class="hero-unit">
			<h1>Hello, world!</h1>
			<p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
			<p><a class="btn primary large">Learn more &raquo;</a></p>
		</div>-->
