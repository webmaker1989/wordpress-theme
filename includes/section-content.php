<?php

if ( is_front_page() ) {
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            ?>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
            <?php
        }
    }
}
