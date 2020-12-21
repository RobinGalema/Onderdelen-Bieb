<?php get_header();?>


<main id="main-primary">

    
	<div class="container">

        <h1><?php echo single_cat_title();?></h1>
    
		<?php get_template_part('includes/section','archive');?>

		<?php previous_posts_link();?>
		<?php next_posts_link();?>

	</div>
</main>

<?php get_footer();?>
