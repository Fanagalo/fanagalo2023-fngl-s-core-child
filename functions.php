<?php

/* Initialise child theme */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/* Load text domain */
load_theme_textdomain( 'fanagalo2023', get_stylesheet_directory() . '/languages' );


/* FUNCTIONS LOADING ORIGINALLY FROM CORE THEME */

/* Add functions from directory "inc" */ 

/* REQUIRED */

/**  custom-block-styling.php
 * TO DO: the font section should become a separate file that serves fonts in frontend and backend
*/
 require get_stylesheet_directory() . '/inc/custom-block-styling.php';        // Custom styling of the frontend and backend of the block editor 
 
/** template-functions.php and template-functions.php
 * these files should probably be moved to the parent
 */
// require get_stylesheet_directory() . '/inc/template-functions.php';          // Functions which enhance the theme by hooking into WordPress.
// require get_stylesheet_directory() . '/inc/template-tags.php';               // Custom template tags for this theme.


/* OPTIONAL */
require get_stylesheet_directory() . '/inc/comments-disable.php';            // Disable all comments options
require get_stylesheet_directory() . '/inc/custom-color-font-blocks.php';    // Custom colors and font sizes for block editor
require get_stylesheet_directory() . '/inc/custom-header.php';               // Custom Header
require get_stylesheet_directory() . '/inc/customizer.php';                  // Customizer
// require get_stylesheet_directory() . '/inc/fngl-recent-posts-shortcode.php'; // Shortcode to display overview of pages, posts of CPT using a shortcode
// require get_stylesheet_directory() . '/inc/googleanalytics.php';             // Placement of Google Analytics tag
require get_stylesheet_directory() . '/inc/template-functions.php';           // Extra functions
