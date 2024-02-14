<?php

/* Wordpress hooks ************************************************************/

function my_init() {
	// Configure PHP LC_CTYPE locale according to WP locale
	$locale = get_locale();
	setlocale(LC_CTYPE, $locale, $locale.'UTF-8', $locale.'UTF8', 'en_US', 'en_US.UTF-8', 'en_US.UTF8');

	// Theme features
	add_theme_support('automatic-feed-links');
	if (function_exists('register_sidebar'))
		register_sidebar(array());
	if (function_exists('register_nav_menu'))
		register_nav_menu('header', 'Header Menu');

	// Header image configuration
	define( 'HEADER_TEXTCOLOR', '' );
	define( 'HEADER_IMAGE', '%s/images/header-image.jpg' );
	define( 'HEADER_IMAGE_WIDTH', 960 );
	define( 'HEADER_IMAGE_HEIGHT', 260 );
	define( 'NO_HEADER_TEXT', true );
        add_custom_image_header('header_style', 'admin_header_style');

	// Header scripts
	$sd = get_bloginfo('stylesheet_directory');
	wp_enqueue_script('mootools', $sd . '/js/mootools-1.2.4-core-yc.js', array(), '1.2.4');
	wp_enqueue_script('site', $sd . '/js/site.js', array('mootools'), '1.0');
}
add_action('init', 'my_init');

function my_previous_posts_link_attributes() {
	return 'class="previous"';
}
add_action('previous_posts_link_attributes', 'my_previous_posts_link_attributes');

function my_next_posts_link_attributes() {
	return 'class="next"';
}
add_action('next_posts_link_attributes', 'my_next_posts_link_attributes');

function header_style() {
	$img = get_header_image();
	echo <<<EOF
<style type="text/css">
#header-image {
	background-image: url("$img");
}
</style>
EOF;
}

function admin_header_style() {
	$width = HEADER_IMAGE_WIDTH;
	$height = HEADER_IMAGE_HEIGHT;
	echo <<<EOF
<style type="text/css">
#headimg {
	width: ${width}px;
	height: ${height}px;
}
</style>
EOF;
}


/* Utility Functions **********************************************************/

function get_default_title() {
	return 'Présentation';
}

function get_posts_url() {
	if (get_option('show_on_front') == 'page') {
		return get_permalink(get_option('page_for_posts'));
	} else {
		return get_option('home');
	}
}

function is_toplevel() {
	global $post;
	return count($post->ancestors) == 0;
}

function get_full_title($separator = '&raquo;', $hierarchy = true, $blogtitle = true, $links = false, $spans = false) {
	$parts = array();
	
	// Blog title
	if ($hierarchy && $blogtitle) {
		$title = get_bloginfo('blogname');
		if ($links) $title = '<a href="' . get_option('home') . '">' . $title . '</a>';
		$parts[] = $title;
	}
	
	if ((is_home() && is_front_page()) || ((is_single() || is_archive()) && $hierarchy)) {
		// Posts page title
		$title = get_default_title();
		if ($links && !is_home()) {
			$url = get_posts_url();
			$title = '<a href="' . $url . '">' . $title . '</a>';
		}
		$parts[] = $title;
		
	}  else if (is_page() && $hierarchy) {
		// Page hierarchy
		global $post;
		$ancestors = $post->ancestors;
		for ($i = count($ancestors)-1; $i >= 0; $i--) {
			$ancestorID = $ancestors[$i];
			$ancestorPost = get_post($ancestorID);
			$title = $ancestorPost->post_title;
			if ($links) $title = '<a href="' . get_permalink($ancestorID) . '">' . $title . '</a>';
			$parts[] = $title;
		}
	}
	
	// Page title
	$title = wp_title($separator, false);
	if ($title) {
		$title = substr($title, strlen(" $separator "));
		$title = "<strong>$title</strong>";
		$parts[] = $title;
	}
	
	if ($spans) {
		// Add <span> elements for each part
		for ($i = 0; $i < count($parts); $i++) {
			$parts[$i] = '<span class="title-'.$i.'">'.$parts[$i].'</span>';
		}
		return implode(' <span class="title-separator">'.$separator.'</span> ', $parts);
	} else {
		return implode(" $separator ", $parts);
	}
}
