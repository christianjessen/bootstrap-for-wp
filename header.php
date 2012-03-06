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

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo bloginfo(stylesheet_directory) .'/bootstrap/css/bootstrap.min.css'; ?>" type="text/css" media="screen" />
	<style type="text/css">
	  body {
	    padding-top: 40px;
	    padding-bottom: 40px;
	  }
	</style>
	<link rel="stylesheet" href="<?php echo bloginfo(stylesheet_directory) .'/bootstrap/css/bootstrap-responsive.min.css'; ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo(stylesheet_directory) .'/bootstrap/js/bootstrap.min.js'; ?>"></script>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body>
  
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
	  <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	  
	  <form class="navbar-search" method="get" action="<?php bloginfo('home'); ?>/">
	    <input type="text" class="search-query" name="s" id="s" placeholder="Search">
	  </form>
	  
          <div class="nav-collapse pull-right">
            <ul class="nav">
		<li><a href="<?php echo get_settings('home'); ?>/"><?php _e('Home', 'bootstrap-for-wp'); ?></a></li>
		<?php wp_list_pages('title_li=&sort_column=menu_order&depth=1'); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="container">