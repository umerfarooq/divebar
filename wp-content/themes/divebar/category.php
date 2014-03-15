<?php get_header(); ?>
<div class="content">

    <?php
    $category = get_queried_object();

    $parent_category = null;
    if ($category->category_parent):
        $parent_category = get_category($category->category_parent);
    endif;

    $beer = $food = $events = false;

    $category_object = null;
    $sub_categories = null;

    if (!empty($parent_category)):
        $category_object = $parent_category;
        $sub_categories = get_categories('hide_empty=0&child_of=' . $parent_category->cat_ID);
    else:
        $category_object = $category;
        $sub_categories = get_categories('hide_empty=0&child_of=' . $category_object->cat_ID);
    endif;

    switch ($category_object->slug):
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
        case 'locations':
            $locations = true;
            $page = get_page_by_path('locations');
            break;
    endswitch;
    ?>
    <div class="headline">
        <ul>
            <li>
                <?php if ($events): ?>
                    <img src="<?php images('events.png'); ?>" />
                <?php elseif ($food): ?>
                    <img src="<?php images('food.png'); ?>" />
                <?php elseif ($beer): ?>
                    <img src="<?php images('beer.png'); ?>" />
                <?php elseif ($locations): ?>
                    <img src="<?php images('location.png'); ?>" />
                <?php endif; ?>
            </li>
            <li>
                <h1><?php echo get_the_title($page); ?></h1>
            </li>
            <li>
                <?php echo apply_filters('the_content', $page->post_content); ?>
            </li>
        </ul>
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
            query_posts(array('category_name' => $category->slug));
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <div id="menu_widget">
                        <a href="http://www.beermenus.com/?ref=widget"></a>
                    </div>
                    <div>
                        <script src="<?php the_field('script_url'); ?>" type="text/javascript" charset="utf-8"></script>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>

            <?php
        } elseif ($food) {
            query_posts(array('category_name' => $category->slug));
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $file_path = get_field('menu_file');
                    echo do_shortcode('[gview file="' . $file_path . '"]');
                endwhile;
            endif;
            wp_reset_query();
        } elseif ($events) {
            $today = date('m/d/Y');
            query_posts(array('category_name' => $category->slug,
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                    array('key' => 'event_date', 'compare' => '>=', 'value' => $today))));

            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>

                    <div class="event">
                        <div class="date"><?php the_field('event_date'); ?></div>
                        <div class="desc"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong> <p><?php the_field('event_description'); ?></p></div>
                        <div class="cat">
                            <?php $field = get_field_object('event_category'); ?>
                            <?php $value = get_field('event_category'); ?>
                            <?php $label = $field['choices'][$value]; ?>
                            <strong><?php echo $label; ?></strong>
                        </div>
                    </div>

                    <?php
                endwhile;
            endif;
            wp_reset_query();
        } elseif ($locations) {
            query_posts(array('category_name' => $category->slug));
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <ul class="locations">
                        <li class="directions">
                            <h1>Directions</h1>
                            <p>
                                <?php the_field('directions') ?>
                            </p>
                            <?php
                            $location = get_field('map_location');
                            if (!empty($location)):
                                ?>
                                <div class="acf-map">
                                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                </div>
                            <?php endif; ?>
                        </li>
                        <li class="get-touch">
                            <h1>Get in Touch</h1>

                            <?php if (get_field('get_in_touch')): ?>
                                <ul>
                                    <?php while (the_repeater_field('get_in_touch')): ?>
                                        <li>
                                            <h3><?php the_sub_field('heading'); ?></h3>
                                            <p><?php the_sub_field('value'); ?></p>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

                            <h1>Hours</h1>
                            <?php if (get_field('hours')): ?>
                                <ul>
                                    <?php while (the_repeater_field('hours')): ?>
                                        <li>
                                            <h3><?php the_sub_field('heading'); ?></h3>
                                            <p><?php the_sub_field('value'); ?></p>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
        }
        ?>
    </div>
    <div class="clr"></div>

    <?php include_partial('merch-news-navigation.php'); ?>

</div>
<?php get_footer(); ?>