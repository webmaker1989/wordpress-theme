<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<div class="card my-3">
			<div class="card-body">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-success">Read More</a>
			</div>
		</div>

	<?php }
}

else {?>
      <h2> No result found related to: <?php the_search_query(); ?> </h2>
    <?php
}