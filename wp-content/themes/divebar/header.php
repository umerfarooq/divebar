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
        <div id="layout">

            <header>
                <hgroup>
                    <div id="logo">
                        <a href="/"><img src="<?php images('logo.png'); ?>" alt="Dive Bar" /></a>
                    </div>
                    <nav>
                        <ul>
                            <?php display_menu('header_navigation', '', '', ''); ?>
                        </ul>
                    </nav>
                    <nav class="menu-nav">
                        <?php display_menu('menu_navigation', '', '', ''); ?>
                    </nav>
                </hgroup>

                <div class="search"><input type="text" value="search" /></div>
                <div class="social">
                    <ul>
                        <li class="facebook"><a href="#">facebook</a></li>
                        <li class="twitter"><a href="#">twitter</a></li>
                        <li class="youtube"><a href="#">youtube</a></li>

                    </ul>
                </div>
                <div class="clr"></div>
            </header>
