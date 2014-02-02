<?php get_header(); ?>
<div class="content">

    <?php
    $category = get_queried_object();
    $parent_category = get_category($category->category_parent);
    $sub_categories = get_categories('hide_empty=0&child_of=' . $parent_category->cat_ID);

    $beer = $food = $events = false;
    switch ($parent_category->slug):
        case 'beer':
            $beer = true;
            $page = get_page_by_path('beer');
            break;
        case 'food':
            $food = true;
            $page = get_page_by_path('food');
            break;
        case 'events':
            $events = true;
            $page = get_page_by_path('events');
            break;
    endswitch;
    ?>
    <div class="headline">
        <h1>
            <?php echo get_the_title($page); ?>
        </h1>
        <p>
            <?php echo apply_filters('the_content', $page->post_content); ?>
        </p>
    </div>

    <?php if ($sub_categories) : ?>
        <div class="tab">
            <ul>
                <?php foreach ($sub_categories as $sub_category): ?>
                    <?php $sub_category_id = (int) $sub_category->cat_ID; ?>
                    <?php if ($sub_category_id == $category->cat_ID): ?>
                        <li class="current-menu-item">
                            <?php $category_link = get_category_link($sub_category->cat_ID); ?>
                            <a href="<?php echo esc_url($category_link); ?>" title="<?php echo $sub_category->name; ?>"><?php echo $sub_category->name; ?></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <?php $category_link = get_category_link($sub_category->cat_ID); ?>
                            <a href="<?php echo esc_url($category_link); ?>" title="<?php echo $sub_category->name; ?>"><?php echo $sub_category->name; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="banner">
        <?php
        if ($beer) {
            echo do_shortcode('[gview file="http://www.davistribe.org/temp/testfiles/pregnancy.pdf"]');
        } elseif ($food) {
            ?>
            <div id="menu_widget">
                <a href="http://www.beermenus.com/?ref=widget">Powered by BeerMenus</a>
            </div>
            <div>
                <script src="http://www.beermenus.com/menu_widgets/203" type="text/javascript" charset="utf-8"></script>
            </div>
            <?php
        } elseif ($events) {
            echo "Events";
        }
        ?>
    </div>
    <div class="clr"></div>    
</div>
<?php get_footer(); ?>