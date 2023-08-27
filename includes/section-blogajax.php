<?php

$args = array(
    'cat' => 4,
    'post_status' => array( // (string | array) - use post status. Retrieves posts by Post Status, default value i'publish'.
        'publish', // - a published post or page.
        'future'// - a post to publish in the future.
      ),
      'posts_per_page' => 1,
      'paged' => 1  // change the number to 2 in url and see the result it will show next page post
 );

$query = new WP_Query($args);

if ( $query->have_posts() ) {

	while (  $query->have_posts() ) {
		$query->the_post(); ?>

    <div class="post-container">
		<?php get_template_part('includes/section', 'card'); ?>
    </div>

	<?php } ?>

    <?php wp_reset_postdata(); ?>
    
<button type="button" class="btn btn-primary" id= "btn">Load More</button>

    <?php
}

