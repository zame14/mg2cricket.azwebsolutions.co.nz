<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <section id="header" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <a href="<?=get_home_url()?>" class="mg2-logo"><img src="<?=get_stylesheet_directory_uri()?>/images/logo.png" alt="MG2 Cricket" /></a>
                <div class="ecommerce-icons-wrapper">
                    <?=cartIcons()?>
                </div>
                <div id="mg2-menu-wrapper">
                    <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                        <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => '',
                                    'menu_id' => 'main-menu',
                                    'walker' => new wp_bootstrap_navwalker()
                                )
                            );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
