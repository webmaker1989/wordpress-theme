<?php get_header();?>
<div class= "container">
  <h1 class= "text-capitalize"><?php single_cat_title('Tags : '); ?></h1>  
<?php get_template_part('includes/section', 'tag'); ?>
<?php the_posts_pagination();  ?>
</div>
<?php get_footer();?>