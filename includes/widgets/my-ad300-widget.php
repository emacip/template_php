<?php
/**
 * Custom Widget for displaying 300px Ad
 *
 * Displays image banner ad of size 300px width and variable height
 */
class MY_Ad_300_Widget extends WP_Widget {

	function MY_Ad_300_Widget() {
		$widget_ops = array(
			'classname'   => 'widget_ad_300',
			'description' => theme_locals( 'widget_ad300_desc' ),
			);
		$control_ops = array( 'id_base' => 'ad_300-widget' );
		$this->WP_Widget( 'ad_300-widget', theme_locals( 'widget_ad300_title' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args ); 
        $title     = apply_filters('widget_title', $instance['title']);
	    echo $before_widget;
		    if ( $title )
			    echo $before_title . $title . $after_title;
    ?>
		<ul class="banners">
			<?php
				for ( $ad_count = 1; $ad_count <= 1; $ad_count++ ) :
					if ( $instance['ad_300_img_' . $ad_count] && $instance['ad_300_link_' . $ad_count] ) : ?>

					<li class="text-center">
						<a href="<?php echo $instance['ad_300_link_' . $ad_count]; ?>">
							<img class="img-responsive" src="<?php echo $instance['ad_300_img_' . $ad_count]; ?>" alt="banner ad <?php echo $ad_count; ?>" />
						</a>
					</li>
			<?php
				endif;
				endfor;
			?>
		</ul>
	<?php
        echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$defaults = array(
            'title'         => '',
			'ad_300_img_1'  => '',
			'ad_300_link_1' => ''
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	    <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_ad300_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
		<p><strong><?php echo theme_locals('widget_ad300_ad_label'); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_300_img_1'); ?>"><?php echo theme_locals('widget_ad300_imgurl_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_300_img_1'); ?>" name="<?php echo $this->get_field_name('ad_300_img_1'); ?>" value="<?php echo $instance['ad_300_img_1']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_300_link_1'); ?>"><?php echo theme_locals('widget_ad300_adlink_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_300_link_1'); ?>" name="<?php echo $this->get_field_name('ad_300_link_1'); ?>" value="<?php echo $instance['ad_300_link_1']; ?>" type="text" />
		</p>
		<?php
	}
} ?>