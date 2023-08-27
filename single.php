<?php get_header();?>
<div class= "container">
	<section class = "row">

<div class="col-sm-9">
<?php get_template_part('includes/section', 'blogcontent'); ?>
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>
</div>

<div class="col-sm-3">
<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
	<ul id="sidebar">
		<?php dynamic_sidebar('sidebar-2'); ?>
	</ul>
<?php } ?>
</div>


</section>
</div>
<?php get_footer();?>