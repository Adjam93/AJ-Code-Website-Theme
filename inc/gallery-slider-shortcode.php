<?php

function get_block_id( $block ) {

    if ( $block['blockName'] !== 'core/gallery' ) return;

    $block_html = $block[ 'innerHTML' ];
    $id_start = strpos( $block_html, 'id="' ) + 4;

    if ( $id_start === false ) return;

    $id_end = strpos( $block_html, '"', $id_start );
    $block_id = substr( $block_html, $id_start, $id_end - $id_start );

    return $block_id;
}


//Remove default gallery block markup
function remove_gallery_block_html( $block_content, $block ) {

    global $post; 

    //if the block isn't a gallery block return normal block content
    if ( $block[ 'blockName' ]  !== 'core/gallery' ) {

        return $block_content;

    }

    //if the post contains the slick gallery shortcode, return just an empty string, removing the gallery markup 
    if ( has_shortcode( $post->post_content, 'slick-slider-gallery' ) ) {

        return '';

    }
    
    return $block_content;

}

add_filter( 'render_block', 'remove_gallery_block_html', 10, 2 );

function gutenberg_gallery_slick_slider_shortcode() {
    
    global $post; 

    if ( has_block( 'gallery', $post->post_content ) ) :

    ob_start(); ?>

    <section id="project-gallery">

        <h2>Project Gallery</h2>
        
        <div class="gallery-img">

            <?php

                $post_blocks = parse_blocks( $post->post_content );

                foreach( $post_blocks as $block ) {

                    if( $block['blockName'] == 'core/gallery' ) {

                        $ids = $block[ 'attrs' ][ 'ids' ];

                        foreach( $ids as $id ) {

                            $image = wp_get_attachment_image_src( $id, 'full' );
                            $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
                            $image_caption = wp_get_attachment_caption( $id );
                            
                            echo '<div class="item"><img data-lazy="'. $image[0] .'" data-src="'. $image[0] .'" alt="'. $image_alt .'"><div class="img-caption"><h3>' .  $image_caption . '</h3></div></div>';

                        } 

                    }

                }

            ?>

        </div>

    </section>

    <?php

        endif; 
        return ob_get_clean();

} // end gutenberg_gallery_slick_slider_shortcode function

add_shortcode ( 'slick-slider-gallery', 'gutenberg_gallery_slick_slider_shortcode' );