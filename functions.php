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

require("functions.inlinecacher.php");

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

function style_loading() {
	wp_enqueue_style(
		'main-styles',
		get_template_directory_uri() . '/style.css',
		array(),
		filemtime(get_template_directory() . '/style.css'),
		false
	);
	wp_enqueue_style(
		'bootstrap',
		"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css",
		array(),
		"3.3.1"
	);
}

add_action( 'wp_enqueue_scripts', 'style_loading' );

add_filter('style_loader_tag',  'inline_cacher_logic', 10, 4);
function inline_cacher_logic( $html, $handle, $href, $media ) {
	$inline_cache_resources = array(
		// @TODO - either accept a list from admin/plugin config, or auto-cache all
		// (non admin?) CSS
		"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css",
		"https://ashton.codes/blog/wp-content/themes/ashton/style.css"
	);

	foreach($inline_cache_resources as $resource) {
		if (strpos($href, $resource) !== false) {
			preg_match('/\?ver=(.*)$/', $href, $matches);
			if ($matches[1]) {
				$version = $matches[1];
				if (InlineCacher::cached($href, $version)) {
					return '<link href="' . $href . '" rel="stylesheet" type="text/css" />';
				}
				else {
					return '<style data-src="' . $href . '" data-inline-cache="' . $version . '">/*' . file_get_contents($href) . '*/</style>';
				}
			}
		}
	}

    return $html;
}
