<?php

function ajcode_scripts(){

  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css' );
/*
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery',  get_template_directory_uri() . '/assets/js/jquery-3.5.1.js', array(), '3.5.1', true );*/

  if ( is_front_page() ) {

      wp_enqueue_script( "three-min", get_template_directory_uri() . '/assets/js/3d/three.min.js', array(), '123', true );
      wp_enqueue_script( "GLTFLoader", get_template_directory_uri() . '/assets/js/3d/GLTFLoader.js', array(), '1.0', true );
      wp_enqueue_script( "home-models", get_template_directory_uri() . '/assets/js/3d/home-models.js', array(), '1.0', true );

      wp_dequeue_style( 'wp-block-library' );

  }

  if ( is_single() && 'project' == get_post_type() ) {

      //Slick slider/lightbox and settings js
      wp_enqueue_script( "slick-min", get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), '1.8.0', true );
      wp_enqueue_script( "slick-lightbox", get_template_directory_uri() . '/assets/js/slick/slick-lightbox.js', array( 'jquery' ), '0.2.12 ', true );
      wp_enqueue_script( "gallery-slider", get_template_directory_uri() . '/assets/js/slick/gallery-slider.js', array( 'jquery' ), '1.0.0', true );
  
      //Slick slider and lightbox CSS
      wp_enqueue_style( "slick", get_template_directory_uri() . '/assets/css/slick.css' );
      wp_enqueue_style( "slick-theme", get_template_directory_uri() . '/assets/css/slick-theme.css' );
      wp_enqueue_style( "slick-lightbox", get_template_directory_uri() . '/assets/css/slick-lightbox.css' );
  }


  if( is_single() ) {

      wp_enqueue_style( "prism", get_template_directory_uri() . '/assets/css/prism.css' );
      wp_enqueue_script( "prism", get_template_directory_uri() . '/assets/js/prism.js', array( 'jquery' ), '1.23.0', true );

  }

  //Don't load contact form x scripts on any page other than contact page
  if( ! is_page( 'contact' ) ) {

      wp_deregister_script( 'cfx-frontend' );
      wp_deregister_script( 'cfx-cookies' );

  }

  //Bundled webpack javascript
   wp_enqueue_script( 'bundled', get_template_directory_uri() . '/dist/bundled.js', array(), filemtime( get_stylesheet_directory() . '/dist/bundled.js' ), true );

  //Main styles
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' )  );
 
}

add_action( 'wp_enqueue_scripts', 'ajcode_scripts' );