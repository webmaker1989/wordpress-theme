<?php get_header();?>
<div class= "container">
<h2 class = "bg-primary"> SEO Category Template </h2>   
<?php get_template_part('includes/section', 'archive'); ?>
<?php the_posts_pagination();  ?>
</div>
<?php get_footer();?>