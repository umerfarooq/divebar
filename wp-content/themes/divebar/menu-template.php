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
        $category = get_category_by_slug($cat_slug);
    } elseif (is_page('Food')) {
        $cat_slug = 'food';
        $category = get_category_by_slug($cat_slug);
    } elseif (is_page('Events')) {
        $cat_slug = 'events';
        $category = get_category_by_slug($cat_slug);
    }
    $args = array(
        'parent' => $category->cat_ID
    );
    $sub_categories = get_categories('hide_empty=0&child_of=' . $category->cat_ID);
    ?>


    <?php if ($sub_categories) : ?>
        <div class="tab">
            <ul>
                <?php foreach ($sub_categories as $sub_category): ?>
                    <li>
                        <?php echo $sub_category->name; ?>
                    </li>
                <?php endforeach; ?>
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
            
        }
        ?>
    </div>
    <div class="clr"></div>    
</div>
<?php get_footer(); ?>

