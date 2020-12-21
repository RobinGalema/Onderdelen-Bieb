<?php
/*
Template Name: Archief template
*/
get_header(); ?>


<div class="archive-container">

    <h2><?php echo the_archive_title();?></h2>

		<div id="content" role="main">


        <div class="row justify-content-start mt-5">
    <?php get_template_part('includes/section','archive');?>
    </div>
		
        
        

	</div><!-- #content -->

</div>


<?php get_footer();?>
