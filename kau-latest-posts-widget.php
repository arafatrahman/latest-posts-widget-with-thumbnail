<?php

/**
 * Plugin Name:  Latest Posts Widget With Thumbnail
 * Description:  This is the plugin that output most recent Posts with thumbnail of your wordpress websites .
 * Version:      0.0.1
 * Author:       Arafat Rahman
 * Author URI:   http://kauniaweb.com/
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

