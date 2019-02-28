<?php

function web_enqueue_scripts()
{
	wp_enqueue_style('webStyle', get_template_directory_uri() . './css/ssd.css', array(), '1.0.0', 'all');
	wp_enqueue_script('webJs', get_template_directory_uri() . './js/gh.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'web_enqueue_scripts');
