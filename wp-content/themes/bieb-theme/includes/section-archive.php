<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    <div class="blogpost col-4">

        <div class="blogpost-body">
                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php //the_excerpt();?>

            <a href="<?php the_permalink();?>" class="btn btn-blog">Bekijk</a>
        </div>

    </div>


    <?php endwhile; else: endif; ?>
