<?php

/**
 * klantnaam thema functies
 *
 */


// load stylesheets

function load_css()
{

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css' );

}
add_action('wp_enqueue_scripts','load_css');


//load javascripts

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        'jquery', false, true);
    wp_enqueue_script('bootstrap');

    wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js',
    'jquery', false, true);
    wp_enqueue_script('custom');
    

}
add_action('wp_enqueue_scripts','load_js');


function assets() {

    wp_enqueue_script('tuts/js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);

    wp_localize_script( 'tuts/js', 'libelnet', array(
        'nonce'    => wp_create_nonce( 'libelnet' ),
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_enqueue_scripts', 'assets', 100);


//theme options

add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('post-thumbnails');


// menus

register_nav_menus(

    array(

        'hoofdmenu' => 'Hoofdmenu',
        'top-bar' => 'Top bar',


    )
);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// custom image sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);


// sidebars registreren

function my_sidebars()
{

    register_sidebar(

        array(

            'name' => 'Footer Utility',
            'id' => 'footer-utility',
            'before_title' => '<h4">',
            'after_title' => '</h4>',
            'before_widget' => '<div>',
            'after_widget' => '</div>'
        )
    );


}
add_action('widgets_init','my_sidebars');


// Register custom post types
//  FAQ
function post_type_faq()
{
    $args = array(

        'labels' => array(

            'name' => 'FAQ',
            'singular_name' => 'FAQ',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-editor-justify',
        'supports' => array('title', 'editor', 'thumbnail'),

    );

    register_post_type('faq', $args);
}
add_action('init', 'post_type_faq');

//taxonomy faq
function taxonomy_faq()
{
    $args = array(

        'labels' => array(

            'name' => 'Filters',
            'singular_name' => 'Filter',
        ),

        'hierarchical' => true,
        'public' => true,
    );

    register_taxonomy('filter', array('faq'), $args);
}
add_action('init', 'taxonomy_faq');


//  TEST POST TYPE
function post_type_example()
{
    $args = array(

        'labels' => array(

            'name' => 'Example Post Types',
            'singular_name' => 'Example Post Type',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-editor-justify',
        'supports' => array('title', 'editor', 'thumbnail'),

    );

    register_post_type('example', $args);
}
add_action('init', 'post_type_example');

//  TEST POST TYPE TEXONOMY
function taxonomy_example()
{
    $args = array(

        'labels' => array(

            'name' => 'Example Categories',
            'singular_name' => 'Example Category',
        ),

        'hierarchical' => true,
        'public' => true,
    );

    register_taxonomy('ex-cat', array('example'), $args);
}
add_action('init', 'taxonomy_example');


// =============================================================== 
//  LIBRARY FUNCTIONALITY SHORTCODES
// ===============================================================

// Remove "Categorie" from category page headings
add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});


// ---- Maak het voorbeeld met de beschrijving op ----
function WrapExample ($atts, $content = null){

    $contentIsShortcode = $atts['isshortcode'];
    $discription = $atts['disc'];

    ob_start();?>

<div class="example-wrapper row justify-content-center">
    <div class="col-12 h-100">
        <div class="row h-100">
            <div class="col-9 example">
                <?php if ($contentIsShortcode == "true"):
                            echo do_shortcode($content);
                    else:
                        echo $content;
                    endif?>
            </div>
            <div class="col-3 example-disc">
                <p><?php echo $discription ?></p>
            </div>
        </div>
    </div>
</div>

<?php

    return ob_get_clean();
} add_shortcode('wrap-example', 'WrapExample'); // Define shortcode


// ---- Code Snippets -----
function CreateSnippet ($atts, $content = null){

    $title = $atts['title'];

    ob_start();?>

<div class="col-12 code-block">
    <div class="code-container">
        <h3><?php echo $title ?></h3>
        <?php echo $content ?>
        <button class="copy-btn" onclick="CopySnippet(this)"><i class="fas fa-copy"></i></button>
    </div>
</div>

<?php

    return ob_get_clean();
}add_shortcode('create-snippet', 'CreateSnippet'); // Define shortcode


// ---- Categories ----
function showCategories(){
$args = array(
    'orderby' => 'description',
    'parent' => 0
    );
  $categories = get_categories( $args );
  ob_start();

  foreach($categories as $category):{
      if ($category->name != "Geen categorie" && $category->name != "Test"): // Don't show posts with no category
      ?>
<div class="main-cat-container">
    <a href="<?php echo get_category_link($category->term_id) ?>">
        <h2><?php echo $category->name;?></h2>
    </a>
    <ul><?php

      $args = array('child_of' => $category->term_id);
      $subCategories = get_categories( $args );
    foreach($subCategories as $subCategory): { 
        ?> <li><a href="<?php echo get_category_link($subCategory->term_id) ?>">
                <h4><?php echo $subCategory->name ?></h4><i class="fas fa-arrow-circle-right"></i>
            </a></li> <?php
    }endforeach;
    ?></ul>
</div><?php
endif;
  }
endforeach;

  return ob_get_clean();

}add_shortcode('WP-CAT', 'showCategories'); // Define shortcode



// =============================================================== 
//  SHORTCODE FOR LOADING SPECIFIC CONTENT INTO AN ACCORDEON
// ===============================================================
function CreateAccordeon($atts){
    // Get all the taxonomies for this post type
    $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $atts['post-type'] ) );
    $cat = $atts['cat'];
    $subcat = $atts['subcat'];
    $showNoCat = $atts['shownocat'];
    
    // Start the HTML object
    ob_start();

    // Display posts with no category selected
    if($showNoCat == "true"):{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'faq'
    );

    $posts = get_posts($args);

    foreach($posts as $post):{

        if (get_the_terms($post->ID, 'filter') == null):{
            ?>

<div class="faq-container">
    <div class="faq-title" data-active="false" onclick="toggleFaq(this)">
        <div class="row">
            <h3 class="col-8"><?php echo $post->post_title;?></h3>
            <h3 class="col-1"><i class="fas fa-caret-down"></i></h3>
        </div>
    </div>
    <div class="faq-answer" id="answer" style="display: none;">
        <div class="answer-inner">
            <?php echo $post->post_content; ?>
        </div>
    </div>
</div>
<?php
        }
        endif;
    }
    endforeach;
}endif;

    // Get all categories and posts
    foreach( $taxonomies as $taxonomy ) : // TAXONOMY FOREACH

        $terms = get_terms( $taxonomy );
        // Gets every "category" (term) in this taxonomy to get the respective posts

         foreach( $terms as $term ) : { // TERM FOREACH
            // If there is no category given, append all category titles 
            if ($cat == null):{
                ?> <h3 class="mt-4"><b><?php echo $term->name;?></b></h3> <?php

                // If there IS a category given, append only this title
             } elseif ($term->name == $cat): {
            ?> <h3 class="mt-4"><b><?php echo $term->name;?></b></h3>
<?php
            }   endif;
            $posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug" );
    
            if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); // HAVE POST IF | WHILE HAVE POSTS?>
<?php 

            // If there is no category given, append all the post of the given type
            if ($cat == null):
                ?>
<div class="faq-container">
    <div class="faq-title" data-active="false" onclick="toggleFaq(this)">
        <div class="row">
            <h3 class="col-8"><?php echo the_title();?></h3>
            <h3 class="col-1"><i class="fas fa-caret-down"></i></h3>
        </div>
    </div>
    <div class="faq-answer" id="answer" style="display: none;">
        <div class="answer-inner">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
            // There is a category given, append only post of the given type and category
            else:
            $c = get_the_terms( $post->ID, 'filter' );
                foreach( $c as $category) :
                    if ($category->name == $cat):
                    ?>
<div class="faq-container">
    <div class="faq-title" data-active="false" onclick="toggleFaq(this)">
        <div class="row">
            <h3 class="col-8"><?php echo the_title();?></h3>
            <h3 class="col-1"><i class="fas fa-caret-down"></i></h3>
        </div>
    </div>
    <div class="faq-answer" id="answer" style="display: none;">
        <div class="answer-inner">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
                    endif;
                endforeach;
            endif;

        endwhile; /* END WHILE HAVE POSTS*/ endif; // END IF HAVE POSTS; 
    
         }endforeach; // END TERM FOREACH
    
    endforeach; // END TAXONOMY FOREACH

    $o = ob_get_clean(); // Close and store the HTML object

    return $o; // Return the HTML object
}
add_shortcode('WP-ACCORDEON', 'CreateAccordeon'); // Define shortcode
// END ACCORDEON SHORTCODE

