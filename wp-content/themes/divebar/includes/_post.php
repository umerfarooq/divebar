<div class="nancyStdy">
    <div class="nacncyStdyH">
        <?php $category = get_first_category(); ?>

        <?php $color = get_color($category); ?>

        <h2 class="<?php echo $color ?>"><?php echo strtoupper($category->name) ?>  |  <?php the_time('F j, Y'); ?> </h2>

        <h1><a href="<?php the_permalink() ?>" class="<?php echo $color ?>"><?php the_title(); ?></a></h1>

        <div>

            <?php if (is_news_category($category)): ?>
                <p class="width83"><?php the_field('text'); ?></p>
            <?php else: ?>
                <p class="width83"><?php the_field('headline'); ?></p>
            <?php endif; ?>                

            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            <fb:like href="<?php echo get_permalink(); ?>" show_faces="true" width="50" send="false" layout="button_count"></fb:like>
            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
            <a href="http://twitter.com/share" class="twitter-share-button"
               data-url="<?php the_permalink(); ?>"
               data-text="<?php the_title(); ?>"
               data-count="none">Tweet</a>
        </div>
    </div>

    <?php $photo = get_field('photo'); ?>

    <?php if ($photo): ?>
        <div class="nancyStdyVid">
            <?php $link = get_field('video_link'); ?>

            <?php if ($link): ?>
                <a href="<?php the_field('video_link') ?>" target="_blank"><img src="<?php the_field('photo') ?>" /></a>
            <?php else: ?>
                <img src="<?php the_field('photo') ?>" />
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php $quote = get_field('quote'); ?>
    <?php $quote_signature = get_field('quote_signature'); ?>
    <?php $content = get_field('content'); ?>

    <?php if ($quote): ?>
        <div class="nancyVidR">
            <h3>“ <?php echo $quote ?> ”</h3>
            <?php if ($quote_signature): ?>
                <span>- <?php echo $quote_signature ?></span> 
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="clr"></div>
    <?php if ($content): ?>
        <div class="nancyStdyDetail"><?php echo $content ?></div>
    <?php endif; ?>
</div>