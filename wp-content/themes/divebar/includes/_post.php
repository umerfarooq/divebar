<div class="eventDetail">
    <div class="eventDetailH">
        <h2>
            <?php
            $field = get_field_object('event_category');
            $value = get_field('event_category');
            $label = $field['choices'][$value];
            $date = DateTime::createFromFormat('Y/m/d', get_field('event_date'));
            ?>
            <?php echo strtoupper($label); ?> &nbsp; | &nbsp; <?php echo $date->format('F j, Y'); ?> 
        </h2>

        <div>
            <h1><?php the_title(); ?></h1>           

            <div class="share">
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
    </div>

    <?php $photo = get_field('event_image'); ?>

    <?php if ($photo): ?>
        <div class="eventPhoto">
            <img src="<?php the_field('event_image') ?>" />
        </div>
    <?php endif; ?>

    <div class="eventRight">
        <span>TEST TEST TEST TEST TEST TEST TEST TEST TEST</span> 
    </div>

    <div class="clr"></div>
    <div class="eventDesc"><?php the_field('event_description'); ?></div>
</div>