<?php

function ajcode_init(){

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    add_theme_support( 'html5',
        array( 'comment-list', 'comment-form', 'search-form', 'gallery' )
    );

    // Nav Menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu' )
    ) );

}

add_action( 'after_setup_theme', 'ajcode_init' );