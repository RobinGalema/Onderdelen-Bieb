<?php get_header();?>

<main id="main-primary">
    <section>
        <div class="container">
        
            <!-- FAQ PHP -->
            <h1><?php echo the_title() ?></h1>
            <h2>F.A.Q. Onderdeel</h2>

            
            <?php 
                $post_type = 'faq';

                // Get all the taxonomies for this post type
                $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
                
                foreach( $taxonomies as $taxonomy ) : 
   
                    $terms = get_terms( $taxonomy );
                    // Gets every "category" (term) in this taxonomy to get the respective posts
                    foreach( $terms as $term ) : 
                        ?> <h3 class="mt-4"><b><?php echo $term->name; ?></b></h3> <?php
                        $posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=10" );
                
                        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>

            <div class="faq-container">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <div class="row">
                        <h3 class="col-8"><?php the_title(); ?></h3>
                        <h3 class="col-1"><i class="fas fa-caret-down"></i></h3>
                    </div>
                    <div class="faq-answer" id="answer">
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
            </div>

            <?php endwhile; endif;
                
                    endforeach;
                
                endforeach;
            ?>
            <!-- END FAQ PHP -->

        </div>
    </section>
    <section>
        <div class="container mt-5 mb-5">
        </div>
    </section>

</main>

<?php get_footer();?>