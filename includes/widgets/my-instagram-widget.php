<?php
/**
* Custom Widget for displaying instagram images
*
* Displays Recently shared instagram images and their number of likes.
*/    
class MY_Instagram_Widget extends WP_Widget {
    function MY_Instagram_Widget() {
        $widget_ops = array(
            'classname' => 'widget_instagram',
            'description' => theme_locals( 'widget_instagram_desc' )
        );
        $this->WP_Widget( 'instagram-widget', theme_locals( 'widget_instagram_title' ), $widget_ops );
    }   // Widget Settings
    
    
    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $userid = apply_filters('userid', $instance['userid']);
        $accessToken = apply_filters('accessToken', $instance['accessToken']);
        $amount = apply_filters('instagram_image_amount', $instance['image_amount']);
        $suf       = rand(100000, 999999);
?>
<?php
        echo $before_widget; 
        if ( $title )
        echo $before_title . $title . $after_title;
?>
<?php
    
    if( ! function_exists('instagram_fetchData')) {
        // Gets our data
        function instagram_fetchData($url){
            $result = wp_remote_fopen($url);
            return $result;
        }
    }
    
    // Pulls and parses data.
    $result = instagram_fetchData('https://api.instagram.com/v1/users/'.$userid.'/media/recent/?access_token='.$accessToken.'&count='.$amount);
    $result = json_decode($result);
?>
<div id="instagram_<?php echo $suf;?>" class="instagram">
    <?php
        if( !empty( $result->data ) ) {
            $loop = 1;
            foreach ($result->data as $post) { 
    ?>
    <div class="col-xs-6 instagram-item <?php echo ((($loop % 2) == 0) ? 'alt-r' : 'alt-l'); ?>">
        <div class="zoom-box">
            <figure>
                <img class="img-responsive" alt="<?php if ( isset($instance['show_caption'])){ if(!empty($post->caption->text)){ echo $post->caption->text; }} ?>" src="<?php echo $post->images->standard_resolution->url ?>">
            </figure>
            <span class="zoom-mask">
                <span class="zoom">
                    <a class="instagram-link" href="<?php echo $post->images->standard_resolution->url ?>" title="<?php if ( isset($instance['show_caption'])){ if(!empty($post->caption->text)){ echo $post->caption->text; }} ?>">
                        <?php if ( isset($instance['show_likes'])) : ?>
                        <span class="fa-stack fa-2x">
                            <i class="fa fa-heart fa-stack-2x"></i>
                            <i class="fa fa-stack-1x likes_count">
                                <?php
                                    if(!empty($post->likes->count)) { 
                                        echo $post->likes->count; 
                                    }
                                    else {
                                        echo '0';      
                                    } 
                                ?>
                            </i>
                        </span>
                        <?php else :?>
                        <span class="fa-stack fa-2x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-stack-1x fa-search"></i>
                        </span>
                        <?php endif; ?>
                    </a>
                </span>
            </span>
        </div>
    </div>
    <?php
                $loop++;
            }
        }
        else {
            echo "<strong>". theme_locals( 'widget_instagram_config_error' ) ."</strong>";			
        }
    ?>
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#instagram_<?php echo $suf;?> a.instagram-link').swipebox();
    });
</script>
<?php echo $after_widget; ?>
<?php
    }
    
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {	
        $instance['show_likes'] = strip_tags($new_instance['show_likes']);
            return $new_instance;
    }
    
    /** @see WP_Widget::form */
    function form($instance) {
        $defaults = array( 'title' => '', 'userid' => '', 'accessToken' => '', 'image_amount' => '', 'show_likes' => '', 'show_caption' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );	
    
        $title = esc_attr($instance['title']);
        $userid = esc_attr($instance['userid']);
        $accessToken = esc_attr($instance['accessToken']);
        $amount = esc_attr($instance['image_amount']);
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_instagram_label' ); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id('userid'); ?>"><?php echo theme_locals( 'widget_instagram_id_label' ); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('userid'); ?>" name="<?php echo $this->get_field_name('userid'); ?>" type="text" value="<?php echo $userid; ?>" />
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id('accessToken'); ?>"><?php echo theme_locals( 'widget_instagram_token_label' ); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('accessToken'); ?>" name="<?php echo $this->get_field_name('accessToken'); ?>" type="text" value="<?php echo $accessToken; ?>" />
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id('image_amount'); ?>"><?php echo theme_locals( 'widget_instagram_count_label' ); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('image_amount'); ?>" name="<?php echo $this->get_field_name('image_amount'); ?>" type="text" value="<?php echo $amount; ?>" />
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id("show_likes"); ?>">
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_likes"); ?>" name="<?php echo $this->get_field_name("show_likes"); ?>" <?php checked( (bool) $instance["show_likes"], true ); ?> />
        <?php echo theme_locals( 'widget_instagram_showlikes_label' ); ?>
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id("show_caption"); ?>">
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_caption"); ?>" name="<?php echo $this->get_field_name("show_caption"); ?>" <?php checked( (bool) $instance["show_caption"], true ); ?> />
        <?php echo theme_locals( 'widget_instagram_showcaption_label' ); ?>
    </label>
</p>
<?php
    }
}
?>