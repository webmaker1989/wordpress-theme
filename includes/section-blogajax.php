<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'paged' => 1 // change the number to 2 in url and see the result it will show next page post
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container post-container row mx-auto my-5">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('includes/section', 'card'); ?>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>

    <div id="response-container"></div>

    <button type="button" class="btn btn-primary text-center mx-auto my-2" id="btn">Load More</button>

<?php endif; ?>
