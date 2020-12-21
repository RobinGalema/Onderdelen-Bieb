<?php //Template name: Testpagina ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title>Bieb</title>

    <?php wp_head();?>

</head>

<body <?php body_class(); ?> id="top">

    <header id="banner-header" class="video-header">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-8 col-lg-4 col-xl-2">
                    <div class="branding-container">
                        <h2>Branding Here</h2>
                    </div>
                </div>
                <div class="col-4 col-lg-8 col-xl-10 main-menu">
                    <nav class="navbar hoofdmenu navbar-expand-lg" role="" navigation">
                        <button onclick="toggleNavIcon(this)" class="navbar-toggler" type="button"
                            data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <!-- Collapse button -->
                        <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">

                            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'hoofdmenu',
                    'depth'             => '2',
                    'container'         => 'ul',
                    //'container_id'    => 'basicExampleNav',
                    //'container_class' => 'collapse navbar-collapse',
                    'menu_class'        => 'navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
                            <!-- Collapsible content -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="video-showcase">
        <div class="video-container">
            <iframe src="https://player.vimeo.com/video/485863265?autoplay=1&loop=1&muted=1" width="640" height="564"
                frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

            <!-- Div voor iets over de video te zetten-->
            <div class="heading-overlay">
                <h1>Overlaying tekst of buttons kan hier</h1>
            </div>
        </div>
    </div>

    <main>

    </main>

    <?php get_footer();?>