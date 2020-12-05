<?php

/**
 * Plugin Name:  WP Latest Posts Widget With Thumbnails
 * Description:  Show most wp recent Posts with thumbnail of your sites
 * Version:      1.0.0
 * Author:       Arafat Rahman
 * Author URI:   http://kauniaweb.com/
 * Text Domain:  wp-latest-posts-widget-with-thumbnails
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

define("KLPW_PATH", dirname(__FILE__));
define('KLPW_ASSETS_DIR_URI', plugins_url('assets', __FILE__));

add_action('after_setup_theme', 'Latest_posts_widget_thumbnail');

function Latest_posts_widget_thumbnail() {
    add_image_size('kau-widget-post-thumb', 65, 65, true);
}
add_action('widgets_init', 'Kau_latest_posts_widgets');

function Kau_latest_posts_widgets() {
    register_widget('Kau_latest_posts_widget');
}
include_once KLPW_PATH . "/classes/recent-post-widget-with-thumbnail.php";
