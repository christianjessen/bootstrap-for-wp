<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array('name'=>'Right-Sidebar', 'before_title' => '<h2>', 'after_title' => '</h2>'));
}
?>