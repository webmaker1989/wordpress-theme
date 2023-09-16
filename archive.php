<?php get_header('post');?>
<div class= "container"> 
<?php get_template_part('includes/section', 'archive'); ?>
<?php the_posts_pagination();  ?>
</div>
<?php get_footer();?>