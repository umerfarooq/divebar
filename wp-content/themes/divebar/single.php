<?php get_header(); ?>
<div class="content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <?php $category = get_first_category(); ?>
            <?php $post_template = '_post.php'; ?>
            <?php include_detail_post($post_template); ?>
            <div class="clr"></div>                        
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="clr"></div>   
    <?php include_partial('merch-news-navigation.php'); ?>
</div>
<?php get_footer(); ?>