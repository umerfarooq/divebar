<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php page_title(); ?></title>
        <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_fonts_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
        <?php wp_head(); ?>  
    </head>

    <body>
        <div id="container">
            <div id="layout">

                <header>
                    <div class="social">
                        <ul>
                            <li class="facebook"><a href="<?php fb_link(); ?>" target="_blank">facebook</a></li>
                            <li class="twitter"><a href="<?php twitter_link(); ?>" target="_blank">twitter</a></li>
                            <li class="instagram"><a href="<?php instagram_link(); ?>" target="_blank">instagram</a></li>

                        </ul>
                    </div>

                    <?php get_search_form(); ?>

                    <div id="logo">
                        <a href="/"><img src="<?php images('logo.png'); ?>" alt="Dive Bar" /></a>
                        <a class="st101" href="/">101st Street</a>
                        <a class="st96" href="/">96th Street</a>
                        <a class="st75" href="/">75th Street</a>
                    </div>
                    <nav>
                        <ul>
                            <?php display_menu('header_navigation', '', '', ''); ?>
                        </ul>
                    </nav>
                    <nav class="menu-nav">
                        <?php display_menu('menu_navigation', '', '', ''); ?>
                    </nav>


                    <div class="clr"></div>
                </header>
