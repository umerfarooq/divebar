<?php get_header(); ?>
<div id="container">
    <div id="content">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <?php include_detail_post(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="clr"></div>
    </div>
</div>

<?php get_footer(); ?>