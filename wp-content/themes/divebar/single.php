<?php get_header(); ?>
<div id="container">
    <div id="content">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <?php $category = get_first_category(); ?>
                <?php
                $post_template = '_post.php';
                if (is_lets_talk_category($category)) {
                    $post_template = '_lets_talk_post.php';
                } else if (is_nancy_at_noon_category($category)) {
                    $post_template = '_nancy_at_noon_post.php';
                }
                ?>
                <?php include_detail_post($post_template); ?>
                <div class="clr"></div>        
                <?php if (!is_news_category($category) && !is_lets_talk_category($category)): ?>
                    <div class="shrComnt">Join the Conversation Below</div><div class="clr"></div><div class="clr"></div>            
                    <div class="rplBoxBgTop">
                        <div class="rplBox">
                            <?php the_facebook_commenting_widget(get_permalink(), 580, 5); ?>
                        </div>
                    </div>

                    <? #php comments_template(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="clr"></div>
    </div>
</div>
<?php get_footer(); ?>