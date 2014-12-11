<?php
    /**
    * Custom Widget for social links
    *
    * Displays upto 20 social icon links
    */    
    class My_SocialNetworks_Widget extends WP_Widget {
    
        function My_SocialNetworks_Widget() {
            $widget_ops = array('classname' => 'widget_social_networks', 'description' => theme_locals( 'widget_social_desc' ) );
            $this->WP_Widget('social_networks', theme_locals( 'widget_social_title' ), $widget_ops);
        }
    
        function widget( $args, $instance ) {
            extract($args);
            $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
    
            $networks['Facebook']['link']   = $instance['facebook'];
            $networks['Twitter']['link']   = $instance['twitter'];
            $networks['Google+']['link']   = $instance['googleplus'];
            $networks['Pinterest']['link']   = $instance['pinterest'];
            $networks['Linkedin']['link']   = $instance['linkedin'];
            $networks['Youtube']['link']   = $instance['youtube'];
            $networks['Vimeo']['link']   = $instance['vimeo'];
            $networks['Skype']['link']   = $instance['skype'];
            $networks['Instagram']['link']   = $instance['instagram'];
            $networks['Flickr']['link']   = $instance['flickr'];
            $networks['Dribbble']['link']   = $instance['dribbble'];
            $networks['Behance']['link']   = $instance['behance'];
            $networks['DeviantART']['link']   = $instance['deviantart'];
            $networks['Github']['link']   = $instance['github'];
            $networks['StumbleUpon']['link']   = $instance['stumbleupon'];
            $networks['Reddit']['link']   = $instance['reddit'];
            $networks['Delicious']['link']   = $instance['delicious'];
            $networks['RssFeed']['link']   = $instance['rssfeed'];
            $networks['SoundCloud']['link']   = $instance['soundcloud'];
            $networks['Spotify']['link']   = $instance['spotify'];

            echo $before_widget;
            if( $title ) {
                echo $before_title;
                    echo $title;
                echo $after_title;
            }
?>
<ul class="social list-inline">
    <?php
        $networks_array = array( 
                        'facebook'      => 'Facebook',
                        'twitter'       => 'Twitter',
                        'google-plus'   => 'Google+',
                        'pinterest'     => 'Pinterest',
                        'linkedin'      => 'Linkedin',
                        'youtube-play'  => 'Youtube',
                        'vimeo-square'  => 'Vimeo',
                        'skype'         => 'Skype',
                        'instagram'     => 'Instagram',
                        'flickr'        => 'Flickr',
                        'dribbble'      => 'Dribbble',
                        'behance'       => 'Behance',
                        'deviantart'    => 'DeviantART',
                        'github'        => 'Github',
                        'stumbleupon'   => 'StumbleUpon',
                        'reddit'        => 'Reddit',
                        'delicious'     => 'Delicious',
                        'rss'           => 'RssFeed',
                        'soundcloud'    => 'SoundCloud',
                        'spotify'       => 'Spotify'
                    );
    ?>
    <?php foreach( $networks_array as $icon => $network ) : ?>
    <?php if (!empty($networks[$network]['link'])) : ?>
    <li class="social_li">
        <a class="social_link " href="<?php echo $networks[$network]['link']; ?>" target="_blank">
            <span class="fa fa-<?php echo $icon;?>"></span>
        </a>
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>
<!-- END SOCIAL NETWORKS -->
<?php
        echo $after_widget;
    }
    
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    
    function form( $instance ) {
        $defaults = array( 
        'title'         => '',
        'facebook'      => '',
        'twitter'       => '',
        'googleplus'    => '',
        'pinterest'     => '',
        'linkedin'      => '',
        'youtube'       => '',
        'vimeo'         => '',
        'skype'         => '',
        'instagram'     => '',
        'flickr'        => '',
        'dribbble'      => '',
        'behance'       => '',
        'deviantart'    => '',
        'github'        => '',
        'stumbleupon'   => '',
        'reddit'        => '',
        'delicious'     => '',
        'rssfeed'       => '',
        'soundcloud'    => '',
        'spotify'       => ''
        );
    
        $instance = wp_parse_args( (array) $instance, $defaults );
    
        $facebook           = $instance['facebook'];
        $twitter            = $instance['twitter'];
        $googleplus         = $instance['googleplus'];
        $pinterest          = $instance['pinterest'];
        $linkedin           = $instance['linkedin'];
        $youtube            = $instance['youtube'];
        $vimeo              = $instance['vimeo'];
        $skype              = $instance['skype'];
        $instagram          = $instance['instagram'];
        $flickr             = $instance['flickr'];
        $dribbble           = $instance['dribbble'];
        $behance            = $instance['behance'];
        $deviantart         = $instance['deviantart'];
        $github             = $instance['github'];
        $stumbleupon        = $instance['stumbleupon'];
        $reddit             = $instance['reddit'];
        $delicious          = $instance['delicious'];
        $rssfeed            = $instance['rssfeed'];
        $soundcloud         = $instance['soundcloud'];
        $spotify            = $instance['spotify'];
    
        $title              = strip_tags($instance['title']);
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_social_label' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php echo theme_locals( 'facebook_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php echo theme_locals( 'twitter_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php echo theme_locals( 'google_plus_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php echo theme_locals( 'pinterest_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php echo theme_locals( 'linkedin_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php echo theme_locals( 'youtube_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php echo theme_locals( 'vimeo_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('skype'); ?>"><?php echo theme_locals( 'skype_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($skype); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php echo theme_locals( 'instagram_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php echo theme_locals( 'flickr_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php echo theme_locals( 'dribbble_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('behance'); ?>"><?php echo theme_locals( 'behance_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" name="<?php echo $this->get_field_name('behance'); ?>" type="text" value="<?php echo esc_attr($behance); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php echo theme_locals( 'deviantart_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('deviantart'); ?>" name="<?php echo $this->get_field_name('deviantart'); ?>" type="text" value="<?php echo esc_attr($deviantart); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('github'); ?>"><?php echo theme_locals( 'github_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('stumbleupon'); ?>"><?php echo theme_locals( 'stumbleupon_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('stumbleupon'); ?>" name="<?php echo $this->get_field_name('stumbleupon'); ?>" type="text" value="<?php echo esc_attr($stumbleupon); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('reddit'); ?>"><?php echo theme_locals( 'reddit_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" type="text" value="<?php echo esc_attr($reddit); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('delicious'); ?>"><?php echo theme_locals( 'delicious_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo esc_attr($delicious); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('rssfeed'); ?>"><?php echo theme_locals( 'rss_feed_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('rssfeed'); ?>" name="<?php echo $this->get_field_name('rssfeed'); ?>" type="text" value="<?php echo esc_attr($rssfeed); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php echo theme_locals( 'soundcloud_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('spotify'); ?>"><?php echo theme_locals( 'spotify_url' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('spotify'); ?>" name="<?php echo $this->get_field_name('spotify'); ?>" type="text" value="<?php echo esc_attr($spotify); ?>" />
</p>
<?php
        }
    }
?>