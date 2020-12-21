<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title>Bieb</title>

    <?php wp_head();?>
    <link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/styles/default.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

</head>
<body <?php body_class(); ?> id="top">

<header id="header-primary">
<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?php echo home_url(); ?>"><h1 class="header-heading">Libelnet Onderdelenbibliotheek</h1></a>
        </div>
        <div class="col">
            <nav class="navbar hoofdmenu navbar-expand-lg" role=""navigation">
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><!-- SVG Goes Here --></span>
            </button>
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

<div id="sticky-header" class="w-100">
    <div class="container">
        <div class="row justify-content-between">
        <div class="col">
            <a href="<?php echo home_url(); ?>"><h1 class="header-heading">Home url or img</h1></a>
        </div>
        <div class="col">
        <nav class="navbar hoofdmenu navbar-expand-lg justify-content-end" role="navigation">
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#StickyNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">Burger</span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="StickyNav">

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


