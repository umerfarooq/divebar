<?php get_header(); ?>
<div class="content">
    <div class="headline">
        <h1>Search Results</h1>
    </div> 

    <div class="banner">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="event">
                    <?php
                    $title = get_the_title();
                    $keys = explode(" ", $s);
                    $title = preg_replace('/(' . implode('|', $keys) . ')/iu', '<strong class="search-excerpt">\0</strong>', $title);
                    ?>
                    <ul>
                        <li>
                            <span>
                                <a href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
                            </span>
                            <p><?php the_field('event_description'); ?></p>

                        </li>
                    </ul>
                </div>     
                <div class="clr"></div>
            <?php endwhile; ?>
        <?php else : ?>
            <h2>No posts found.</h2>
        <?php endif; ?>
    </div>
    <div class="clr"></div>

    <?php include_partial('merch-news-navigation.php'); ?>

</div>
<?php get_footer(); ?>
