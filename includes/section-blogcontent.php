<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
            <img  src="<?php the_post_thumbnail_url('single-post-thumbnail');?>" title="<?php the_title_attribute(); ?>" 
             alt="<?php the_title();?>" class= "img-fluid my-2 img-thumbnail">
            </a>
        <?php endif; ?>

		<h2><?php the_title(); ?></h2>
        <p><?php the_date( 'l F j, Y' )?></p> 

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
        <p><span class= "text-primary">Posted By:</span> <?php the_author_meta('first_name');?> 
        <?php the_author_meta('last_name')?> </p>
         
        <p> Categories: <?php //print_r(get_categories()); 
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'DESC'
                ) );
                foreach($categories as $cat){?>

                 <a href='<?php echo get_category_link($cat->cat_ID) ?>' class='d-inline-block me-3 text-decoration-none'> 
                 <?php echo $cat->name ?>
                </a>

                 <?php
                }
                     ?></p>

                

	<?php }
}