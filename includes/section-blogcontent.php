<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <?php if (has_post_thumbnail()) : ?>
            <?php
            // Sanitize the post thumbnail URL
            $thumbnail_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'single-post-thumbnail'));
            ?>

            <div class="post-cover-image mw-100" style="height: 300px; background-image: url('<?php echo $thumbnail_url; ?>'); background-size: cover; background-position: center;">
                <img src="<?php echo $thumbnail_url; ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title(); ?>" class="sr-only">
            </div>
        <?php endif; ?>

        <div class="container post-content-block">
            <h1 class = "mt-2"><?php the_title(); ?></h1>
            <p><?php the_date('l F j, Y') ?></p>

            <?php
            $post_tags = get_the_tags();
            if ($post_tags) {
                echo '<p>';
                the_tags();
                echo '</p>';
            }
            ?>

            <?php the_content(); ?>

            <?php wp_link_pages(); ?>
            <p><span class="text-primary">Posted By:</span> <?php the_author_meta('first_name'); ?>
                <?php the_author_meta('last_name') ?> </p>

            <p> Categories:
                <?php
                $categories = get_the_category();
                foreach ($categories as $cat) : ?>
                    <a href='<?php echo esc_url(get_category_link($cat->cat_ID)); ?>' class='d-inline-block me-3 text-decoration-none'>
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </p>

            <div class= "post-comment"><?php
            // Check if comments are open or if there are comments before loading the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?> </div>
        </div>

<?php
    }
}
?>
