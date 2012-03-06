<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array('name'=>'Right-Sidebar', 'before_title' => '<h2>', 'after_title' => '</h2>'));
}

// Add functionality to include correct language files
load_theme_textdomain( 'bootstrap-for-wp', TEMPLATEPATH.'/languages' );

$locale = get_locale();
$locale_file = (TEMPLATEPATH . "/languages/" . $locale . ".php");
if ( is_readable($locale_file) ) {
	require_once($locale_file);
}
?>
