<?php

/* Template Name: Contact Page */

get_header(); 

?>

<main class="container">
    
<div class="page-wrapper">

    <div class="contact-page-info">
        <?php echo the_content(); ?>
    </div>

    <div class="contact-page">

        <div class="contact-page-form">

            <?php if ( function_exists( 'contactformx' ) ) {

                    echo contactformx();

                } 
            ?>

        </div>

        <div class="contact-side-meta">

            <div class="socials">
                <a href="https://github.com/Adjam93" aria-label="github" rel="noopener" target="_blank">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x"></i>
                    </span>
                    Github Page
                </a>

                <a href="https://codepen.io/AdamJames93/" aria-label="codepen" rel="noopener" target="_blank">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-codepen fa-stack-1x"></i>
                    </span>
                    CodePen Projects
                </a>

                <a href="https://www.youtube.com/channel/UC6bDqtLA5ubCxVg6-CtG4sw" aria-label="youtube" rel="noopener" target="_blank">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-youtube fa-stack-1x"></i>
                    </span>
                    YouTube Channel
                </a>
            </div>

        </div>
    
    </div>
    
</div>

</main>

<?php get_footer(); ?>
