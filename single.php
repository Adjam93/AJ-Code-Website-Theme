<?php 

    get_header();
    
?>

<main class="container">

    <div class="page-wrapper">

    
    <?php if( have_posts() ) : ?>

        <?php while( have_posts()) : the_post(); ?>

        <article>

            <div class="top">

                <div class="header">

                    <h1><?php the_title(); ?></h1>

                    <div class="author-meta">
                        <img class="instructor-profile-picture" src="<?php echo get_template_directory_uri() . '/images/aj-code-square-logo.svg' ?>" alt="Author Profile Picture" height="64" width="64" /> 
                        <div class="author-details">
                            <span class="post-author"><?php the_author(); ?></span>
                            <span><?php the_time('M j, Y'); ?></span>
                            <span><?php echo 'Last modified: ' . get_the_modified_date() ?></span>
                        </div>
                    </div>

                    <div class="blog-categories">
                        <?php echo get_the_category_list( ' ' ); ?>
                    </div>
                    
                </div>

                <figure class="featured-img">
                    <?php  if ( has_post_thumbnail() ) : ?>
                        <img class="featured-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $image_alt ?>">
                    <?php endif; ?>
                </figure>

            </div>
            
            <div class="main-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; endif; ?>

    </div>

</main>

<?php get_footer(); ?>