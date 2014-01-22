<?php /* Template Name: Menu */ ?>
<?php get_header(); ?>
<div class="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <p><?php the_content(); ?></p>
        <?php endwhile;
    endif; ?>

    <hr></hr>

    <?php
    if (is_page('Booze')) {
        $cat_slug = 'booze';
    } elseif (is_page('Food')) {
        $cat_slug = 'food';
    } elseif (is_page('Events')) {
        $cat_slug = 'events';
    }
    $args = array(
        'category_name' => $cat_slug
    );
    $posts = new WP_Query($args);
    ?>


    <?php if ($posts->have_posts()) : ?>
        <div class="tab">
            <ul>
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <li>
                        <?php the_title(); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="banner">
        <?php
        if (is_page('Booze')) {
            echo do_shortcode('[gview file="http://www.davistribe.org/temp/testfiles/pregnancy.pdf"]');
        } elseif (is_page('Food')) {
            ?>
            <div id="menu_widget">
                <a href="http://www.beermenus.com/?ref=widget">Powered by BeerMenus</a>
            </div>
            <div>
                <script src="http://www.beermenus.com/menu_widgets/203" type="text/javascript" charset="utf-8"></script>
            </div>
            <?php
        } elseif (is_page('Events')) {
            echo do_shortcode('[gview file="http://www.davistribe.org/temp/testfiles/pregnancy.pdf"]');
        }
        ?>
    </div>
    <div class="clr"></div>    
</div>
<?php get_footer(); ?>

