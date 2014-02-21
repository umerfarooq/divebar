<?php

define('INCLUDE_PATH', 'includes/');
define('INSTAGRAM_ACCESS_TOKEN', '422903340.23c45d8.6ab87c4ad1e343ddaa2a509e434676c6');
define('INSTAGRAM_USER_ID', '422903340');
define('TWITTER_USERNAME', 'DrNancyNBCNEWS');

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

if (!is_admin())
    add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, '1.7.1');
    wp_enqueue_script('jquery');
}

/**
 * Register Custom Menus.
 */
function register_custom_menus() {
    register_nav_menus(array(
        'header_navigation' => 'Global Navigation in the header.',
        'locations_navigation' => 'Navigation to the Locations Pages.',
        'menu_navigation' => 'Navigation to the Menu Pages.',
        'internal_navigation' => 'Navigation to Internal Pages.',
        'footer_navigation' => 'Footer menu.'
    ));
}

add_action('init', 'register_custom_menus');


add_filter('get_sample_permalink_html', 'perm', '', 4);

function perm($return, $id, $new_title, $new_slug) {
    global $post;
    if ($post->post_type == 'testimonials') {
        $ret2 = preg_replace('/<span id="edit-slug-buttons">.*<\/span>|<span id=\'view-post-btn\'>.*<\/span>/i', '', $return);
    }

    return $ret2;
}

/**
 * Display a menu.
 * @param {String} $name The name of the menu to display.
 */
function display_menu($name, $container = 'div', $container_id = '', $container_class = '') {
    $args = array(
        'theme_location' => $name,
        'container' => $container,
        'container_id' => $container_id,
        'container_class' => $container_class
    );

    wp_nav_menu($args);
}

function page_title() {
    echo get_bloginfo('name');
}

function get_fonts_stylesheet_uri() {
    $stylesheet_dir_uri = get_stylesheet_directory_uri();
    $stylesheet_uri = $stylesheet_dir_uri . '/css/fonts.css';
    return $stylesheet_uri;
}

function images($file) {
    $stylesheet_dir_uri = get_stylesheet_directory_uri();
    echo $stylesheet_dir_uri . '/images/' . $file;
}

function fb_link() {
    echo 'https://www.facebook.com/DiveBarNYC';
}

function twitter_link() {
    echo 'https://twitter.com/DiveBarNYC';
}

function instagram_link() {
    echo 'http://instagram.com/divebarnyc';
}

function page_url($title) {
    echo get_page_link(get_page_by_title($title));
}

/**
 * Include the post template.
 * @param {String} [$title] Name of the file to include. Defaults to '_post.php'.
 * @uses include_part();
 */
function include_detail_post($file = '_post.php') {
    include(INCLUDE_PATH . $file);
}

function include_partial($file = 'merch-news-navigation.php') {
    include($file);
}


// get the first category id
function get_first_category($post_id=false) {
    $category = get_the_category($post_id);
    return $category[0];
}

?>