<?php /* Template Name: Merch */ ?>
<?php get_header(); ?>
<div class="content">


    <div class="headline">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('headline'); ?></p>
    </div>

    <div class="merch">
        <ul class="merchList">
            <?php if (get_field('products')): ?>
                <?php while (the_repeater_field('products')): ?>
                    <li>
                        <div class="merchFulLThumb">
                            <img alt="" src="<?php the_sub_field('image'); ?>">
                        </div>
                        <div class="merchFulRDetail">
                            <div class="merchFulInnData">
                                <h3><?php the_sub_field('title'); ?></h3>                                
                                <p><?php echo substr(get_sub_field('description'), 0, 36); ?></p>
                                <span><?php the_sub_field('price_unit'); ?><?php the_sub_field('price'); ?></span>
                                <a target="_blank" href="<?php the_sub_field('purchase_link'); ?>">Purchase</a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>

    <div class="clr"></div>    
    
    <?php include_partial('merch-news-navigation.php'); ?>
</div>
<?php get_footer(); ?>

