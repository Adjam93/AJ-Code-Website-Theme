<?php 

    get_header();

    global $post;

    $project_link = get_post_meta( get_the_ID(), 'project-link', true );
    $project_link_name = get_post_meta( get_the_ID(), 'project-link-name', true );

    $project_source_link = get_post_meta( get_the_ID(), 'project-source-link', true );
    $project_source_name = get_post_meta( get_the_ID(), 'project-source-name', true );

    $project_date = get_post_meta( get_the_ID(), 'project-date', true );

?>

<main class="container">
        
    <div class="page-wrapper">

        <div class="portfolio-single">

            <h1><?php the_title(); ?></h1>

            <div class="portfolio-single-item">
            
                <div class="portfolio-single-info">
                
                    <?php  if ( has_post_thumbnail() ) : ?>
                        <img class="featured-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $image_alt ?>">
                    <?php endif; ?>

                </div>
            
                <div class="side-meta">
        
                    <ul>
                        <?php if( !empty( $project_link ) && !empty( $project_link_name ) ) : ?>
                            <li><strong>Link:</strong> <a href="<?php echo esc_url( $project_link ) ?>" target="_blank" rel="noopener"><?php echo $project_link_name; ?></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $project_source_link ) && !empty( $project_source_name ) ) : ?>
                            <li><strong>Source:</strong> <a href="<?php echo esc_url( $project_source_link ) ?>" target="_blank" rel="noopener"><?php echo $project_source_name; ?></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $project_date ) ) : ?>
                            <li><strong>Date:</strong> <?php echo $project_date; ?></li>
                        <?php endif; ?>

                        </ul>

                        <p>
                            <?php echo get_the_excerpt(); ?>
                        </p>

                        <div class="post-tags">
                            <?php
                                $post_tags = get_the_tags();
                                $output = '';

                                if ( !empty( $post_tags ) ) :

                                    foreach ( $post_tags as $tag ) : ?>

                                        <a href="<?php echo get_tag_link( $tag->term_id ) ?>"><?php echo $tag->name ?></a>

                            <?php  endforeach; endif; ?>
                        </div>

                        <div class="post-links-nav">
                            <?php

                                $prev_url = get_permalink( get_adjacent_post( false, '', false )); #Previous
                                $next_url = get_permalink( get_adjacent_post( false, '', true )); #Next

                                if ( get_permalink() != $prev_url ) : ?>

                                    <a href='<?php echo $prev_url ?>' class="nav-arrow prev-post"><span class="read-more-arrow">&#8592;</span> Previous</a>

                                <?php endif; ?>

                                <?php 
                                    if ( get_permalink() != $next_url ) : ?>

                                    <a href='<?php echo $next_url ?>' class="nav-arrow next-post">Next <span class="read-more-arrow">&#8594;</span></a>

                                <?php endif; ?>
                        </div>

                </div>
                
            </div>

        </div>

        <div class="portfolio-single-content">

            <?php the_content(); ?>

        </div>

    </div>

</main>

<?php get_footer(); ?>