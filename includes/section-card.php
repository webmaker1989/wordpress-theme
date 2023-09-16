
      <!-- Card 1 -->
	  <div class="col-sm-4">
		<div class="bg-white shadow-md rounded-lg p-6">
			<div class="post-cover-image">
			<?php the_post_thumbnail('blog-thumbnail'); ?>
			</div>
			<h2 class="text-xl font-semibold mb-2"><?php the_title(); ?></h2>
			<p class="text-gray-700 mb-2">By <span class="font-medium">Author Name</span></p>
			<div class="flex items-center text-gray-500 mb-4">
				<span class="mr-2"><i class="fas fa-calendar-alt"></i> June 24, 2023</span>
				<span class="mr-2"><i class="fas fa-user"></i> 1000+</span>
				<span><i class="fas fa-eye"></i> 5000+</span>
			</div>
			<p class="text-gray-700 mb-4"><?php the_excerpt(); ?></p>
			<a href="<?php the_permalink(); ?>" class="text-blue-500 hover:text-blue-700 font-medium">Read More</a>
		</div>
</div>