<?php

define('THEME_DIR', get_template_directory());
define('THEME_URI', esc_url(get_template_directory_uri()));

add_action('wp_enqueue_scripts', 'load_file');
function load_file() {
    wp_enqueue_style('bootstrap', THEME_URI.'/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', THEME_URI.'/assets/js/bootstrap.bundle.min.js', '', false, true);
}

add_action('after_setup_theme', 'init_setup');
function init_setup() {

    register_nav_menu('main-menu',__('Main Menu'));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_image_size( 'small-thumb', 400, 300, true); // Hard Crop
    add_image_size( 'medium-thumb', 800, 600); // Soft Crop Mode
    // add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode

    // Register Custom Navigation Walker
    require_once THEME_DIR.'/classes/class-wp-bootstrap-navwalker.php';
}

add_filter('pre_get_posts', 'search_filter');
function search_filter($query) {
    if($query->is_search()) {
        $query->set('post_type', 'post');
    }
}

// function custom paginate
require_once THEME_DIR.'/inc/pagination.php';

// Register post type book
require_once THEME_DIR.'/inc/post-type.php';

// Register taxonomy genre & writer
require_once THEME_DIR.'/inc/taxonomy.php';

// Register taxonomy genre & writer
require_once THEME_DIR.'/inc/meta-box.php';

// custom theme option
// require_once THEME_DIR.'/inc/theme-options.php';

// ACF
require_once THEME_DIR.'/inc/acf.php';

?>