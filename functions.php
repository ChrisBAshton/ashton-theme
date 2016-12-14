<?php

error_reporting(0);

require_once('chris_api.php');

try {
	$key = '4923'; // yes, I'm aware this is now in Git. Let's be honest - does it matter?!
	$details = file_get_contents('http://api.ashton.codes/get/details/?key=' . $key);
	$social = file_get_contents('http://api.ashton.codes/get/social/?key=' . $key);
	$miscellaneous = file_get_contents('http://api.ashton.codes/get/miscellaneous/?key=' . $key);
	ChrisApi::init($details, $social, $miscellaneous);
} catch(Exception $e) {
    //echo $e->getMessage();
}

if (!isset($title)) {
	// if we are on a wordpress page
	if (function_exists("get_the_title") && !is_home()) {
		$title = get_the_title();
	}
	else {
		$title = ChrisApi::name();
	}
}

define(TITLE, $title);

add_action('after_setup_theme', 'declare_theme_support');

add_action('init', 'wpcodex_add_excerpt_support_for_pages'); // Enables the Excerpt meta box in Page edit screen.
add_filter( 'excerpt_more', 'new_excerpt_more' );
add_filter('pre_get_posts', 'excludeCategory');

function new_excerpt_more( $more ) {
    // override the [...] default that is attached to the end of an excerpt
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[Read More]</a>';
}

function excludeCategory($query) {
	if ( $query->is_home ) {
		$query->set('cat', '-2');
	}
	return $query;
}

function wpcodex_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}

function declare_theme_support() {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'main-menu'   => 'Main Menu'
    ));
}
