<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle&display=swap" rel="stylesheet">

    <?php  if( is_single() ) : ?>

        <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">

    <?php endif; ?>

    <?php wp_head(); ?>

    <?php if ( is_front_page() ) : ?>

        <script id="vs" type="x-shader/x-vertex">

                varying vec2 vUv;

                void main() {

                    vUv = uv;
                    gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );

                }

        </script>

        <script id="fs" type="x-shader/x-fragment">

            uniform sampler2D map;

            uniform vec3 fogColor;
            uniform float fogNear;
            uniform float fogFar;

            varying vec2 vUv;

            void main() {

                float depth = gl_FragCoord.z / gl_FragCoord.w;
                float fogFactor = smoothstep( fogNear, fogFar, depth );

                gl_FragColor = texture2D( map, vUv );
                gl_FragColor.w *= pow( gl_FragCoord.z, 20.0 );
                gl_FragColor = mix( gl_FragColor, vec4( fogColor, gl_FragColor.w ), fogFactor );

            }

        </script>

    <?php endif; ?>

</head>

<body <?php body_class(); ?> >

    <header class="main-header">

        <div class="header-inner">

            <div class="site-identity">
                        
                <a href="<?php echo home_url( ) ?>">
                    <img src="<?php echo get_template_directory_uri() . '/images/aj-code-logo.svg' ?>" />
                </a>

                <div class="menu-icon">
                    <div class="menu-btn-burger"></div>
                </div>

            </div>
        
            <nav>
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 3,
                    ));
                ?>
            </nav> 

            <div class="mobile-menu">
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 3,
                    ));
                ?>
            </div>  
            
        </div>

    </header>