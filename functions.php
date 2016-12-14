<?php

add_theme_support( 'post-thumbnails' ); // allow WordPress to let me choose featured images etc
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