// CREATE CARDS FROM POSTS
function LoadBlogposts($atts){
    $count = $atts['count'];
    $cat = $atts['cat'];

    if ($cat == null){
        $cat = "";
    }

    $args = array(
        'category_name' => $cat,
        'posts_per_page' => $count
    );

    $catquery = new WP_Query($args);
    ob_start(); ?>

<div class="row justify-content-left blogposts-container">
    <?php
    while($catquery->have_posts()) : $catquery->the_post(); 
    $category = get_the_category(); ?>

    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="post">

            <!-- Category Tag - remove if wanted -->
            <div class="cat-tag">
                <span><?php echo ($category[0]->cat_name) ?></span>
            </div>
            <!-- End Category Tag -->

            <div class="image-container">
                <a href="<?php echo the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                </a>
            </div>
            <div class="title-container">
                <a href="<?php echo the_permalink(); ?>">
                    <h3><?php echo the_title(); ?></h3>
                </a>
                <span><?php echo get_the_date('j M Y')?></span>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
</div>
<?php

return ob_get_clean();

}add_shortcode("WP-POSTS-CARDS", "LoadBlogposts");


// CREATE CARDS FROM CUSTOM POST TYPE
function GetCustomPosts($atts){
    $type = $atts['type'];
    $count = $atts['count'];
    $tax = get_object_taxonomies( (object) array( 'post_type' => $atts['type'] ) );
    $cat = $atts['cat'];
    $style = $atts['style'];

    $args = array(
        'post_type' => $type,
        'posts_per_page' => $count,
        'order' => 'ASC'
    );
    ob_start();

    $terms = get_terms( $tax );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()){ ?>
<div class="row custom-post-container">

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

            if ($cat != null){

            $c = get_the_terms( get_the_ID() , $tax[0] );

            foreach( $c as $category) {
                if ($category->name == $cat){
                    // Build the card 
                    SelectCardType($style);
                }
                }
            }
                else{
                // Build the card 
                SelectCardType($style);
            }

         endwhile; ?>
</div>

<?php wp_reset_postdata(); 
    }

    return ob_get_clean();

}add_shortcode("WP-CUSTOM-POSTS", "GetCustomPosts");


