<?php get_header();?>
<div class= "container">
    <div class="row">
            <div class="col-sm-8">
                <?php get_template_part('includes/section', 'blogajax'); ?>


                <?php// the_posts_pagination();  ?>
            </div>

            <div class="col-sm-3">
            <?php get_template_part('includes/form', 'inquiry'); ?>
            </div>
    </div>
</div>

<?php get_footer();?>

