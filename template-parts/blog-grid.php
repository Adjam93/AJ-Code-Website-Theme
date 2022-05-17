<div class="blog-grid">

    <?php if( have_posts() ) : ?>

        <?php while( have_posts() ) : the_post(); ?>

            <div class="blog-card">
            
                <?php  if ( has_post_thumbnail() ) : ?>
                    <a class="thumbnail" href="<?php echo the_permalink(); ?>">
                        <img class="blog-img" src="<?php echo get_the_post_thumbnail_url( get_the_ID() ) ?>" alt="<?php echo $image_alt ?>">
                    </a> 
                <?php endif; ?>
            
                <div class="flex-list">
            
                    <div class="card-meta">
                        
                        <div class="blog-meta">

                            <div class="author-meta">
                                
                                <img class="instructor-profile-picture" src="<?php echo get_template_directory_uri() . '/images/aj-code-square-logo.svg' ?>" alt="Author Profile Picture" height="64" width="64" /> 
                                <div class="author-details">
                                    <span class="post-author"><?php the_author(); ?></span>
                                    <span><?php the_time( 'M j, Y' ); ?></span>
                                </div>

                            </div>

                            <a class="post-link" href="<?php echo the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a> 

                            <div class="blog-categories">
                                <?php echo get_the_category_list( ' ' ); ?>
                            </div>
                            
                        </div>
                        
                    </div>
            
                    <div class="blog-info">
                        <p><?php echo get_the_excerpt(); ?></p>
                        <a class="read-more-btn" href="<?php echo the_permalink(); ?>">Read More <span class="read-more-arrow">&#8594;</span></a>
                    </div>
                
                </div>

            </div>

    <?php endwhile; ?>

    <?php else : ?>

        <div class="no-results">
            <h2>Nothing in the Blog at the moment</h2>
        </div>

    <?php endif; ?>

</div>