// ======================================
//  SELECT CARD TYPE
// ======================================   
function SelectCardType($cardStyle){

    switch ($cardStyle){
        case 'image-bg':
            CreateBackgroundCard();
            break;
        case 'blog-post':
            CreatePostCard();
            break;
        case 'label':
            CreatePostLabel();
            break;
        default:
            CreateBackgroundCard();
    }
}


// ======================================
//  DIFFERENT CARD TYPES
// ======================================   

// Cards with feature image as background
function CreateBackgroundCard(){
    ?>
<div class="col-6 mb-4">
    <div class="img-bg-card">
        <div class="content">
            <img src="<?php echo get_the_post_thumbnail_url();?>">
            <h3><?php echo the_title(); ?></h3>
            <a href="<?php echo the_permalink(); ?>">Bekijk</a>
        </div>
    </div>
</div>

<?php
}

// Cards for displaying posts
function CreatePostCard(){
    ?>
<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
    <div class="post">

        <!-- Category Tag - remove if wanted -->
        <div class="cat-tag">
            <span><?php echo ($category[0]->cat_name) ?></span>
        </div>
        <!-- End Category Tag -->

        <div class="image-container">
            <a href="<?php echo the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
            </a>
        </div>
        <div class="title-container">
            <a href="<?php echo the_permalink(); ?>">
                <h3><?php echo the_title(); ?></h3>
            </a>
            <span><?php echo get_the_date('j M Y')?></span>
        </div>
    </div>
</div>
<?php
}

// Labels to displays post titles
function CreatePostLabel(){
    ?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="post-label">
        <a href="<?php echo the_permalink(); ?>">
            <span><?php echo the_title(); ?></span>
        </a>
    </div>
</div>

<?php
}

/**
 * AJAX filter posts by taxonomy term
 */
function vb_filter_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'libelnet' ) )
        die('Permission denied');

    /**
     * Default response
     */
    $response = [
        'status'  => 500,
        'message' => 'Something is wrong, please try again later ...',
        'content' => false,
        'found'   => 0
    ];

    $tax  = sanitize_text_field($_POST['params']['tax']);
    $term = sanitize_text_field($_POST['params']['term']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);
    $post_type = sanitize_text_field($_POST['params']['post-type']);

    /**
     * Check if term exists
     */
    if (!term_exists( $term, $tax) && $term != 'all-terms') :
        $response = [
            'status'  => 501,
            'message' => 'Term doesn\'t exist',
            'content' => 0
        ];

        die(json_encode($response));
    endif;

    if ($term == 'all-terms') : 

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
            'operator' => 'NOT IN'
        ];

    else :

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
        ];

    endif;

    /**
     * Setup query
     */
    $args = [
        'paged'          => $page,
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => $qty,
        'tax_query'      => $tax_qry
    ];

    $qry = new WP_Query($args);

    ob_start();
        if ($qry->have_posts()) : ?>

<div class="row">
    <?php
            while ($qry->have_posts()) : $qry->the_post(); 
            
            SelectCardType('image-bg');
        
        endwhile;
        ?> </div> <?php

            /**
             * Pagination
             */
            vb_ajax_pager($qry,$page);

            $response = [
                'status'=> 200,
                'found' => $qry->found_posts
            ];

            
        else :

            $response = [
                'status'  => 201,
                'message' => 'No posts found'
            ];

        endif;

    $response['content'] = ob_get_clean();

    die(json_encode($response));

}
add_action('wp_ajax_do_filter_posts', 'vb_filter_posts');
add_action('wp_ajax_nopriv_do_filter_posts', 'vb_filter_posts');


/**
 * Shortocde for displaying terms filter and results on page
 */
