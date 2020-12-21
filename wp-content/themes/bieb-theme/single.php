<?php get_header();?>

<main id="main-primary">

	<div class="container">
        

 
        <h1><?php the_title();?></h1>
        <div class="post-cat">
            <?php echo the_category(); ?>
        </div>

        <?php get_template_part('includes/section','blogcontent');?>

	</div>

</main>

<?php get_footer();?>