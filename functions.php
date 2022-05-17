<?php 

$includes = array(

    '/enqueue.php',  // Enqueue scripts and styles.
    '/theme-setup.php', //Theme support and setup
    '/remove-actions.php', //Remove certain WordPress actions e.g. emojis
    '/gallery-slider-shortcode.php', //Shortcode for displaying a slick.js slider in place of default gallery, when a gallery block is present within post
);
  
foreach ( $includes as $include ) {

    require_once get_template_directory() . '/inc' . $include;

}