function vb_filter_posts_sc($atts) {

    $a = shortcode_atts( array(
        'tax'      => $atts['tax'], // Taxonomy
        'terms'    => false, // Get specific taxonomy terms only
        'active'   => false, // Set active term by ID
        'per_page' => 12 // How many posts per page
    ), $atts );

    $post_type = $atts['post-type'];

    $result = NULL;
    $terms  = get_terms($a['tax']);

    if (count($terms)) :
        ob_start(); ?>
<div id="container-async" data-paged="<?php echo $a['per_page']; ?>" class="sc-ajax-filter">
    <ul class="nav-filter">
        <li>
            <a href="#" data-filter="<?= $terms[0]->taxonomy; ?>" data-term="all-terms" data-page="1"
                data-type=<?php echo $post_type ?>>
                Show All
            </a>
        </li>
        <?php foreach ($terms as $term) : ?>
        <li<?php if ($term->term_id == $a['active']) :?> class="active" <?php endif; ?>>
            <a href="<?php echo get_term_link( $term, $term->taxonomy ); ?>"
                data-filter="<?php echo $term->taxonomy; ?>" data-term="<?php echo $term->slug; ?>" data-page="1">
                <?php echo $term->name; ?>
            </a>
            </li>
            <?php endforeach; ?>
    </ul>

    <div class="status"></div>
    <div class="content"></div>
</div>

<?php $result = ob_get_clean();
    endif;

    return $result;
}
add_shortcode( 'ajax_filter_posts', 'vb_filter_posts_sc');



/**
 * Pagination
 */
function vb_ajax_pager( $query = null, $paged = 1 ) {

    if (!$query)
        return;

    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_text' => 'Prev',
        'next_text' => 'Next'
    ]);

    if ($query->max_num_pages > 1) : ?>
<ul class="pagination">
    <?php foreach ( $paginate as $page ) :?>
    <li><?php echo $page; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif;
};


function BlogOverview($atts){
    $count = $atts['count'];
    $cat = $atts['cat'];

    if ($cat == null){
        $cat = "";
    }

    $args = array(
        'category_name' => $cat,
        'posts_per_page' => $count
    );

    $catquery = new WP_Query($args);
    ob_start(); ?>

<section id="blog-overview">
    <div class="container">
        <h2 class="mb-4">Blog.</h2>
        <div class="row justify-content-left blogposts-overview">
            <?php
    while($catquery->have_posts()) : $catquery->the_post(); 
    $category = get_the_category(); ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="post-container">
                    <div class="card-head">
                        <div class="img-container">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>">
                        </div>
                        <div class="overlay">
                            <a href="<?php echo the_permalink(); ?>">Lees meer...</a>
                        </div>
                        <a href="<?php echo the_permalink(); ?>">
                            <h3 class="mt-3"><?php echo the_title(); ?></h3>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <p><?php echo the_excerpt(); ?></p>
                        <hr>
                        <p class="date"><?php echo get_the_date('j M Y');?></p>
                    </div>
                </div>
            </div>
            <?php 
    endwhile;
    ?> </div>
    </div>
</section><?php
    return ob_get_clean();
};

add_shortcode("Blog_Overview", "BlogOverview");

add_filter(
    'the_excerpt',
    function ($excerpt) {
      return substr($excerpt,0,strpos($excerpt,'.')+1);
    }
  );

function CreateCollapse($atts, $content = null){
    $id = $atts['id'];
      ob_start(); ?>

<div class="collapse-container row">
    <div class="col-12">
        <div class="accordion md-accordion" id="<?php echo $id ?>" role="tablist" aria-multiselectable="true">

            <?php echo do_shortcode($content); ?>

        </div>
    </div>
</div>

<?php

      return ob_get_clean();
}
add_shortcode("Create_Collapse", "CreateCollapse");


function CreateCollapseInner($atts, $content = null){
      $title = $atts['title'];
      $id = $atts['id'];
      ob_start(); ?>

<!-- Accordion card -->
<div class="card">

    <!-- Card header -->
    <div class="card-header" role="tab" id="headingTwo2">
        <a class="collapsed" data-toggle="collapse" data-parent="" href="#<?php echo $id ?>"
            aria-expanded="false" aria-controls="collapseTwo1">
            <h5 class="mb-0">
                <?php echo $title ?> <i class="fas fa-plus rotate-icon"></i>
            </h5>
        </a>
    </div>

    <!-- Card body -->
    <div id="<?php echo $id ?>" class="collapse accordion-body" role="tabpanel" aria-labelledby="headingTwo2" data-parent="">
        <div class="card-body">
            <?php echo $content ?>
        </div>
    </div>

</div>
<!-- Accordion card -->

<?php

      return ob_get_clean();
}
add_shortcode("Create_Collapse_Inner", "CreateCollapseInner");