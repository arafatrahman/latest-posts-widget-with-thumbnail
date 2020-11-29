<?php
if (!class_exists('Kau_latest_posts_widget')) {

    class Kau_latest_posts_widget extends WP_Widget {
        
        private function defaults() {
            $byDefaults = array(
                'title' => esc_html__('Recent Posts'),
                'post-number' => 5,
            );
            return $byDefaults;
        }
        
        public function __construct() {
            $getOption = array(
                'classname' => 'kau-latest-post',
                'description' => esc_html__('latest Posts Widget with Thumbnail.'),
            );
            parent::__construct('kau-latest-post', esc_html__('Kau Latest Posts With Thumbnail'), $getOption);
            add_action('wp_enqueue_scripts', array($this, 'kau_latest_post_widget_styles'));
        }
        
        public function widget($arguments, $ins) {
            $ins = wp_parse_args((array) $ins, $this->defaults());
            $title = apply_filters('widget_title', empty($ins['title']) ? '' : $ins['title'], $ins, $this->id_base);
            echo $arguments['before_widget'];
            
            ?>


            <div class="kau-latest-posts-widget">
                <?php
                if (!empty($title)) {
                    echo $arguments['before_title'] . esc_html($title) . $arguments['after_title'];
                }
                
                $numberOfPost = !empty($ins['post-number']) ? $ins['post-number'] : '';
                $postQueryArgs = array(
                    'post_type' => 'post',
                    'posts_per_page' => absint($numberOfPost),
                    'ignore_sticky_posts' => true,
                );
                $postQuery = new WP_Query($postQueryArgs);
                
                if ($postQuery->have_posts()) : ?>	
                    <?php while ($postQuery->have_posts()) : $postQuery->the_post(); ?>
                        <div class="kau-latest-posts clearfix">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="kau-widget-post-thumbnail">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">	
                                        <?php the_post_thumbnail('kau-widget-post-thumb'); ?>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="kau-widget-post-details">
                                <h3 class="kau-widget-entry-title"><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?> </a></h3>
                                <?php $category = get_the_category();
                                $link = get_category_link( $category[0]->term_id );
                                
                                ?>
                                <div class="kau-widget-entry-meta"><a href="<?php echo $link; ?>"> <?php echo $category[0]->cat_name ?>  </a><time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo '( ' . get_the_date() . ' )'; ?></time></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>

            <?php
            echo $arguments['after_widget'];
        }
        
        public function update($newInstance, $oldInstance) {
            $ins = $oldInstance;
            $ins['title'] = sanitize_text_field($newInstance['title']);
            $ins['post-number'] = absint($newInstance['post-number']);

            return $ins;
        }

        public function form($ins) {
            $ins = wp_parse_args((array) $ins, $this->defaults());

            $title = esc_attr($ins['title']);
            $numberOfPost = absint($ins['post-number']);
            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($ins['title']); ?>"/>
            </p>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
                       value="<?php echo esc_attr($ins['post-number']); ?>"/>
            </p>

            <?php
        }
        
        public function kau_latest_post_widget_styles() {
            wp_enqueue_style('kau-latest-posts-style', KLPW_ASSETS_DIR_URI . '/css/kau-latest-posts-style.css');
        }
        
        
    }
}
