<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Lotus by Eagles
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display|Quicksand|Poiret+One' rel='stylesheet' type='text/css'>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lotus-by-eagles' ); ?></a>

    <div class ="container-fluid logo">
            <a rel="home" title="Lotus" href="<?php bloginfo('url'); ?>">
                <img class="img-logo" width="250" height="170" alt="" src="http://www.smaragdnails.com/wp-content/uploads/2014/11/lotus-logo2.jpg">
            </a>
            <a href = "<?php bloginfo('url'); ?>" class = ""><h1><?php bloginfo( 'name' ); ?></h1></a>
            <h2 class="site-description "><?php bloginfo( 'description' ); ?></h2>

        <div class="text-center social-icon">
            <a href="#" alt="facebook" class="btn btn-default facebook"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#" alt="twitter" class="btn btn-default twitter"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="#" alt="linkedin" class="btn btn-default linkedin"><i class="fa fa-linkedin fa-2x"></i></a>
            <a href="#" alt="pinterest" class="btn btn-default pinterest"><i class="fa fa-pinterest fa-2x"></i></a>
            <a href="#" alt="googleplus" class="btn btn-default googleplus"><i class="fa fa-google-plus fa-2x"></i></a>
            <a href="#" alt="tumblr" class="btn btn-default tumblr"><i class="fa fa-tumblr fa-2x"></i></a>
            <a href="#" alt="instagram" class="btn btn-default instagram"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="#" alt="youtube" class="btn btn-default youtube"><i class="fa fa-youtube fa-2x"></i></a>
        </div>
    </div>



    <header id="masthead" class="nav navbar-default navbar-static-top site-menu">
        <div class="container-fluid">
                <nav  role="navigation">
                    <button type="button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navHeaderCollapse">
                        <i class="fa fa-list fa-3x"></i>
                    </button>
            </div>

            <div id="navHeaderCollapse" class = "collapse navbar-collapse">

                <?php
                wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'menu_class'        => 'nav nav-justified',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>

            </div>
            </nav><!-- #site-navigation -->



    </header><!-- #masthead -->

	<div id="content" class="site-content">


