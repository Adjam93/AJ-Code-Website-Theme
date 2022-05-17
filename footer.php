<footer class="main-footer">

    <div class="inner-footer">

        <div class="socials">

            <a href="https://github.com/Adjam93" aria-label="github" rel="noopener" target="_blank">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x"></i>
                </span>
            </a>

            <a href="https://codepen.io/AdamJames93/" aria-label="codepen" rel="noopener" target="_blank">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-codepen fa-stack-1x"></i>
                </span>
            </a>

            <a href="https://www.youtube.com/channel/UC6bDqtLA5ubCxVg6-CtG4sw" aria-label="youtube" rel="noopener" target="_blank">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-youtube fa-stack-1x"></i>
                </span>
            </a>

        </div>

        <div class="footer-links">

            <ul>
                <li><a href="<?php echo home_url( '/projects') ?>">Portfolio</a></li> 
                <li><a href="<?php echo home_url( '/blog') ?>">Blog</a></li> 
                <li><a href="<?php echo home_url( '/about') ?>">About</a></li> 
                <li><a href="<?php echo home_url( '/contact') ?>">Contact</a></li> 
            </ul>

            <span>Copyright &#169; - Adam James, <?php echo date( 'Y' );  ?></span>
        </div>

    </div>

</footer>


<?php wp_footer(); ?>

</body>
</html>