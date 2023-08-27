<?php

if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>


<div class="container">
	
  <div class="row">
    <div class="col-sm-3">
	<?php get_search_form(); ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<ul id="sidebar">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</ul>
  
<?php } ?>
    </div>
    <div class="col-sm-9">
      
		 <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
            <img  src="<?php the_post_thumbnail_url();?>" title="<?php the_title_attribute(); ?>" 
             alt="<?php the_title();?>" class= "img-fluid my-2 img-thumbnail">
            </a>
        <?php endif; ?>

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>
    </div>
  </div>
</div>


	<?php }
}