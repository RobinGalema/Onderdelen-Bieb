<?php get_header();?>

<div class="featured-image">

		<?php if(has_post_thumbnail()):?>

			<img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="img-fluid">

		<?php endif;?>
    
</div>

<main id="main-primary">
    <div class="container">


                 
        <h1><?php the_title();?></h1>

        <?php get_template_part('includes/section','content');?>

    </div>
</main>






<?php get_footer();?>