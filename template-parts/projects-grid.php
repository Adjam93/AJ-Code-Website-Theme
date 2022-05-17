<div class="blog-grid">

    <?php if( have_posts() ) : ?>

        <?php while( have_posts() ) : the_post(); ?>

            <?php 
                $image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE );
                $project_meta = get_post_meta( get_the_ID(), 'img-top-left', TRUE );
            ?>

            <div class="blog-card">
            
                <?php  if ( has_post_thumbnail() ) : ?>
                    <a class="thumbnail" href="<?php echo the_permalink(); ?>">
                        <img class="blog-img <?php echo $project_meta == "yes" ? 'top-left' : 'top-center' ?>" src="<?php echo get_the_post_thumbnail_url( get_the_ID() ) ?>" alt="<?php echo $image_alt ?>">
                    </a> 
                <?php endif; ?>
            
                <div class="flex-list">

                    <div class="tag-info">

                        <a class="post-link" href="<?php echo the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <div class="heading-divider"><span></span></div>
                        </a> 

                        <p><?php echo get_the_excerpt(); ?></p>
                        
                        <a class="read-more-btn" href="<?php echo the_permalink(); ?>">View Project <span class="read-more-arrow">&#8594;</span></a>
                    </div>

                </div>

            </div>
        

        <?php endwhile; ?>

        <?php else : ?>

            <div class="no-results">
                <h2>Nothing in the Blog at the moment!</h2>
            </div>

        <?php endif; ?>

</div>