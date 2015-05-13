<?php

// override the [...] default that is attached to the end of an excerpt
function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[Read More]</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// allow WordPress to let me choose featured images etc
// see http://codex.wordpress.org/Post_Thumbnails
add_theme_support( 'post-thumbnails' ); 

function excludeCategory($query) {
	if ( $query->is_home ) {
		$query->set('cat', '-2');
	}
	return $query;
}
add_filter('pre_get_posts', 'excludeCategory');
