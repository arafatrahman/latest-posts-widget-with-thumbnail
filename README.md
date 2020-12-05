=== WP Latest Posts Widget With Thumbnails ===
Plugin Name : WP Latest Posts Widget With Thumbnails
Requires at least: 5.0
Requires PHP at least : 5.6
Tested up to: 5.5.3
Stable tag: 5.0
Tags: wp recent post, latest post, recent post with thumbnails, recent post widget , latest post widget, recent post widget with thumbnails 
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show most wp recent Posts with thumbnail of your sites.

== Description ==

Show most wp recent Posts with thumbnail of your sites.Using our plugin you can easily show the latest posts on your website in thumbnail format your favorite place ( like rightside,leftside,
footer one ,footer two etc).You do not have to do any kind of coding for showing recent posts with thumbnail .However, if you have any problems with the installation or use of the plugin, you can contact us without any hesitation.
Support Email arafatrahmank@gmail.com
Give us feedback, suggestions, bug reports, and any other contributions on the in
the plugin's [GitHub repository](https://github.com/arafatrahman/latest-posts-widget-with-thumbnail).
WP Latest Posts Widget With Thumbnails plugin does not collect any personal data, so it is 
**ready for EU General Data Protection Regulation (GDPR) compliance**.

== Installation ==

You can install from within WordPress using the Plugin/Add New feature, or if you wish to manually install:

1. Download the plugin.
2. Upload the entire `wp-latest-posts-widget-with-thumbnails` directory to your plugins folder
3. Activate the plugin from the plugin page in your WordPress Dashboard
4. Then Go to 'Appereance' => 'Widgets' and select 'WP Latest Posts Widget With Thumbnails'
5. Add the widget to your favorite place ( like rightside,leftside,footer one ,footer two etc)
6. visit your wordpress website and see your recent posts showing nicely with thumbnails . 

== Screenshots ==

1. The first screenshot shows our WP Latest Posts Widget  in the sidebar with five latest posts. Each list item shows the title, image, date, assigned categories and excerpt of a post title.
2. The second screenshot shows WP Latest Posts Widget on the widgets.php Page in the backend.


= for developers: Supported Hooks =

add_action('widgets_init', 'Kau_latest_posts_widgets');
=> this action hook use to initializing register_widget 

register_widget('Kau_latest_posts_widget');
=> register the widget name is WP Latest Posts With Thumbnail

add_action('after_setup_theme', 'Latest_posts_widget_thumbnail');
=> this action hook use to resize the thumbnail size for showing recent post with thumbnail

To design the list and its items you can use these CSS selectors:

kau-widget-entry-title
the selector use for recent post title

kau-latest-posts
=> the selector which contains the post list

kau-widget-post-thumbnail
=> the selector use for recent post thumbnail

kau-widget-entry-meta
=> the selector use for display recent post widget post category name and post date


