<?php
?>
		<div class="project-outer-container slick-class">
			<?php
if ( have_posts() ) {
	while ( have_posts() ) { 
		 the_post(); ?>
              <div class="project-container">  
					<div class="project-block">
						<div class="archive-page-thumbnails w-full">
						  <?php the_post_thumbnail('blog-thumbnail'); ?>
						</div>
						<div class="project-info">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="btn btn-success">Read More</a>
						</div>
					</div>
						
			    </div>
	

	<?php }
}?>

</div>