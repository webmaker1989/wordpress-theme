<?php get_header();?>
<div class= "container my-5 ">  
<?php get_template_part('includes/section', 'projectarchive'); ?>

<?php //echo do_shortcode('[project_slider]'); ?>

<?php the_posts_pagination();  ?>
</div>
<?php get_footer();?>