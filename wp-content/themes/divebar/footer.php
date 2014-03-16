</div>
<footer>
    <?php display_menu('footer_navigation', '', '', ''); ?>
    <div class="newsletter"><?php if (function_exists(gConstantcontact))
        gConstantcontact(); ?></div>
    <div class="clr"></div>
<?php wp_footer(); ?>
</footer>

</div>
</body>
</html>