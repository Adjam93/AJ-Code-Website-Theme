<?php get_header(); ?>

<section id="loading-screen">

    <div id="loader"></div>

</section>

<div class="models-wrapper" id="models-hero">

    <div class="portfolio-link-wrapper">

        <h1>Hi <img draggable="false" role="img" class="emoji" alt="👋" src="https://s.w.org/images/core/emoji/13.0.1/svg/1f44b.svg"> 
        I'm Adam, welcome to my <span class="portfolio-highlight">portfolio</span> site
        </h1>

        <a id="arrow-wrapper" href="#portfolio-content">
            <div class="arrow-border">
              <div class="arrow down"></div>
              <div class='pulse'></div>
            </div>
        </a>

    </div>
 
</div>

<div id="portfolio-content"></div>

<div class="portfolio">

    <?php

        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);

        if( $query->have_posts() ) :

            while( $query->have_posts() ) : $query->the_post(); ?>

            <?php  

                $image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE );
                $project_meta = get_post_meta( get_the_ID(), 'img-top-left', TRUE );
            ?>

            <div class="portfolio-item">
                <h2><a href="<?php echo the_permalink() ?>"><?php echo get_the_title() ?></a></h2>
                <div class="heading-divider"><span></span></div>

                <div class="portfolio-info">

                    <?php  if ( has_post_thumbnail() ) : ?>
                        <a href="<?php echo the_permalink() ?>">
                            <img class="<?php echo $project_meta == "yes" ? 'top-left' : 'center' ?>" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $image_alt ?>">
                        </a> 
                    <?php endif; ?>

                    <a href="<?php echo the_permalink() ?>" class="inner-box">View Project</a>
                   
                </div>

                <div class="excerpt"><?php the_excerpt() ?></div>

            </div>

        <?php  
        
                endwhile;

                wp_reset_postdata();

            endif;
        ?>

</div>

<?php get_footer(); ?>