<?php
/**
* Custom Widget for displaying flickr images
*
* Displays Flickr Images Slideshow
*/    
class MY_Flickr_Widget extends WP_Widget {
	/* constructor */
	function MY_Flickr_Widget() {
        $widget_ops = array(
        'classname' => 'widget_flickr',
        'description' => theme_locals( 'widget_flickr_desc' )
        );
		parent::WP_Widget(false, $name = theme_locals( 'widget_flickr_title' ), $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$title     = apply_filters('widget_title', $instance['title']);
		$flickr_id = apply_filters('flickr_id', $instance['flickr_id']);
		$amount    = apply_filters('flickr_image_amount', $instance['image_amount']);
		$linktext  = apply_filters('widget_linktext', $instance['linktext']);
		$suf       = rand(100000, 999999);

	echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; ?>

	<div class="carousel slide" id="flickr_<?php echo $suf; ?>" data-ride="carousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner">
        </div>
        <a class="left carousel-control" href="#flickr_<?php echo $suf; ?>" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#flickr_<?php echo $suf; ?>" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
	<a href="http://flickr.com/photos/<?php echo $flickr_id ?>" class="link" target="_blank"><?php echo $linktext; ?></a>
	<script type="text/javascript">
        jQuery(document).ready(function() {
		    jQuery('#flickr_<?php echo $suf; ?> .carousel-inner').jflickrfeed({
			    limit: <?php echo $amount ?>,
			    qstrings: {
				    id: '<?php echo $flickr_id ?>'
			    },
                itemTemplate: '<div class="item"><a class="flickr-link" href="{{image_b}}" title="{{title}}"><img class="img-responsive" src="{{image}}" alt="{{title}}" /></a></div>'
		    }, function(data) {
                jQuery('#flickr_<?php echo $suf; ?> .carousel-inner .item').each(function (index) {
                    jQuery('#flickr_<?php echo $suf; ?> .carousel-indicators')
                        .append('<li data-target="#flickr_<?php echo $suf; ?>" data-slide-to="' + index + '"></li>');
                });
                jQuery('#flickr_<?php echo $suf; ?> .carousel-indicators li').first().addClass('active');
                jQuery('#flickr_<?php echo $suf; ?> .carousel-inner .item').first().addClass('active');
                jQuery('#flickr_<?php echo $suf; ?> .carousel-inner a.flickr-link').swipebox();
                window.footer_widgets();
	        });
            
        });
	</script>
<?php 
	echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$defaults = array( 'title' => '', 'flickr_id' => '', 'image_amount' => '', 'linktext' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title     = esc_attr($instance['title']);
		$flickr_id = esc_attr($instance['flickr_id']);
		$amount    = esc_attr($instance['image_amount']);
		$linktext  = esc_attr($instance['linktext']);
	?>
	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_flickr_label' ); ?> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
    </p>
	<p>
        <label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php echo theme_locals( 'widget_flickr_id_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo $flickr_id; ?>" />
        </label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('image_amount'); ?>"><?php echo theme_locals( 'widget_flickr_count_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('image_amount'); ?>" name="<?php echo $this->get_field_name('image_amount'); ?>" type="text" value="<?php echo $amount; ?>" />
        </label>
    </p>
	<p style="display: none;">
        <label for="<?php echo $this->get_field_id('linktext'); ?>"><?php echo theme_locals( 'widget_flickr_linktext_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" />
        </label>
    </p>
<?php }
} ?>