<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

		<div class="card my-3">
			<div class="card-body">
             
			<div class="d-inline-flex p-3">  
			<div class="p-2">
				<div class="archive-page-thumbnails">
				<?php the_post_thumbnail('blog-thumbnail'); ?>
				</div>
			</div>
			<div class="p-2">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-success">Read More</a>
			</div>
			</div>
			</div>
		</div>

	<?php }
}