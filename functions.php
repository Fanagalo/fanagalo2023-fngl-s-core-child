<?php

/* Initialise child theme */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/* Load text domain */
load_theme_textdomain( 'fanagalo2023', get_stylesheet_directory() . '/languages' );


/**
 * OPTIONAL functions from directory "inc". REQUIRED functions in parent theme. 
 */ 

/* Block editor customization */
require get_stylesheet_directory() . '/inc/block-template-editor.php';        // Enable block template editor 
require get_stylesheet_directory() . '/inc/custom-block-styling.php';        // Custom styling of the frontend and backend of the block editor 
// require get_stylesheet_directory() . '/inc/custom-block-colors-fonts.php';    // Custom colors and font sizes for block editor

/* Other customization */
require get_stylesheet_directory() . '/inc/comments-disable.php';            // Disable all comments options
// require get_stylesheet_directory() . '/inc/custom-header.php';               // Custom Header
// require get_stylesheet_directory() . '/inc/customizer.php';                  // Customizer
// require get_stylesheet_directory() . '/inc/fngl-recent-posts-shortcode.php'; // Shortcode to display overview of pages, posts of CPT using a shortcode
// require get_stylesheet_directory() . '/inc/googleanalytics.php';             // Placement of Google Analytics tag
require get_stylesheet_directory() . '/inc/rss-additions.php';                // Extra features in RSS stream
require get_stylesheet_directory() . '/inc/template-functions.php';           // Thumbnail and meta info functions
