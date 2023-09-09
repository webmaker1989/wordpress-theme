<?php
/*
Template Name: Test API
*/
?>

<?php get_header();?>
<div class= "container">

<?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
            <img  src="<?php the_post_thumbnail_url();?>" title="<?php the_title_attribute(); ?>" 
             alt="<?php the_title();?>" class= "img-fluid my-2 img-thumbnail">
            </a>
        <?php endif; ?>

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>


</div>
<?php get_footer();?>