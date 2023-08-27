<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header();?>
<div class= "container">

<div class="row">
    <div class="col-sm-4 p-3 bg-primary text-white">This is left container</div>
    <div class="col-sm-8 p-3 bg-dark text-white"><?php get_template_part('includes/section', 'content'); ?></div>
  </div>
</div>
<?php get_footer();?>