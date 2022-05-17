<?php get_header(); ?>


<main class="container">

    <div class="page-wrapper">

        <?php if( have_posts() ) : ?>

            <?php while( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>