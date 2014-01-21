<?php get_header(); ?>

<div id="container">
    <div id="content">
        <?php if (have_posts()) : ?>

            <div class="whatWatching">
                <h2 class="black">Search Results</h2>
            </div>

            <?php while (have_posts()) : the_post(); ?>
                <div class="breakingNews">
                    <ul>
                        <li>
                            <?php
                            $title = get_the_title();
                            $keys = explode(" ", $s);
                            $title = preg_replace('/(' . implode('|', $keys) . ')/iu', '<strong class="search-excerpt">\0</strong>', $title);
                            ?>
                            <span><a href="<?php the_permalink() ?>" class="<?php echo $color ?>"><?php echo $title; ?></a></span>
                            <?php $category = get_first_category(); ?>
                            <?php if (is_news_category($category)): ?>
                                <?php the_field('text'); ?>
                            <?php else: ?>
                                <p><?php the_field('headline'); ?></p>
                            <?php endif; ?>     
                        </li>
                    </ul>
                </div>
                <div class="clr"></div>
            <?php endwhile; ?>

        <?php else : ?>

            <h2>No posts found.</h2>

        <?php endif; ?>

    </div>
</div>


<?php get_footer(); ?>
