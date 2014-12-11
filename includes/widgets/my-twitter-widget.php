<?php
    /**
     * Custom Widget for displaying recent tweets.
     *
     * Displays Recent Tweets fetched from the specified Twitter Widget Id.
    */    
    class MY_Twitter_Widget extends WP_Widget {

        function MY_Twitter_Widget() {
            $widget_ops = array(
                'classname'   => 'widget_twitter',
                'description' => theme_locals( 'widget_twitter_desc' ),
                );
            $control_ops = array( 'id_base' => 'twitter-widget' );
            $this->WP_Widget( 'twitter-widget', theme_locals( 'widget_twitter_title' ), $widget_ops, $control_ops );
        }

        function widget( $args, $instance ) {
            $title                  = apply_filters('widget_title', $instance['title'] );
            $tweets_count           = $instance['tweets_count'];	
            $twitter_widget_id      = $instance['twitter_widget_id'];
            $suf                    = rand(100000, 999999);
            extract( $args );

	        echo $before_widget;
		        if ( $title ) {
			        echo $before_title . $title . $after_title;
                }

            echo '<div id="tweets_' . $suf . '"></div>';
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        twitterFetcher.fetch('<?php echo $twitter_widget_id; ?>', '',<?php echo $tweets_count; ?>, true, false, true, dateFormatter, 'false', handleTweets);

        function handleTweets(tweets) {
            var x = tweets.length;
            var n = 0;
            var element = document.getElementById('tweets_<?php echo $suf; ?>');
            var html = '<ul>';
            while (n < x) {
                html += '<li>' + tweets[n] + '</li>';
                n++;
            }
            html += '</ul>';
            element.innerHTML = html;
            window.footer_widgets();
        }

        function dateFormatter(date) {
            var relative_to = new Date();
            var diff = (relative_to.getTime() - date) / 1000;
            var dayDiff = Math.floor(diff / 86400);

            var r = '';
            if (diff < 1) {
                r = 'just now';
            } else if (diff < 60) {
                r = diff + ' seconds ago';
            } else if (diff < 120) {
                r = '1 minute ago';
            } else if (diff < 3600) {
                r = Math.ceil(diff / 60).toString() + ' minutes ago';
            } else if (diff < 7200) {
                r = '1 hour ago';
            } else if (diff < 86400) {
                r = Math.ceil(diff / 3600).toString() + ' hours ago';
            } else if (dayDiff === 1) {
                r = 'Yesterday';
            } else if (dayDiff === 2) {
                r = 'Two days ago';
            } else if (dayDiff < 7) {
                r = Math.ceil(dayDiff).toString() + ' days ago';
            } else if (dayDiff < 8) {
                r = '1 week ago';
            } else if (dayDiff < 14) {
                r = Math.ceil(dayDiff).toString() + ' days ago';
            } else if (dayDiff < 30) {
                r = Math.ceil(dayDiff / 7).toString() + ' weeks ago';
            } else if (dayDiff < 32) {
                r = '1 month ago';
            } else if (dayDiff < 363) {
                r = Math.ceil(dayDiff / 31).toString() + ' months ago';
            } else if (dayDiff <= 380) {
                r = '1 year ago';
            } else if (dayDiff < 720) {
                r = '1 year ' + Math.ceil((dayDiff - 365) / 31).toString() + ' months ago'; ;
            } else if (dayDiff >= 720) {
                r = Math.ceil(dayDiff / 365).toString() + ' years ago';
            }
            return r;
        }
        });
</script>
<?php
            echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
            return $new_instance;
        }

        function form( $instance ) {
            $defaults = array(
                'title' => theme_locals( 'widget_twitter_default_title' ),
                'tweets_count' => '3',
                'twitter_widget_id' => ''
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo theme_locals( 'widget_twitter_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'twitter_widget_id' ); ?>"><?php echo theme_locals( 'widget_twitter_id_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'twitter_widget_id' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'twitter_widget_id' ); ?>" value="<?php echo $instance['twitter_widget_id']; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'tweets_count' ); ?>"><?php echo theme_locals( 'widget_twitter_count_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'tweets_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tweets_count' ); ?>" value="<?php echo $instance['tweets_count']; ?>" />
</p>
<?php
        }
    }
?>