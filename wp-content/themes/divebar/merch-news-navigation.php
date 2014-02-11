<div class="links">
    <h1>- established 1989 -</h1>
    <div class="tab">
        <ul>
            <?php $news_page = get_page_by_path('news'); ?>
            <li><a href="<?php echo get_page_link($news_page) ?>" class="news">NEWS</a></li>

            <?php $merch_page = get_page_by_path('merch'); ?>
            <li><a href="<?php echo get_page_link($merch_page) ?>" class="month">MERCH</a></li>
        </ul>
    </div>
</div>
<div class="clr"></div>